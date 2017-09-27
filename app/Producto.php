<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = "producto";

    protected $fillable = ['codigo','nombre','valor_und', 'impuesto','unidad_medida','es_servicio','existencia'];
    public function despacho_detalles(){
        return $this->hasMany('intransporte\DespachoDetalle','producto_id','id');
    }
}
