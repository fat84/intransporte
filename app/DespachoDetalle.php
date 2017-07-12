<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class DespachoDetalle extends Model
{
    //
    protected $table = "despacho_detalle";
    protected $fillable = ['despacho_id','producto_id','cantidad','unidad','valor_unidad','porc_descuento','descuento','porc_impuesto','impuesto',''];
    public function Despacho(){
        return $this->belongsTo('intransporte\Despacho');
    }
}
