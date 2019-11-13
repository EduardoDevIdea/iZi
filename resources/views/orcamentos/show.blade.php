@extends('layouts.app')

@section('title', 'Orçamento de NomeCliente')

@section('content')

    <div class="container">

    <h3> Orçamento - {{ $orcamento->titulo }} de {{ $orcamento->nome }}</h3>
            
            <p><strong>Cliente</strong> - {{ $orcamento->nome }} {{ $orcamento->sobrenome }}</p>

            <p><strong>Descrição de serviço</strong> - {{ $orcamento->titulo }} - {{ $orcamento->descricao }}</p>

            <p><strong>prazo</strong> - {{ $orcamento->prazo }} dias</p>
            
            <p><strong>Total</strong> - Mão de obra + Serviço</p>
            
            <form action="{{ route('orcamentos.edit', ['orcamento' => $orcamento->id]) }}" method="POST">
                @csrf
                <p>
                    <strong>Definir Status</strong>
                    <select name="prazo">
                        <option value=""></option>
                        <option value="enviado">Enviado</option>
                        <option value="aprovado">Aprovado</option>
                        <option value="reprovado">Reprovado</option>
                        <option value="concluido">Concluido</option>
                        <option value="atrasado">Atrasado</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </p>
            </form>

            <p> <strong> <a href="{{ route('orcamentos.edit', ['orcamento' => $orcamento->id]) }}"> Editar </a> </strong> </p>

            <p><strong><a href="{{ route('orcamentos.destroy', ['orcamento' => $orcamento->id]) }}"> Excluir</a></strong></p>

            <p> <strong> <a href="{{ url('/index') }}"> Cancelar </a> </strong> </p>
    </div>

@endsection