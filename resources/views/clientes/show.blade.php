@extends('layouts.app')

@section('title', 'Cadastro de Cliente')

@section('content')

    @if(session('update'))
        <script>
            window.alert( "{{ session('update') }}" );
        </script>
    @endif

    <div class="container">

    <h3> Cliente - {{ $cliente->nome }} {{ $cliente->sobrenome }}</h3>
            
            <p><strong>Nome</strong> - {{ $cliente->nome }}</p>

            <p><strong>Sobrenome</strong> - {{ $cliente->sobrenome }}</p>

            <p><strong>Email</strong> - {{ $cliente->email }}</p>
            
            <p><strong>Telefone</strong> - {{ $cliente->telefone }}</p>
            
            <p><strong>Endereço</strong> - {{ $cliente->endereco }}</p>
           
            <p><strong>Tipo</strong> - {{ $cliente->tipo}}</p>

            <br>

            <p>
                <strong> <a href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}"> Editar </a> </strong> &nbsp;&nbsp;&nbsp;
                <strong><a href="{{ route('clientes.destroy', ['cliente' => $cliente->id]) }}"> Excluir</a></strong>  &nbsp;&nbsp;&nbsp;
                <strong> <a href="{{ url('/index') }}"> Home </a> </strong>  &nbsp;&nbsp;&nbsp;
                <strong><a href="/list_cli">Voltar</a></strong>
            </p>
    </div>

@endsection