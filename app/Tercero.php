<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Tercero extends Model
{
    //
    protected $table = "tercero";

    public function Ciudad(){
        return $this->belongsTo('intransporte\Ciudad');
    }

    public function Obras(){
        return $this->hasMany('intransporte\Obra', 'tercero_id', 'id');
    }

    public function Vehiculos(){
        return $this->belongsToMany('intransporte\Vehiculo','vehiculo_tercero','tercero_id','vehiculo_id');
    }

    public function VehiculosTercero(){
        return $this->hasMany('intransporte\VehiculoTercero', 'tercero_id', 'id');
    }

}
