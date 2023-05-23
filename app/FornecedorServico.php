<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FornecedorServico extends Model
{

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
