@extends('layouts.base')

@section('content')

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

            <div class="row mt-3">
                <strong>Descição:</strong>
                <div class="container">
                    {{ $orcamento->descricao }}
                </div>
            </div>

            <div class="row mt-3">
                <strong>Serviço de terceiros:</strong>
                <div class="container">
                    {{ $orcamento->descservice }}
                </div>
            </div>

            <div class="row mt-3">
                <strong>Prazo de conclusão:&nbsp</strong>{{ $orcamento->prazo }} dias
            </div>

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

            <div class="row mt-4">
                <strong>{{ Auth::user()->nome }}</strong>
            </div>

            <div class="row">
                <strong>{{ Auth::user()->email }}</strong>
            </div>

        </div>
   
    </div>
    <!-- Fim Orçamento -->

    <div class="col">

        <!-- Status & Inicio & Serviço-->
        <div class="container w-50 my-4">

            <div class="row justify-content-center">
                <!-- Status -->
                <div class="col-sm mt-4 pb-1 border rounded">
                    <form action="/status" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $orcamento->id }}">
                        <div class="form-group">
                            <label for="status"><strong>STATUS</strong></label>
                            <select name="status" id="status" class="form-control">
                                <option value="enviado">Enviado</option>
                                <option value="aprovado">Aprovado</option>
                                <option value="reprovado">Reprovado</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-secondary btn-sm" value="Confirmar status">
                    </form>
                </div>
                <!-- Fim Status -->
            </div>
    
            <div class="row justify-content-center">
                <!-- Data Inicio do Serviço -->
                <div class="col-sm my-4 pb-1 border rounded">
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
                <!-- Fim Data Inicio do Serviço -->
            </div>

            <div class="row justify-content-center">
                <!-- Serviço (Aprovado, Cancelado, Atrasado) -->
                <div class="col-sm mb-2 pb-1 border rounded">
                    <form action="/servico" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $orcamento->id }}">
                        <div class="form-group">
                            <label for="servico"><strong>SERVIÇO</strong></label>
                            <select name="servico" id="servico" class="form-control">
                                <option value="concluido">Concluído</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-secondary btn-sm" value="Confirmar estado">
                    </form>
                </div>
                <!-- Fim Serviço (Aprovado, Cancelado, Atrasado) -->
            </div>

        </div>
    
    </div>
    <!-- Fim Status & Inicio & Serviço -->

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
                <a href="#">
                    <strong>Enviar</strong> <i class="far fa-envelope"></i>
                </a>
            </div>

            <div class="col-sm-3" style="font-size: 20px;">
                <a href="#">
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