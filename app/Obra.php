<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    //
    protected $table = "obra";

    protected $fillable = ['nombre', 'direccion', 'ciudad_id', 'telefono', 'tercero_id', 'encargado', 'activo'];


    public function Ciudad(){
        return $this->belongsTo('intransporte\Ciudad');
    }

    public function Tercero(){
        return $this->belongsTo('intransporte\Tercero');
    }

    public function Despachos(){
        return $this->belongsTo('intransporte\Despachos');
    }
}
