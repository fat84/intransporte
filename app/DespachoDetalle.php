<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class DespachoDetalle extends Model
{
    //
    protected $table = "despacho_detalle";
    protected $fillable = ['despacho_id','producto_id','cantidad','unidad','valor_unidad','porc_descuento','descuento','porc_impuesto','impuesto',''];

    public function despacho(){
        return $this->belongsTo('intransporte\Despacho', 'despacho_id', 'id');
    }
    public function producto(){
        return $this->belongsTo('intransporte\Producto', 'producto_id', 'id');
    }

    public function venta_detalle(){
        return $this->hasMany('intransporte\Venta_detalle','despacho_detalle_id','id');
    }
}
