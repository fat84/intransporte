<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class VehiculoGasto extends Model
{
    //
    protected $table = "vehiculo_gasto";

    public function Vehiculo(){
        return $this->belongsTo('intransporte\Vehiculo');
    }
}
