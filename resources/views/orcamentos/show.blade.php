@extends('layouts.base')

@section('content')

    @if(session('enviado'))
        <script>
            window.alert( "{{ session('enviado') }}" );
        </script>
    @endif

<div class="row mt-5 mb-2 mx-5">

    <!-- Orçamento -->
    <div class="col ml-5 border rounded">
        
        <div class="row">
            <div class="col-sm-9">
                <img src="{{ asset('imagens/brand.png') }}" alt="Sua Logomarca" width="300px" height="150px;" >
            </div>
            <div class="col-sm-3">
                <img src="{{ asset('imagens/izimarcatransp.png') }}" alt="" width="100px;" class="ml-auto">
                <small>www.iziorcamentos.com.br</small>
            </div>
        </div>

        <div class="row mt-5 justify-content-center" style="font-size: 25px;">
            <strong>Orçamento</strong>
        </div>

        <div class="container mt-4">

            <div class="row">
                <strong>Solicitante:&nbsp</strong>{{ $orcamento->c_nome }} {{ $orcamento->c_sobrenome}}
            </div>
            
            <hr>

            <div class="row mt-3">
                <div class="col">

                    <div class="row"><strong>{{ $orcamento->titulo }}</strong></div>

                    <div class="row">
                        <strong>Descrição:</strong>
                        <div class="container">
                            {{ $orcamento->descricao }}
                        </div>
                    </div>

                </div>
            </div>

            <hr>

            <div class="row mt-3">
                <strong>Serviço de terceiros:</strong>
                <div class="container">
                    {{ $orcamento->descservice }}
                </div>
            </div>

            <hr>

            <div class="row mt-3">
                <strong>Prazo de conclusão:&nbsp</strong>{{ $orcamento->prazo }} dias
            </div>

            <hr>

            <div class="row mt-3">
                <table class="border border-dark">
                    <tr>
                        <td class=" p-2 border border-dark">
                            <strong>Total:&nbsp</strong>R$ {{ $orcamento->total }},00
                        </td>
                        <td class="p-2 border border-dark">
                            <strong>Material:&nbsp</strong>R$ {{ $orcamento->material }},00 <br>
                            <strong>Serviço de terceiros:&nbsp</strong>R$ {{ $orcamento->parceiro }},00 <br>
                            <strong>Mão de obra:&nbsp</strong>R$ {{ $orcamento->valor }},00
                        </td>
                    </tr>
                </table>
            </div>

            <hr>

            <div class="row mt-4">
                <strong>{{ Auth::user()->nome }}</strong>
            </div>

            <div class="row">
                <strong>{{ Auth::user()->email }}</strong>
            </div>

        </div>
   
    </div>
    <!-- Fim Orçamento -->

    <!-- STATUS, DATA-INICIO, SATATUS-ANDAMENTO -->
    <div class="col">

        <!-- Status & Inicio & Serviço-->
        <div class="container w-50 my-4">

            <div class="row justify-content-center">
                <!-- Status -->
                <div class="col-sm my-4 pb-1 border rounded">
                    <form action="/status" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $orcamento->id }}">
                        <div class="form-group">
                            <label for="status"><strong>STATUS</strong></label>
                            <select name="status" id="status" class="form-control">
                                @if($orcamento->status == NULL)
                                    <option selected disabled>Selecione</option>
                                    <option value="enviado">Enviado</option>
                                    <option value="aprovado">Aprovado</option>
                                    <option value="reprovado">Reprovado</option>
                                @elseif($orcamento->status == "enviado")
                                    <option selected disabled value="enviado">Enviado</option>
                                    <option value="aprovado">Aprovado</option>
                                    <option value="reprovado">Reprovado</option>
                                @elseif($orcamento->status == "aprovado" || $orcamento->status = "reprovado")
                                    <option selected disabled>{{ $orcamento->status }}</option>
                                @endif
                            </select>
                        </div>

                        @if( ($orcamento->status == "aprovado") || ($orcamento->status == "reprovado") )
                            <input type="submit" class="btn btn-secondary btn-sm" value="Confirmar status" disabled>
                        @else
                            <input type="submit" class="btn btn-secondary btn-sm" value="Confirmar status">
                        @endif

                    </form>
                </div>
                <!-- Fim Status -->
            </div>
    
            <!-- Data Inicio do Serviço -->
            <!-- A data de início do serviço só aparece, caso o orçamento esteja aprovado -->
            @if($orcamento->status == "aprovado")
                <!-- Se a data de inicio for nula mostra form para escolher a data -->
                @if($orcamento->inicio == NULL)
                    <div class="row justify-content-center">
                        <div class="col-sm mb-4 pb-1 border rounded">
                            <form action="/inicio" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $orcamento->id }}">
                                <div class="form-group">
                                    <label for="inicio"><strong>Data de início</strong></label>
                                    <input type="date" id="inicio" name="inicio" class="form-control">
                                </div>
                                <input type="submit" class="btn btn-secondary btn-sm" value ="Confirmar início">
                            </form>
                        </div>
                    </div>
                @else <!-- Se a data de incício já estiver sido escolhida, mostra a data na tela -->
                    <div class="row justify-content-center">
                        <div class="col-sm mb-4 pb-1 border rounded">
                            <span>
                                <strong>Data de início:</strong> &nbsp; {{ $orcamento->inicio }}
                            </span>
                        </div>
                    </div>
                @endif 

            @endif
            <!-- Fim Data Inicio do Serviço -->

            <!-- SERVIÇO (Concluído, Cancelado, Atrasado) -->
            <!--  Formulário para marcar serviço como concluído ou cancelado aparece na tela, se a data de inicio do serviço já foi escolhida -->
            @if($orcamento->inicio !== NULL)

                <!-- Se o servico estiver atrasado, aparece formulário para marcar como concluído ou cancelado -->
                @if(($orcamento->servico == "atrasado") || ($orcamento->servico == NULL))
                    <div class="row justify-content-center">
                        <div class="col-sm mb-2 pb-1 border rounded">
                            <form action="/servico" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $orcamento->id }}">
                                <div class="form-group">
                                    <label for="servico"><strong>SERVIÇO</strong></label>
                                    <select name="servico" id="servico" class="form-control">
                                        <option selected disabled>{{ $orcamento->servico }}</option>
                                        <option value="concluido">Concluído</option>
                                        <option value="cancelado">Cancelado</option>
                                        <!-- Se o serviço não for nulo, nem atrasado, então ele está concluído ou cancelado e será mostrado o status atual -->                                    
                                    </select>
                                    <small style="color: red;">
                                        Concluiu o serviço ou foi cencelado? Escolha uma das opções
                                    </small>
                                </div>
                                    <input type="submit" class="btn btn-secondary btn-sm" value="Confirmar estado">
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Se não está atrasado, está concluído ou cancelado e será mostrado o status na tela -->
                    <div class="row justify-content-center">
                        <div class="col-sm mb-2 pb-1 border rounded">
                            @if($orcamento->servico == "concluido")
                                <span><Strong>SERVIÇO:</Strong></span>
                                &nbsp;
                                <span style="color: blue;"><strong>{{ $orcamento->servico }}</strong></span>
                            @elseif($orcamento->servico == "cancelado")
                                <span><strong>{{ $orcamento->servico }}</strong></span>
                            @endif
                        </div>
                    </div>
                @endif

            @endif
            <!-- Fim Serviço (Concluído, Cancelado, Atrasado) -->

        </div>
    
    </div>
    <!-- Fim (STATUS, DATA-INICIO, SATATUS-ANDAMENTO) -->

    </div>

</div>

    
    <!-- Ações - Editar - Enviar - Download -->
    <div class="container w-50 mb-4">

        <div class="row justify-content-center">

            <div class="col-sm-3" style="font-size: 20px;">
                <a href="{{ route('orcamentos.edit', ['orcamento' => $orcamento->id]) }}">
                    <strong>Editar</strong> <i class="fas fa-edit"></i>
                </a> 
            </div>

            <div class="col-sm-3" style="font-size: 20px;">
                <a href="{{ route('sendEmail', ['orcamento' => $orcamento->id]) }}">
                    <strong>Enviar</strong> <i class="far fa-envelope"></i>
                </a>
            </div>

            <div class="col-sm-3" style="font-size: 20px;">
                <a href="/orcamento/download/{{ $orcamento->id }}">
                    <strong>Download</strong> <i class="fas fa-file-download"></i>
                </a>
            </div>

            <div class="col-sm-3" style="font-size: 20px;">
                <a href="#">
                    <strong>Excluir</strong> <i class="fas fa-trash"></i>
                </a>
            </div>

        </div>
        
    </div>
    <!-- Fim Ações - Editar - Enviar - Download -->

@endsection