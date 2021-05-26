<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TablaUno;
class TablaTres extends Model
{
    //use HasFactory;
    protected $table='table_three';
    protected $fillable = [
        'unidades_vendidas', 'numero_semana'
    ]; 

    public function product_name(){
        return $this->belongsTo(TablaUno::class);
     }
 
}
