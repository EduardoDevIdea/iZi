@extends('layouts.app')

@section('title', 'Cadastro de Cliente')

@section('content')

    <div class="container">

    <h2>Cadastro de Cliente</h2>

        <form action="{{ route('clientes.store') }}" method="POST"> <!-- a rota clientes.store pode ser verificada através de um comendo no terminal, pois está sendo usado o resource na rota, -->
            @csrf <!-- Parametro csrf para ativar um token que cria um input do tipo oculto, sem isso não é possível inserir algo no banco por meio de um formulario-->
            <p>
                Nome<br><input type="text" name="nome">
            </p>
            <p>
                Sobrenome<br><input type="text" name="sobrenome">
            </p>
            <p>
                Email<br><input type="text" name="email">
            </p>
            <p>
                Telefone<br><input type="text" name="telefone">
            </p>
            <p>
                Endereço<br><input type="text" name="endereco">
            </p>
            <p>
            Tipo<br>
                <select name="tipo">
                    <option value="pessoa fisica">Pessoa Física</option>
                    <option value="pessoa juridica">Pessoa Jurídica</option>
                </select>
            </p>

            <p><input type="submit" value="Cadastrar" class="tt"></p>

            <p> <strong> <a href="{{ url('/index') }}"> Cancelar </a> </strong> </p>

            <!-- <button type="submit" formaction="{{ url('/index') }}">Cancelar</button> -->
        </form>
    </div>

@endsection