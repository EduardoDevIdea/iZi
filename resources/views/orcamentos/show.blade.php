@extends('layouts.app')

@section('title', 'Orçamento de NomeCliente')

@section('content')

    <div class="container">

    @if(session('update'))
        <script>
            window.alert( "{{ session('update') }}" );
        </script>
    @endif

    @if(session('enviado'))
        <script>
            window.alert( "{{ session('enviado') }}" );
        </script>
    @endif
    
        <h3>Orçamento </h3> <br>
                <!-- INFORMAÇÕES DO ORCAMENTO-->

            <table border="1">
                <tr>
                    <td>
                        <strong>Cliente</strong> - {{ $orcamento->c_nome }} {{ $orcamento->c_sobrenome }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Descrição de serviço</strong> - {{ $orcamento->titulo }}: {{ $orcamento->descricao }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Material</strong> - R$ {{ $orcamento->material }},00
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Mão de obra</strong> - R$ {{ $orcamento->valor }},00
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Serviço terceirizado</strong> - {{ $orcamento->descservice }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Valor serviço terceirizado</strong> - R$ {{ $orcamento->parceiro }},00 
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Prazo</strong> - {{ $orcamento->prazo }} dias
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Total</strong> - R$ {{ $orcamento->total }},00
                    </td>
                </tr>
            </table>

            <br>

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

                
                <!-- OPÇÕES Enviar, Download, Editar, Excluir -->
                <table>
                    <tr>
                        <td>
                            <a class="btn btn-success btn-sm" href="/orcamento/enviar/{{ $orcamento->id }}"><strong>Enviar</strong></a>
                        </td>
                        <td>
                            <strong><a class="btn btn-secondary btn-sm" href="/orcamento/download/{{ $orcamento->id }}">Download</a></strong>
                        </td>
                        <td>
                            <strong> <a class="btn btn-warning btn-sm" href="{{ route('orcamentos.edit', ['orcamento' => $orcamento->id]) }}">Editar</a> </strong>
                        </td>
                        <td>
                            <strong><a class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')" href="{{ route('orcamentos.destroy', ['orcamento' => $orcamento->id]) }}">Excluir</a></strong> <br>
                        </td>
                    </tr>
                </table>
                <!-- ################################################################################## -->

                <br><br>
                <p>
                    <strong> <a href="{{ url('/index') }}"> Home </a> </strong>&nbsp;&nbsp;&nbsp;
                    <strong> <a href="/list_orc"> Voltar </a> </strong>
                </p>
    </div>

@endsection