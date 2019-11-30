@extends('layouts.app')

@section('title', 'Criar Orçamento')

@section('content')

    <div class="container">

    <h2>Novo Orçamento</h2> <br>

        <form action="{{ route('orcamentos.store') }}" method="POST"> 
            @csrf
            <p>
                <strong>Cliente</strong>
                <select name="cliente_id">
                    <option></option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">
                                {{ $cliente->nome }} {{ $cliente->sobrenome }}
                            </option>
                        @endforeach
                </select>
            </p>
                <strong>Título</strong><br><input type="text" name="titulo">
            </p>
            <p>
                <strong>Descrição</strong><br><textarea name="descricao"></textarea>
            </p>
            <p>
                <input type="button" value="Material "><!-- ver forma de cadastrar material clicando em +1, caso hajam vários -->
            </p>
            <p>
                <input type="button" value="Serviço"><!-- ver forma de cadastrar serviço de gterceiros clicando em +1, caso hajam vários -->
            </p>
            <p>
                <strong>Prazo</strong><br><input type="number" name="prazo" min="1" max="365">
                <select name="tempo">
                    <option></option>
                    <option value="dia">Dia(s)</option>
                    <option value="mes">Mês(s)</option>
                    <option value="ano">Ano(s)</option>
                </select>
            </p>
            <p>
                <strong>Valor</strong><br><input type="number" name="valor">
            </p>

            <p><input type="submit" value="Salvar"></p>

            <p><input type="submit" value="Salvar e Enviar" ></p>

            <br> 
            
            <strong> <a href="{{ url('/index') }}"> Página inicial </a> </strong>

            <!-- <button type="submit" formaction="{{ url('/index') }}">Cancelar</button> -->
        </form>
    </div>

@endsection