<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Shippers;
use Illuminate\Http\Request;

class ShippersController extends Controller
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
            ["titulo" => "Lista de Shippers", "url" => ""],
        ]);
        $listaModelo = Shippers::listaShippers();
        // $listaModelo = Shippers::select('id', 'name', 'description');
        return view('admin.shippers.index',compact('listaMigalhas', 'listaModelo'));
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
        Shippers::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shippers  $shippers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Shippers::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shippers  $shippers
     * @return \Illuminate\Http\Response
     */
    public function edit(Shippers $shippers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shippers  $shippers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validacao = \Validator::make($data, [
            "name" => "required",
            "description" => "required",
        ]);

        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao)->withInput();
        }
        Shippers::find($id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shippers  $shippers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Shippers::find($id)->delete();
        return redirect()->back();
    }
}
