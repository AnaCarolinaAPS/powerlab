@extends('adminlte::page')

@section('title', 'Power Trade - Fornecedores')

@section('content_header')
    <h1 class="m-0 text-dark">Fornecedores</h1>
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
                        v-bind:titulos="['#', 'Nome', 'Contato', 'Descrição']"
                        v-bind:itens="{{ json_encode($listaModelo) }}"
                        ordem="desc" ordemcol="0"
                        criar="" detalhe="/fornecedors/" editar="/fornecedors/" deletar="/fornecedors/" token="{{ csrf_token() }}"
                        modal="sim"
                    >
                    </table-list-component>
                </div>
            </div>
        </panel-component>
    </page-component>

    <modal-component nome="adicionar" titulo="Novo Registro">
        <formulario-component id="formAdicionar" css="" action="{{ route('fornecedors.store') }}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Fornecedor" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="contato">Contato</label>
                <input type="text" class="form-control" id="contato" name="contato" placeholder="Contato do Fornecedor" value="{{ old('contato') }}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Descrição do Fornecedor" value="{{ old('description') }}">
            </div>
        </formulario-component>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal-component>
</div>
@stop
