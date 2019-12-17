@extends('layouts.app')

@section('title', 'Orçamentos')

@section('content')

    <div class="container">
        <div class="col-md-12">
        
            <h2>Lista de Orçamentos</h2>
            
            <!-- Filtro -->
            <form action="/search_orc" method="POST">
                @csrf
                Filtrar: <input type="text" name="search" required> <input type="submit" value="Ok">
            </form>
            <br>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Prazo (dias)</th>
                        <th scope="col">Total</th> <!-- Valor mão de obra + Material + Serviço terceiro-->
                        <th scope="col">Status</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Funções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orcamentos as $orcamento)
                            <tr>
                                <td>{{ $orcamento->titulo }}</td>
                                <td>{{ $orcamento->c_nome }}</td>
                                <td>{{ $orcamento->prazo }}</td>
                                <td>{{ $orcamento->total }}</td>
                                @if( $orcamento->status == "aprovado" )
                                    <td><strong>{{ $orcamento->status }}</strong></td><!--Status default Não enviado, caso o user não modifique após salvar o orçamento-->
                                @elseif( $orcamento->status == "enviado" )
                                    <td class="text-success"><strong>{{ $orcamento->status }}</strong></td>
                                @else
                                    <td>{{ $orcamento->status }}</td>
                                @endif

                                @if( $orcamento->servico == "atrasado" )
                                    <td class="text-danger">{{ $orcamento->servico }}</td>
                                @else
                                    <td>{{ $orcamento->servico }}</td>
                                @endif
                                <td>
                                    <strong><a class="btn btn-primary btn-sm" href="{{ route('orcamentos.show', ['orcamento' => $orcamento->id]) }}"> Detalhar</a></strong>
                                    <!-- Para deletar é preciso fazer através de um form e passar um parâmetro chamado delete para identificar que está deletando para não dar erro ou passar um parâmetro chamado except na rota orcamento-->
                                    <strong><a class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')" href="{{ route('orcamentos.destroy', ['orcamento' => $orcamento->id]) }}"> Excluir</a></strong> <!-- Criar Alerta antes de excluir -->
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            <table>
        </div>
        {{ $orcamentos->links() }}
    </div>

    <br>

    <p> <strong> <a href="{{ url('/index') }}"> Home </a></p>

@endsection