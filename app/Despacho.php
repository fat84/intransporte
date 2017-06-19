<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    //
    protected $table = "despacho";

    public function Detalles(){
        return $this->belongsTo('intransporte\DespachoDetalle');
    }

    public function User(){
        return $this->belongsTo('intransporte\User');
    }

    public function VehiculoTercero(){
        return $this->belongsTo('intransporte\VehiculoTercero');
    }
}
