<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Models\Cliente;
use Illuminate\Support\Facades\Session;
use App\User;
use PDF;
use Mail;

class OrcamentoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $clientes = Cliente::where('user_id', $user_id)->get();
        return view('orcamentos.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Orcamento::create($request->all());

        $prazo = $request->prazo;
        $tempo = $request->tempo;

        if($tempo == "dia"){
            $dia = 1;
        }else if($tempo == "mes"){
            $dia = 30;
        }else if($tempo == "ano"){
            $dia = 365;
        }

        $user_id = auth()->user()->id;

        $orcamento = new Orcamento;
        $orcamento->user_id = $user_id;
        $orcamento->cliente_id = $request->cliente_id;
        $orcamento->prazo = ($prazo * $dia);
        $orcamento->titulo = $request->titulo;
        $orcamento->descricao = $request->descricao;
        $orcamento->valor = $request->valor;

        $orcamento->save();

        Session::flash('success', 'Orçamento cadastrado com sucesso!');

        return view('menu.index');
    }

    //-------LISTA TODOS ORCAMENTOS
    public function listar(){
       
        $user_id = auth()->user()->id;

        $orcamento = Orcamento::where('user_id', $user_id)->get();

        $hoje = strtotime("now");

        foreach ($orcamento as $orc){
            
            if( ($orc->servico != "concluido") or ($orc->servico != "cancelado") and ($orc->inicio != NULL) ) {

                $entrega = strtotime($orc->inicio. "+". $orc->prazo. "days");

                if($hoje > $entrega){

                    Orcamento::find($orc->id)->update(['servico' => "atrasado"]);

                }
            }
        }

        $orcamentos = Orcamento::select('orcamentos.*', 'clientes.nome as c_nome')
        ->join('clientes', 'clientes.id', 'orcamentos.cliente_id')
        ->where('orcamentos.user_id', $user_id)->paginate(10);

        return view('orcamentos.listar', compact('orcamentos'));

    }


    public function filtro(Request $request){

        $user_id = auth()->user()->id;

        $search = $request->search;

        $orcamentos = Orcamento::select('orcamentos.*', 'clientes.nome as c_nome')
                        ->join('clientes', 'clientes.id', 'orcamentos.cliente_id')
                        ->where('orcamentos.user_id', $user_id)
                        ->where( function($query) use($search){
                                    $query->where('orcamentos.titulo', 'like', $search.'%')
                                        ->orWhere('clientes.nome', 'like', $search.'%')
                                        ->orWhere('orcamentos.prazo', 'like', $search.'%')
                                        ->orWhere('orcamentos.total', 'like', $search.'%')
                                        ->orWhere('orcamentos.status', 'like', $search.'%')
                                        ->orWhere('orcamentos.servico', 'like', $search.'%');
                                })
                        ->paginate(10); //->get(); deu erro porque a view tem paginate "{{ $orcamentos->links() }}

        return view('orcamentos.listar', compact('orcamentos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user_id = auth()->user()->id;

        $orcamento = Orcamento::select('orcamentos.*', 'clientes.nome as c_nome', 'clientes.sobrenome as c_sobrenome')
        ->join('clientes', 'clientes.id', 'orcamentos.cliente_id')
        ->where('orcamentos.id', $id)->first();

        /*
        $orcamento = Orcamento::join('clientes', 'clientes.id', 'orcamentos.cliente_id')
        ->where('orcamentos.id',$id)->first();
        */
        //dd($orcamento);
        return view('orcamentos.show', compact('orcamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $user_id = auth()->user()->id;
        $clientes = Cliente::where('user_id', $user_id)->get();

        $orcamento = Orcamento::find($id);

        return view('orcamentos.edit', compact('clientes','orcamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Orcamento::find($id)->update(['titulo' => $request->titulo,
                                       'cliente_id' => $request->cliente_id,
                                       'descricao' => $request->descricao,
                                       'prazo' => $request->prazo,
                                       'valor' => $request->valor
        ]);

        return view('menu.index');
    }

    public function status(Request $request){

        Orcamento::find($request->id)->update(['status' => $request->status]);

        return redirect()->back()->with('update', 'Status atualizado com sucesso!');
    }

    public function inicio(Request $request){

        //dd($request->inicio);

        Orcamento::find($request->id)->update(['inicio' => $request->inicio]);

        $orcamento = Orcamento::find($request->id)->first();

        //dd($orcamento->inicio);

        return redirect()->back()->with('update', 'Data de início do serviço foi definida');
    }

    public function servico(Request $request){

        Orcamento::find($request->id)->update(['servico' => $request->servico]);

        return redirect()->back()->with('update', 'Estado atual do serviço modificado com sucesso!');

    }

    public function download($id){

        $orcamento = Orcamento::select('orcamentos.*', 'clientes.nome as c_nome')
        ->join('clientes', 'clientes.id', 'orcamentos.cliente_id')
        ->where('orcamentos.id', $id)->first();

        $pdf = PDF::loadView('orcamentos.download', compact('orcamento'));

        //dd($pdf);

        return $pdf->setPaper('a4')->stream('Orçamento.pdf');

    }

    public function enviar($id){

        $user_id = auth()->user()->id;
        $user = User::where('user.id', $user_id)->first();

        $orcamento = Orcamento::select('orcamentos.*', 'clientes.nome as c_nome',
                                       'clientes.email as c_email')
                                       ->join('clientes', 'clientes.id', 'orcamentos.cliente_id')
                                       ->where('orcamento.id', $id)->first();

        Mail::send('orcamentos.enviar', $orcamento, function($message){

            $message->from('izi.websoftware', $user->nome);
            $message->subject('Orçamento');
            $message->to($orcamento->c_email);

        });

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Orcamento::find($id)->delete();

        return redirect()->route('orcamentos.index');
    }
}
