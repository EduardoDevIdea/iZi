<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Models\Cliente;

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
        
        return view('menu.index');
    }

    //-------LISTA TODOS ORCAMENTOS
    public function listar(){

        //$orcamentos = Orcamento::all();
        //$clientes = Cliente::all();

        $user_id = auth()->user()->id;
        $orcamentos = Orcamento::join('clientes', 'clientes.id', 'orcamentos.cliente_id')->where('orcamentos.user_id', $user_id)->get();

        //$orçamentos = Orcamento::where('user_id', $user_id);

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

        $orcamento = Orcamento::join('clientes', 'clientes.id', 'orcamentos.cliente_id')->where('orcamentos.id',$id)->first();
        //dd($orcamento);
        return view ('orcamentos.show', compact('orcamento'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
