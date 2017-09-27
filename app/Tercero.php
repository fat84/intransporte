<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Tercero extends Model
{
    //
    protected $table = "tercero";


    protected $fillable = ['nombre','tipo_persona','tipo_documento','documento','direccion','telefono',
    'correo','es_proveedor', 'es_empleado', 'es_cliente','ciudad_id'];

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
    public function venta(){
        return $this->hasMany('intransporte\Venta','tercero_id','id');
    }

}
