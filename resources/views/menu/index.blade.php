@extends('layouts.app')

@section('title', 'Menu')

@section('content')
<div class="row justify-content-center">

        <div class="col-md-3.9">

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

                <h1><a href="{{ route('clientes.create') }}">Cadastrar Cliente</a></h1>
                <h1><a href="/list_cli">Listar Clientes</a></h1>
                <h1><a href="{{ route('orcamentos.create') }}">Novo Orçamento</a></h1>
                <h1><a href="/list_orc">Listar Orçamentos</a></h1>
                <h1><a href="/agendar">Agendar Visita</h1></a>
        </div<
</div>
@endsection
