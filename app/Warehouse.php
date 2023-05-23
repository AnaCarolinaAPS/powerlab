<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Warehouse extends Model
{
    use SoftDeletes;

    protected $fillable = ['wr', 'created_at', 'invoice', 'description'];

    protected $dates = ['deleted_at'];

    public function shipper()
    {
        return $this->hasOne(Shipper::class);
    }

    public static function listaWarehouses() {
        $lista = DB::table('warehouses')
                    ->join('shippers', 'shippers.id', '=', 'warehouses.shipper_id')
                    ->select('warehouses.id', 'warehouses.date_created', 'warehouses.wr', 'shippers.name')
                    ->whereNull('warehouses.deleted_at')
                    ->get();
                    // ->paginate($paginate);
        return $lista;
    }
}
