<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Conexão para o outro banco de dados
    protected $connection = 'another';
}
