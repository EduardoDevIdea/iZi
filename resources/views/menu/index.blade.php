@extends('layouts.app')

@section('title', 'Menu')

@section('content')
<div class="container">
        <h2><a href="{{ route('clientes.create') }}">Cadastrar Cliente</a></h2>
        <h2><a href="list_cli">Listar Clientes</a></h2>
        <h2><a href="{{ route('orcamentos.create') }}">Cadastrar Orçamento</a></h2>
        <h2><a href="list_orc">Listar Orçamentos</a></h2>
        <h2>Agendar Visita</h2>
</div>
@endsection
