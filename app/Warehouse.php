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
}
