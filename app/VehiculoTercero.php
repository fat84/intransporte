<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class VehiculoTercero extends Model
{
    //
    protected $table = "vehiculo_tercero";

    protected $fillable = ['vehiculo_id', 'tercero_id','fecha_asignacion','fecha_retiro'];

    public function despacho(){
        return $this->hasMany('intransporte\Despacho', 'vehiculo_tercero', 'id');
    }

    public function  tercero(){
        return $this->belongsTo('intransporte\Tercero','tercero_id','id');
    }

    public function  vehiculo(){
        return $this->belongsTo('intransporte\Vehiculo','vehiculo_id','id');
    }
}
