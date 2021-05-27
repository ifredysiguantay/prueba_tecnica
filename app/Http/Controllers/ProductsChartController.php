<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\TablaTres;
use Illuminate\Support\Facades\DB;
class ProductsChartController extends Controller
{
    public function index($id){
        $data_y = DB::table('table_three')->where('product_name',$id)->select('numero_semana')->get();
        $data_x = DB::table('table_three')->where('product_name',$id)->select('unidades_vendidas')->get();

        $x = [];
        $y = [];

        foreach($data_y as $d){
            $x[]=$d->numero_semana;
        }

        foreach($data_x as $a){
            $y[]=$a->unidades_vendidas;
        }
        return view('producto.graphics',compact('x','y'));
    }
}
