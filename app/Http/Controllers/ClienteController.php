<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
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
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Cliente::create($request->all());

        $user_id = auth()->user()->id;

        $cliente = new Cliente();
        $cliente->user_id = $user_id;
        $cliente->nome = $request->nome;
        $cliente->sobrenome = $request->sobrenome;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->endereco = $request->endereco;
        $cliente->save();

        Session::flash('success', 'Cliente cadastrado com sucesso!');
        
        return redirect('/index');
        
    }

    //LISTAR CLIENTES do usuário logado - função criada para este sistema
    //Funcão criada para listar todos os registros de Cliente, pois não consegui fazer isso usando a função "show' que pede parâmetro
    public function listar(){

        //$clientes = Cliente::all(); //pegando todos os registros da tabela cliente através da classe Cliente que está em modelo

        $user_id = auth()->user()->id;

        //$clientes = Cliente::join('users', 'users.id', 'clientes.user_id')->where('clientes.user_id', $user_id)->get();

        $clientes = Cliente::where('clientes.user_id', $user_id)->paginate(10); //Tive que adicionar esta linha, porque usando a variável $clientes_user no compact retornou na view o user e não os clientes do user
        
        return view('clientes.listar', compact('clientes'));

        //return view('clientes.listar')->with(['clientes' -> $clientes]); //chamando a view com a variável clientes e passar para a view com o nome clientes
                                                                         //pega a coleção de dados de Clientes e vai passar para a view em formato de array
    }

    public function filtro(Request $request){
        //dd($request->all());
        $user_id = auth()->user()->id;
        //dd($user_id);

        $search = $request->search;
        //dd($search);

        $clientes = Cliente::where('user_id', $user_id)
                            ->where( function($query) use($search){
                                        $query->where('nome', 'like', $search.'%')
                                            ->orWhere('sobrenome', 'like', $search.'%')
                                            ->orWhere('email', 'like', $search.'%')
                                            ->orWhere('telefone', 'like', $search.'%');
                            })
                            ->paginate(10); //usou paginate porque a view tem paginação {{ $clientes->links() }}
                            //dd($clientes);
    
        return view('clientes.listar', compact('clientes'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id); //método find é usado para achar um registro do banco por meio do id e colocando dentro da variável $cliente

        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('clientes.edit', compact('cliente'));       
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
        Cliente::find($id)->update($request->all()); // Encontra o registro através do método find do Modelo cliente usando o $id como parâmetro
                                                                // Método update atualiza o registro no bd e tem como parâmetro o $reequest
        
        return redirect()->back()->with('update', 'Cadastro atualizado com sucesso!');
                                                                 
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::find($id)->delete(); //armazena dentro da variável $cliente o degistro encontrado
                                                 // Utiliza o método find da Classe Cliente com o parâmetro $id e depois utiliza o método delete

        return redirect()->route('clientes.index');
    }
}
