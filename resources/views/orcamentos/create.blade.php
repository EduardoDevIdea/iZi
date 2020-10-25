@extends('layouts.base')

@section('title', 'Novo Orçamento')

@section('content')

    <div class="container py-4 border border-dark" style="width: 65%">

        <div class="form-row" style="margin-top: 35px; padding-bottom: 0rem;">
            <div class="form-group">
                <p style="font-size: 30px;"><strong>Novo Orçamento</strong></p>
            </div>
        </div>
        
        <form method="POST" action="{{ route('orcamentos.store') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="cliente">Cliente</label>
                    <select id="cliente" name="cliente_id" class="form-control" required>
                        <option>Selecione...</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }} {{ $cliente->sobrenome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label for="titulo">Título</label>
                    <input type="text"  id="titulo" name="titulo" class="form-control" placeholder="Ex.: Reforma cozinha" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-sm-8">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" class="form-control" rows="8" cols="50" required placeholder="Descreva as atividades"></textarea>
                </div>
                <div class="form-group col-sm-2">
                    <label for="valor">Mão de obra</label>
                    <input type="number" id="valor" name="valor" class="form-control" min="0" required>
                    <small class="text-muted">Valor da sua mão de obra</small>
                </div>
                <div class="form-group col-sm-2">
                    <label for="material">Material</label>
                    <input type="number" id="material" name="material" class="form-control" min="0">
                    <small class="text-muted">Custos: material, despesas, etc...</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-8">
                    <label for="descservice">Serviços de terceiros (opcional)</label>
                    <textarea id="descservice" name="descservice" class="form-control" rows="8" cols="50" placeholder="Descreva serviços que precisa contratar"></textarea>
                </div>
                <div class="form-group col-sm-2">
                    <label for="parceiro">Valor</label>
                    <input type="number" id="parceiro" name="parceiro" class="form-control" min="0">
                    <small class="text-muted">Valor do serviço contratado</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-2">
                    <label for="prazo">Prazo para entrega</label>
                    <input type="number" id="prazo" name="prazo" class="form-control" min="1" max="365" required>
                </div>
                <div class="form- col-sm-2">
                <label for="tempo">...</label>
                <select name="tempo" id="tempo" class="form-control" required>
                    <option>selecione</option>
                    <option value="dia">Dia(s)</option>
                    <option value="mes">Mês(s)</option>
                    <option value="ano">Ano(s)</option>
                </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-2">
                    <label for="validade">Dias de validade</label>
                    <input type="number" id="validade" name="validade" class="form-control" min="0" required>
                    <small class="text-muted">Orçamento válido até esta data</small>
                </div>
            </div>
            <div class="row justify-content-center">
                <input type="submit" value="Salvar" class="btn btn-primary" style="width: 35%">
            </div>
        </form>

    </div>

@endsection