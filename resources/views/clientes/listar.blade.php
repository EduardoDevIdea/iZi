@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

    <div class="container">

        <div class="col-md-12">
        
            <h2>Lista de Clientes</h2>

            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <!-- FILTRO - buscar registro de cliente digitando no campo -->
                    <form action="/search_cli" method="POST">
                        @csrf
                        Buscar: <input type="text" name="search" required> <input type="submit" value="Ok">
                    </form>
                </li>
                <li class="nav-item">
                <form action="/wpp" method="POST">
                        @csrf
                        WhatsApp: <input type="text" name="wpp" required> <input type="submit" value="Ok">
                    </form>
                </li>
            </ul>

            
            <br>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Funções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->sobrenome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <!-- passar no parâmetro do helper route um array indicando o id do registro que quer mostrar -->
                            <td>
                                <strong><a href="{{ route('clientes.show', ['cliente' => $cliente->id]) }}">Detalhar -</a></strong>
                                <strong><a href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}"> Editar -</a></strong>
                                <!-- Para deletar é preciso fazer através de um form e passar um parâmetro chamado delete para identificar que está deletando para não dar erro ou passar um parâmetro chamado except na rota cliente-->
                                <strong><a href="{{ route('clientes.destroy', ['cliente' => $cliente->id]) }}"> Excluir</a></strong>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            <table>
        </div>
        {{ $clientes->links() }}
    </div>
    
    <p> <strong> <a href="{{ url('/index') }}"> Home </a> </strong> </p>

@endsection