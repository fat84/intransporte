<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class VehiculoGasto extends Model
{
    //
    protected $table = "vehiculo_gasto";

    protected $fillable = ['vehiculo_id', 'user_id', 'concepto', 'valor', 'fecha'];

    public function Vehiculo(){
        return $this->belongsTo('intransporte\Vehiculo');
    }
}
