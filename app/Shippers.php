<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Shippers extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    protected $dates = ['deleted_at'];

    public static function listaShippers() {
        $listaShippers = DB::table('shippers')
                            ->select('shippers.id', 'shippers.name', 'shippers.description')
                            ->whereNull('shippers.deleted_at')
                            ->get();
        return $listaShippers;
    }

    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class);
    }
}
