<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    //
    use SoftDeletes;
    protected $table = "vehiculo";
    protected  $fillable =['id','marca','placa','modelo','created_at','updated_at','deleted_at'];
    protected $dates = ['deleted_at'];
    public function VehiculoTercero(){
        return $this->hasMany('intransporte\VehiculoTercero', 'vehiculo_id', 'id');
    }

    public function VehiculoGasto(){
        return $this->hasMany('intransporte\VehiculoGasto', 'vehiculo_id', 'id');
    }

}
