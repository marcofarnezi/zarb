<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    protected $fillable = [
    	'nome',
    	'email',    	
    	'user_id',
    	'entidade_id',
    ];   
}
