@extends('layouts.app')

@section('title', 'Menu')

@section('content')
<div class="container">
        @if (Session::has('success'))
                 <script>
                         window.alert( "{{ Session::get('success') }}" );
                </script>

               <!-- ALERT ESTILO BOOTSTRAP 
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                        </div> 
                -->
        @endif

        <h2><a href="{{ route('clientes.create') }}">Cadastrar Cliente</a></h2>
        <h2><a href="/list_cli">Listar Clientes</a></h2>
        <h2><a href="{{ route('orcamentos.create') }}">Novo Orçamento</a></h2>
        <h2><a href="/list_orc">Listar Orçamentos</a></h2>
        <h2><a href="/agendar">Agendar Visita</h2></a>
</div>
@endsection
