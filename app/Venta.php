<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "venta";
    protected $fillable = ['tercero_id','numero','user_id', 'total','iva','subtotal'];

    public function venta_detalle(){
        return $this->hasMany('intransporte\Venta_deatlle','venta_id','id');
    }

    public function tercero(){
        return $this->belongsTo('intransporte\Tercero','tercero_id','id');
    }

}
