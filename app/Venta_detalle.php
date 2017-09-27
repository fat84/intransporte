<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Venta_detalle extends Model
{
    protected $table = "venta_detalle";
    protected $fillable = ['venta_id','despacho_detalle_id'];

    public function venta(){
        return $this->belongsTo('intransporte\Venta', 'venta_id', 'id');
    }
    public function despacho_detalle(){
        return $this->belongsTo('intransporte\DespachoDetalle', 'despacho_detalle_id', 'id');
    }
}
