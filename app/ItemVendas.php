<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemVendas extends Model
{
    protected $fillable = [
    	'vendas_id',
    	'produtos_id',
    	'quantidade'
    ];
}
