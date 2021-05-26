<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaUno extends Model
{
    //use HasFactory;
    protected $table='table_one';
    protected $fillable = [
        'pais', 'tipo_de_producto','nombre_producto','precio_unitario','fecha_precio'
    ]; 
}
