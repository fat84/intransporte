<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = "producto";

    protected $fillable = ['codigo','nombre','valor_und', 'impuesto','unidad_medida','es_servicio','existencia'];

}
