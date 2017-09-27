<?php

namespace intransporte;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = "pago";
    protected $fillable = ['tercero_id','numero','user_id', 'total','iva','subtotal'];
}
