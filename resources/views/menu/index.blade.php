@extends('layouts.base')

@section('title', 'Menu')

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

@section('content')

        <div class="container" style="margin-top: 50px;">

               <div class="row">
			<div class="col text-center" style="font-size: 50px;">
				<p style="margin-bottom: 0rem;">
                                        <a href="{{ route('orcamentos.create') }}">Novo Orçamento</a>
				</p>
				<p style="margin-bottom: 0rem;">
                                        <a href="/lista_orcamentos">Listar Orçamentos</a>
                                </p>
                                <p style="margin-bottom: 0rem;">
                                        <a href="{{ route('clientes.create') }}">Cadastrar Cliente</a>
                                </p>
                                <p style="margin-bottom: 0rem;">
                                        <a href="/list_cli">Listar Clientes</a>
                                </p>
                                <p style="margin-bottom: 0rem;">
                                        <a href="/agendar">Agendar Visita</a>
                                </p>
                        </div>
                </div>

        </div>

@endsection
