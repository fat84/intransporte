<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    //
    protected $table = "despacho";

    protected $fillable = ['despacho_id'];

    public function Detalles(){
        return $this->hasMany('intransporte\DespachoDetalle','despacho_id','id');
    }

    public function User(){
        return $this->belongsTo('intransporte\User');
    }

    public function VehiculoTercero(){
        return $this->belongsTo('intransporte\VehiculoTercero');
    }
}
