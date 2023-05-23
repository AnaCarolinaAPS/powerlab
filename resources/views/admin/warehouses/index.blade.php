@extends('adminlte::page')

@section('title', 'Power Trade - Warehouse')

@section('content_header')
    <h1 class="m-0 text-dark">Warehouse</h1>
@stop

@section('content')
<div id="app">
    <page-component tamanho="12">
        <panel-component>
            <div class="row">
                <div class="col-md-6">
                    <modal-link-component tipo="link" nome="adicionar" titulo="Criar" css="btn btn-info"></modal-link-component>
                </div>
                <div class="col-md-6">
                    <breadcrumb-component v-bind:lista="{{ $listaMigalhas }}"></breadcrumb-component>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table-list-component
                        v-bind:titulos="['#', 'Data', 'WR', 'Shipper']"
                        v-bind:itens="{{ json_encode($listaModelo) }}"
                        ordem="desc" ordemcol="0"
                        criar="" detalhe="/warehouses/" editar="/warehouses/" deletar="/warehouses/" token="{{ csrf_token() }}"
                        modal="sim"
                    >
                    </table-list-component>
                </div>
            </div>
        </panel-component>
    </page-component>

    <modal-component nome="adicionar" titulo="Novo Registro">
        <formulario-component id="formAdicionar" css="" action="{{ route('warehouses.store') }}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="wr">Nro de Warehouse</label>
                <input type="text" class="form-control" id="wr" name="wr" placeholder="WR-0000" value="{{ old('wr') }}">
            </div>
            <div class="form-group">
                <label for="descricao">Data Criação</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Descrição da Warehouse" value="{{ old('description') }}">
            </div>
            <div class="form-group">
                <label for="wr">Shippers</label>
                <input type="text" class="form-control" id="wr" name="wr" placeholder="WR-0000" value="{{ old('wr') }}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Descrição da Warehouse" value="{{ old('description') }}">
            </div>
        </formulario-component>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal-component>
</div>
@stop
