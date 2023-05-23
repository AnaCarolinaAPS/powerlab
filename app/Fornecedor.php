<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Fornecedor extends Model
{
    protected $fillable = ['name', 'contato', 'description'];

    protected $dates = ['deleted_at'];

    public function servicos()
    {
        return $this->hasMany(FornecedorServico::class);
    }

    // public static function listaFornecedors() {
    //     $lista = DB::table('shippers')
    //                     ->select('shippers.id', 'shippers.name', 'shippers.description')
    //                     ->whereNull('shippers.deleted_at')
    //                     ->get();
    //     return $lista;
    // }

    public static function listaFornecedorServicos()
    {
        $lista = FornecedorServico::select('fornecedor_servicos.id', 'fornecedor_servicos.date_created', 'fornecedor_servicos.name', 'fornecedor_servicos.price', 'fornecedor_servicos.tipo')
            ->leftJoin('fornecedor_servicos AS fs', function ($join) {
                $join->on('fornecedor_servicos.id', '=', 'fs.id')
                    ->whereNull('fs.deleted_at');
            })
            ->selectRaw('CASE WHEN fs.id IS NULL THEN "Inativo" ELSE "Ativo" END AS ativo')
            ->orderByRaw('ativo DESC, date_created DESC')
            ->get();

        return $lista;
    }
}
