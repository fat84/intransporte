<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class DespachoDetalle extends Model
{
    //
    protected $table = "despacho_detalle";

    public function Despacho(){
        return $this->belongsTo('intransporte\Despacho');
    }
}
