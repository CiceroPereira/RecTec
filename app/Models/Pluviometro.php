<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pluviometro extends Model
{
    protected $table = 'pluviometro';
    protected $primaryKey = "id";

    public function modelo(){
    	return $this->belongsTo('App\Models\Modelo', 'modelo_id');	
    }
}
