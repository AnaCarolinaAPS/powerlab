@extends('adminlte::page')

@section('title', 'Power Trade - Shippers')

@section('content_header')
    <h1 class="m-0 text-dark">Shippers</h1>
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
                            v-bind:titulos="['#', 'Nome', 'Descrição']"
                            v-bind:itens="{{ json_encode($listaModelo) }}"
                            ordem="desc" ordemcol="0"
                            criar="" detalhe="/shippers/" editar="/shippers/" deletar="/shippers/" token="{{ csrf_token() }}"
                            modal="sim" edtmodal="editar"
                        >
                        </table-list-component>
                    </div>
                </div>
            </panel-component>
        </page-component>

        <modal-component nome="adicionar" titulo="Novo Registro">
            <formulario-component id="formAdicionar" css="" action="{{ route('shippers.store') }}" method="post" enctype="" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Shipper" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Descrição do Shipper" value="{{ old('description') }}">
                </div>
            </formulario-component>
            <span slot="botoes">
                <button form="formAdicionar" class="btn btn-info">Adicionar</button>
            </span>
        </modal-component>
        {{-- <modal-component nome="editar" titulo="Editar Registro">
            <formulario-component id="formEditar" css="" :action="'/shippers/'+$store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name" placeholder="Nome do Shipper">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control" id="description" name="description" v-model="$store.state.item.description" placeholder="Descrição do Artigo">
                </div>
            </formulario-component>
            <span slot="botoes">
                <button form="formEditar" class="btn btn-info">Guardar</button>
            </span>
        </modal-component> --}}
        {{-- <modal-component nome="detalhe" v-bind:titulo="'Detalhe do Shipper: '">
            <p>@{{ $store.state.item.name }}</p>
            <p>@{{ $store.state.item.description }}</p>
        </modal-component> --}}
    </div>
@stop
