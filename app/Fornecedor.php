<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Fornecedor extends Model
{
    protected $fillable = ['name', 'contato', 'description'];

    protected $dates = ['deleted_at'];
}
