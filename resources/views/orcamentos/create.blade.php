@extends('layouts.app')

@section('title', 'Criar Orçamento')

@section('content')

    <div class="container">

    <h2>Novo Orçamento</h2> <br>

        <form action="{{ route('orcamentos.store') }}" method="POST"> 
            @csrf
            <p>
                <strong>Cliente</strong>
                <select name="cliente_id" required>
                    <option></option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">
                                {{ $cliente->nome }} {{ $cliente->sobrenome }}
                            </option>
                        @endforeach
                </select>
            </p>
                <strong>Título</strong><br><input type="text" name="titulo" required>
            </p>
            <p>
                <strong>Descrição</strong><br><textarea name="descricao" required></textarea>
            </p>
            <p>
                <strong>Custo com material</strong><br><input type="number" name="material">
            </p>
            <p>
                <strong>Serviço de terceiros</strong><br>
                <textarea name="descservice"></textarea>  &nbsp;&nbsp;&nbsp;

                <strong>Valor do serviço terceirizado:</strong>
                <input type="number" name="parceiro">
            </p>
            <p>
                <strong>Prazo</strong><br><input type="number" name="prazo" min="1" max="365" required>
                <select name="tempo" required>
                    <option></option>
                    <option value="dia">Dia(s)</option>
                    <option value="mes">Mês(s)</option>
                    <option value="ano">Ano(s)</option>
                </select>
            </p>
            <p>
                <strong>Valor</strong><br><input type="number" name="valor" required>
            </p>

            <p><input type="submit" value="Salvar"></p>

            <p><input type="submit" value="Salvar e Enviar" ></p>

            <br> 
            
            <strong> <a href="{{ url('/index') }}"> Página inicial </a> </strong>

            <!-- <button type="submit" formaction="{{ url('/index') }}">Cancelar</button> -->
        </form>
    </div>

@endsection