<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{

    protected $table = 'empleado';

    protected $fillable = ['id','nombre','edad','puesto','activo','moneda','salario','estado'];

}