@extends('layouts.app')

@section('title', 'Editar Orçamento')

@section('content')

    <div class="container">

        <h2>Editar Orçamento</h3><br>

        @if(session('update'))
            <script>
                window.alert( "{{ session('update') }}" );
            </script>
        @endif

        <form action="{{ route('orcamentos.update', ['orcamento' => $orcamento->id]) }}" method="POST"> 
            @csrf
            @method('PUT') <!-- usar esse método, porque o update não permite usaar o POST-->
            <p>
                <strong>Cliente</strong>
                <select name="cliente_id">
                        @foreach($clientes as $cliente)
                            <option 
                                {{ ($orcamento->cliente_id == $cliente->id) ? 'selected':null }}
                                value="{{ $cliente->id }}">
                                {{ $cliente->nome }} 
                                {{ $cliente->sobrenome }}
                            </option>
                        @endforeach
                </select>
            </p>
                <strong>Título</strong><br><input type="text" name="titulo" value="{{ old('orcamento', $orcamento->titulo) }}">
            </p>
            <p>
                <strong>Descrição</strong><br><textarea name="descricao" >{{ old('orcamento', $orcamento->descricao) }}</textarea>
            </p>
            <p>
                <strong>Custo com material</strong><br><input type="number" name="material" value="{{ old('orcamento', $orcamento->material) }}">
            </p>
            <p>
                <strong>Serviço de terceiros</strong><br>
                <textarea name="descservice">{{ old('orcamento', $orcamento->descservice) }}</textarea>  &nbsp;&nbsp;&nbsp;

                <strong>Valor do serviço terceirizado:</strong>
                <input type="number" name="parceiro" value="{{ old('orcamento', $orcamento->parceiro) }}">
            </p>
            <p>
                <strong>Prazo</strong><br><input type="number" name="prazo" min="1" max="365" value="{{ old('orcamento', $orcamento->prazo) }}">
                <select name="tempo" value="{{ old('orcamento', $orcamento->tempo) }}">
                    <option></option>
                    <option value="dia">Dia(s)</option>
                    <option value="mes">Mês(s)</option>
                    <option value="ano">Ano(s)</option>
                </select>
            </p>
            <p>
                <strong> Valor (sua mão de obra)</strong><br><input type="number" name="valor" value="{{ old('orcamento', $orcamento->valor) }}">
            </p>

            <p><input type="submit" value="Salvar" ></p>

            <p><input type="submit" value="Salvar e Enviar" ></p>

            <p> 
                <strong> <a href="{{ url('/index') }}"> Home </a> </strong>&nbsp;&nbsp;&nbsp;
                <strong> <a href="/list_orc"> Lista de Orçamentos </a> </strong>
            </p>

            <!-- <button type="submit" formaction="{{ url('/index') }}">Cancelar</button> -->
        </form>
    </div>

@endsection