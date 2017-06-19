<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;
use intransporte\Tercero;
use intransporte\Obra;

class Ciudad extends Model
{
    //
    protected $table = "ciudad";

    public function Terceros(){
        return $this->hasMany('intransporte\Tercero', 'ciudad_id', 'id');
    }

    public function Obras(){
        return $this->hasMany('intransporte\Obra', 'ciudad_id', 'id');
    }
}
