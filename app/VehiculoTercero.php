<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class VehiculoTercero extends Model
{
    //
    protected $table = "vehiculo_tercero";

    public function Despacho(){
        return $this->hasMany('intransporte\Despacho', 'vehiculo_tercero', 'id');
    }

    public function  Tercero(){
        return $this->belongsTo('intransporte\Tercero','tercero_id','id');
    }

    public function  Vehiculo(){
        return $this->belongsTo('intransporte\Vehiculo_id','vehiculo_id','id');
    }
}
