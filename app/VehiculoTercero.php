<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class VehiculoTercero extends Model
{
    //
    protected $table = "vehiculo_tercero";

    protected $fillable = ['vehiculo_id', 'tercero_id','fecha_asignacion','fecha_retiro'];

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
