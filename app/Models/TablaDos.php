<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TablaUno;
class TablaDos extends Model
{
    //use HasFactory;
    protected $table='table_two';
    protected $fillable = [
        'cantidad_ingresada', 'fecha_ingreso_bodega'
    ]; 

    public function product_name(){
        return $this->belongsTo(TablaUno::class);
     }
}
