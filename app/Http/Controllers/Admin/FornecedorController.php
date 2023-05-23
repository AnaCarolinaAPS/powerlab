<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            // ["titulo" => "Admin", "url" => route('home')],
            ["titulo" => "Lista de Fornecedores", "url" => ""],
        ]);
        // $listaModelo = Fornecedor::listaShippers();
        $listaModelo = Fornecedor::select('id', 'name', 'contato', 'description')->get();
        return view('admin.fornecedores.index',compact('listaMigalhas', 'listaModelo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validacao = \Validator::make($data, [
            "name" => "required",
            "description" => "required",
        ]);

        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao)->withInput();
        }
        Fornecedor::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listaMigalhas = json_encode([
            // ["titulo" => "Admin", "url" => route('home')],
            ["titulo" => "Lista de Fornecedores", "url" => route('fornecedors.index')],
            ["titulo" => "Fornecedor", "url" => ""],
        ]);
        // $listaModelo = Fornecedor::listaShippers();
        $fornecedor = Fornecedor::find($id);
        $listaModelo = Fornecedor::select('id', 'name', 'contato', 'description')->get();
        return view('admin.fornecedores.show',compact('listaMigalhas', 'listaModelo', 'fornecedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validacao = \Validator::make($data, [
            "name" => "required",
            "contato" => "required",
            "description" => "required",
        ]);

        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao)->withInput();
        }
        Fornecedor::find($id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor $fornecedor)
    {
        //
    }
}
