@extends('layouts.base')

@section('content')

    <!-- Orçamento -->
    <div class="container my-3 pb-2 w-50 border rounded">

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

    <!-- Status & Inicio & Serviço-->
    <div class="container w-50 my-4">

        <div class="row justify-content-center">

            <!-- Status -->
            <div class="col-sm-3 pb-1 border rounded">
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
            
            <!-- Data Inicio do Serviço -->
            <div class="col-sm-3 ml-3 pb-1 border rounded">
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

            <!-- Serviço (Aprovado, Cancelado, Atrasado) -->
            <div class="col-sm-3 ml-3 pb-1 border rounded">
                <form action="/servico" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $orcamento->id }}">
                    <div class="form-group">
                        <label for="servico"><strong>ESTADO ATUAL</strong></label>
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
    <!-- Fim Status & Inicio & Serviço -->

    <!-- Ações - Editar - Enviar - Download -->
    <div class="container w-50 my-4">

        <div class="row justify-content-center">

            <div class="col-sm-3">
                <a href="{{ route('orcamentos.edit', ['orcamento' => $orcamento->id]) }}" class="btn btn-primary">Editar</a> 
            </div>

            <div class="col-sm-3">
                <a href="#" class="btn btn-primary">Enviar</a>
            </div>

            <div class="col-sm-3">
                <a href="#" class="btn btn-primary">Download</a>
            </div>

            <div class="col-sm-3">
                <a href="#" class="btn btn-primary">Excluir</a>
            </div>

        </div>
        
    </div>
    <!-- Fim Ações - Editar - Enviar - Download -->

@endsection