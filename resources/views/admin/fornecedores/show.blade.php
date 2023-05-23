@extends('adminlte::page')

@section('title', 'Power Trade - Fornecedores')

@section('content_header')
    <h1 class="m-0 text-dark">{{$fornecedor->name}} - {{$fornecedor->description}}</h1>
@stop

@section('content')
<div id="app">
    <page-component tamanho="12">
        <panel-component>
            <breadcrumb-component v-bind:lista="{{ $listaMigalhas }}"></breadcrumb-component>
            <formulario-component id="formSalvar" css="" action="{{ route('fornecedors.update', $fornecedor->id) }}" method="post" enctype="" token="{{ csrf_token() }}">
                <div class="row">
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $fornecedor->id }}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Fornecedor" value="{{$fornecedor->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contato">Contato</label>
                            <input type="text" class="form-control" id="contato" name="contato" placeholder="Contato do Fornecedor" value="{{$fornecedor->contato}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Descrição do Fornecedor" value="{{$fornecedor->description}}">
                        </div>
                    </div>
                </div>
            </formulario-component>
            <div class="row">
                <div class="col-md-6">
                    <button form="formSalvar" class="btn btn-info">Salvar</button>
                </div>
                <div class="col-md-6">
                    <button form="formSalvar" class="btn btn-danger float-right">Excluir</button>
                </div>
            </div>
        </panel-component>
        <panel-component>
            <div class="row">
                {{-- <p>{{ json_encode($listaModelo) }}</p> --}}
                <div class="col-md-12">
                    <table-list-component
                        v-bind:titulos="['#', 'Fecha', 'Servicio', 'Precio', 'Tipo', 'Activo']"
                        v-bind:itens="{{ json_encode($listaModelo) }}"
                        ordem="desc" ordemcol="0"
                        criar="#adicionar" detalhe="/fornecedores/" editar="/fornecedores/" deletar="/fornecedores/" token="{{ csrf_token() }}"
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
                <label for="name">Fecha</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Fornecedor" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="contato">Servicio</label>
                <input type="text" class="form-control" id="contato" name="contato" placeholder="Contato do Fornecedor" value="{{ old('contato') }}">
            </div>
            <div class="form-group">
                <label for="descricao">Precio</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Descrição do Fornecedor" value="{{ old('description') }}">
            </div>
        </formulario-component>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal-component>
</div>
@stop
