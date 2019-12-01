@extends('layouts.app')

@section('title', 'Cadastro de Cliente')

@section('content')

    <div class="container">

    @if(session('update'))
        <script>
            window.alert( "{{ session('update') }}" );
        </script>
    @endif

    <h2>Cadastro de Cliente</h2>

        <form action="{{ route('clientes.update', ['cliente' => $cliente->id]) }}" method="POST"> 
            @csrf <!-- Parametro csrf para ativar um token que cria um input do tipo oculto, sem isso não é possível inserir algo no banco por meio de um formulario-->
            @method('PUT') <!-- esse helper indica qual método usar, pois a rota update não aceira o método "POST", aceita o "PUT"  e outros -->
            <p>
                Nome<br><input type="text" name="nome" value="{{ old('cliente', $cliente->nome) }}"><!-- helper old é usado para manter os dados atualizados -->
            </p>
            <p>
                Sobrenome<br><input type="text" name="sobrenome" value="{{ old('cliente', $cliente->sobrenome) }}">
            </p>
            <p>
                Email<br><input type="text" name="email" value="{{ old('cliente', $cliente->email) }}">
            </p>
            <p>
                Telefone<br><input type="text" name="telefone" value="{{ old('cliente', $cliente->telefone) }}">
            </p>
            <p>
                Endereço<br><input type="text" name="endereco" value="{{ old('cliente', $cliente->endereco) }}">
            </p>
            <p>
            Tipo<br> <!-- ver como manter o valor anterior deste campo quando chamar esta view-->
                <select name="tipo">
                    <option value="{{ old('cliente', $cliente->tipo) }}">{{ $cliente->tipo }}</option>
                    <option value="pessoa fisica">Pessoa Física</option>
                    <option value="pessoa juridica">Pessoa Jurídica</option>
                </select>
            </p>

            <p><input type="submit" value="Atualizar"></p>

        </form>

        <p>
            <strong><a href="{{ route('clientes.destroy', ['cliente' => $cliente->id]) }}"> Excluir</a></strong>  &nbsp;&nbsp;&nbsp;
            <strong> <a href="{{ url('/index') }}"> Home </a> </strong>  &nbsp;&nbsp;&nbsp;
            <strong><a href="/list_cli">Voltar</a></strong>
        </p>

    </div>

@endsection