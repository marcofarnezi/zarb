<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $fillable = [
    	'user_id',
    	'cliente_id'
    ];

    public function itemVendas()
    {
    	return $this->hasMany(ItemVendas::class);
    }
}
