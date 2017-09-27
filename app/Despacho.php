<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    //
    protected $table = "despacho";

    protected $fillable = ['id','despacho_id','prefijo','numero','tercero_id','usuario_id','obra_id',
        'vehiculo_tercero'];

    public function detalles(){
        return $this->hasMany('intransporte\DespachoDetalle','despacho_id','id');
    }

    public function User(){
        return $this->belongsTo('intransporte\User');
    }

    public function VehiculoTercero(){
        return $this->belongsTo('intransporte\VehiculoTercero');
    }
}
