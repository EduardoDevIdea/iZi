@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

    <div class="container">
        <div class="col-md-12">
        
            <h2>Lista de Clientes</h2>
            <!-- Filtrar cliente com botão formato lupa-->
            <form>
                Filtrar: <input type="text" name="filtro_cli"> <input type="submit" value="Procurar">
            </form>
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
    </div>

    <p> <strong> <a href="{{ url('/index') }}"> Cancelar </a> </strong> </p>

@endsection