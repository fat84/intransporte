<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    //
    protected $table = "vehiculo";

    public function VehiculoTercero(){
        return $this->hasMany('intransporte\VehiculoTercero', 'vehiculo_id', 'id');
    }

    public function VehiculoGasto(){
        return $this->hasMany('intransporte\VehiculoGasto', 'vehiculo_id', 'id');
    }
}
