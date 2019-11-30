@extends('layouts.app')

@section('title', 'Orçamento de NomeCliente')

@section('content')

    <div class="container">

    @if(session('update'))
        <script>
            window.alert( "{{ session('update') }}" );
        </script>
    @endif
    
        <h3>Orçamento </h3> <br>
                <!-- INFORMAÇÕES DO ORCAMENTO-->
                <p><strong>Cliente</strong> - {{ $orcamento->c_nome }} {{ $orcamento->c_sobrenome }}</p>

                <p><strong>Descrição de serviço</strong> - {{ $orcamento->titulo }} - {{ $orcamento->descricao }}</p>

                <p><strong>Prazo (dias)</strong> - {{ $orcamento->prazo }}</p>
                
                <p><strong>Total</strong> - Mão de obra + Serviço</p>
                <!-- ################################################################################## -->

                <!-- STATUS -->
                @if(($orcamento->status == NULL) or ($orcamento->status == "enviado"))
                    <form action="/status" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $orcamento->id }}">
                        <p>
                            <strong>Status -</strong>
                            <select name="status">
                                <option value="{{ $orcamento->status }}" selected>{{ $orcamento->status }}</option>
                                <option value="enviado">Enviado</option>
                                <option value="aprovado">Aprovado</option>
                                <option value="reprovado">Reprovado</option>
                            </select>
                            <input type="submit" value="Definir">
                        </p>
                    </form>
                    <p><strong>* Selecione o status, assim que obtiver o retorno do cliente sobre o orçamento.</strong></p>
                @else
                    <p><strong>Status - </strong> {{ $orcamento->status }}</p>
                @endif
                <!-- ################################################################################## -->

                <!-- DATA INÍCIO -->
                @if(($orcamento->status == "aprovado") and ($orcamento->inicio == NULL))
                    <form action="/inicio" method="POST">
                        <input type="hidden" name="id" value="{{ $orcamento->id }}">
                        @csrf
                            <p>
                                <strong>Início: </strong> <input type="date" name="inicio">
                                <input type="submit" value="Confirmar">
                            </p>
                    </form>
                    <p><strong>* Marque a data de início do serviço - combine a data com o cliente e tenha maior controle sobre serviço</strong></p>
                @elseif($orcamento->inicio != NULL)
                    <p><strong>Início:</strong> {{ $orcamento->inicio }} </p>
                @endif
                <!-- ################################################################################## -->

                <!-- ESTADO ATUAL -->
                @if( ($orcamento->servico == "concluido") or ($orcamento->servico == "cancelado") )
                
                    <p><strong>Estado do serviço: </strong>{{ $orcamento->servico }}<p> 

                @elseif( ($orcamento->status == "aprovado") and ($orcamento->inicio != NULL) )
                    <form action="/servico" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $orcamento->id }}">
                        <p>
                            <strong>Estado do serviço -</strong>
                            <select name="servico">
                                <option value="{{ $orcamento->servico }}" selected>{{ $orcamento->servico }}</option>
                                <option value="concluido">Concluído</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                            <input type="submit" value="Salvar">
                        </p>
                    </form>
                    <p><strong>* Ao finalizar o serviço, selecione a opção concluído. Em caso de cancelamento, marque como cancelado.</strong></p>
                @endif
                <!-- ################################################################################## -->

                <br>
                
                <!-- OPÇÕES Enviar, Download, Editar, Excluir -->
                <table border="1">
                    <tr>
                        <td>
                            <a href="enviar/{{ $orcamento->id }}"><strong>Enviar</strong></a>
                        </td>
                        <td>
                            <strong><a href="download/{{ $orcamento->id }}">Download</a></strong>
                        </td>
                        <td>
                            <strong> <a href="{{ route('orcamentos.edit', ['orcamento' => $orcamento->id]) }}">Editar</a> </strong>
                        </td>
                        <td>
                            <strong><a href="{{ route('orcamentos.destroy', ['orcamento' => $orcamento->id]) }}">Excluir</a></strong> <br>
                        </td>
                    </tr>
                </table>
                <!-- ################################################################################## -->

                <br><br>
                <p><strong> <a href="{{ url('/index') }}"> HOME </a> </strong></p>
    </div>

@endsection