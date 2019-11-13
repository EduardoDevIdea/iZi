@extends('layouts.app')

@section('title', 'Editar Orçamento')

@section('content')

    <div class="container">

    <h2>Editar Orcamento</h3><br>

        <form action="{{ route('orcamentos.update', ['orcamento' => $orcamento->id]) }}" method="POST"> 
            @csrf
            @method('PUT') <!-- usar esse método, porque o update não permite usaar o POST-->
            <p>
                Cliente
                <select name="cliente_id">
                    <option value="">Selecione</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }} {{ $cliente->sobrenome }}</option>
                        @endforeach
                </select>
            </p>
                Título<br><input type="text" name="titulo" value="{{ old('orcamento', $orcamento->titulo) }}">
            </p>
            <p>
                Descrição<br><input type="text" name="descricao" value="{{ old('orcamento', $orcamento->descricao) }}">
            </p>
            <p>
                <input type="button" value="Material "><!-- ver forma de cadastrar material clicando em +1, caso hajam vários -->
            </p>
            <p>
                <input type="button" value="Serviço"><!-- ver forma de cadastrar serviço de gterceiros clicando em +1, caso hajam vários -->
            </p>
            <p>
                Prazo<br><input type="number" name="prazo" min="1" max="365" value="{{ old('orcamento', $orcamento->prazo) }}">
                <select name="tempo" value="{{ old('orcamento', $orcamento->tempo) }}">
                    <option></option>
                    <option value="dia">Dia(s)</option>
                    <option value="mes">Mês(s)</option>
                    <option value="ano">Ano(s)</option>
                </select>
            </p>
            <p>
                Valor<br><input type="number" name="valor" value="{{ old('orcamento', $orcamento->valor) }}">
            </p>

            <p><input type="submit" value="Salvar"></p>

            <p> <strong> <a href="{{ url('/index') }}"> Cancelar </a> </strong> </p>

            <!-- <button type="submit" formaction="{{ url('/index') }}">Cancelar</button> -->
        </form>
    </div>

@endsection