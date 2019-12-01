@extends('layouts.app')

@section('title', 'Cadastro de Cliente')

@section('content')

    <div class="container">

    <h2>Cadastro de Cliente</h2>

        <form action="{{ route('clientes.store') }}" method="POST"> <!-- a rota clientes.store pode ser verificada através de um comendo no terminal, pois está sendo usado o resource na rota, -->
            @csrf <!-- Parametro csrf para ativar um token que cria um input do tipo oculto, sem isso não é possível inserir algo no banco por meio de um formulario-->
            <p>
                Nome<br><input type="text" name="nome" required>
            </p>
            <p>
                Sobrenome<br><input type="text" name="sobrenome" required>
            </p>
            <p>
                Email<br><input type="text" name="email" required>
            </p>
            <p>
                Telefone<br><input type="text" name="telefone" required>
            </p>
            <p>
                Endereço<br><input type="text" name="endereco" required>
            </p>
            <p>
            Tipo<br>
                <select name="tipo">
                    <option value="pessoa fisica">Pessoa Física</option>
                    <option value="pessoa juridica">Pessoa Jurídica</option>
                </select>
            </p>

            <br>

            <p><input type="submit" value="Cadastrar" class="tt"></p>

            <br>

            <p> <strong> <a href="{{ url('/index') }}"> Voltar </a> </strong> </p>

        </form>
    </div>

@endsection