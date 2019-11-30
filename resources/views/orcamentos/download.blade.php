@extends('layouts.app')

@section('title', 'Orçamento de NomeCliente')

@section('content')

    <div class="container">

        <h3> iZi - Orçamento </h3> <br>
            
            <p><strong>Cliente</strong> - {{ $orcamento->c_nome }} {{ $orcamento->sobrenome }}</p>

            <p><strong>Descrição de serviço</strong> - {{ $orcamento->titulo }} - {{ $orcamento->descricao }}</p>

            <p><strong>Prazo</strong> - {{ $orcamento->prazo }} dias</p>
            
            <p><strong>Total</strong> - Mão de obra + Serviço</p>
    </div>

@endsection