<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TablaUno;
use App\Models\TablaDos;
use App\Models\TablaTres;
use Redirect;
use Illuminate\Support\Facades\DB;
class GeneralController extends Controller
{
    public function index()

    {

        $tabla_uno = TablaUno::latest()->paginate(5);
        $tabla_dos = TablaDos::latest()->paginate(5);
        $tabla_tres = TablaTres::latest()->paginate(5);

        return view('producto.index',compact('tabla_uno','tabla_dos','tabla_tres'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function create()
    {
        return view('producto.crear_producto');     
    }


    public function store(Request $request)

    {
        $tabla_uno = TablaUno::create([
            'tipo_de_producto'=>$request->input('tipo_producto'),
            'nombre_producto'=>$request->input('nombre_producto'),
            'precio_unitario'=>$request->input('precio_unitario'),
            'fecha_precio'=>$request->input('fecha_precio'),
        ]);
        
        $tabla_dos = new TablaDos;
        $tabla_dos->product_name = $tabla_uno->id;
        $tabla_dos->fecha_ingreso_bodega = $request->input('fecha_bodega');
        $tabla_dos->save();

        $tabla_tres = new TablaTres;
        $tabla_tres->product_name = $tabla_uno->id;
        $tabla_tres->unidades_vendidas=$request->input('ventas');
        $tabla_tres->numero_semana=$request->input('ultima_semana_unidades_vendidas');
        $tabla_tres->save();
        


        return Redirect::to('productos')
        ->with('success','Producto creado exitosamente');

    }

     

    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Request $request, $id)

    {
        $tabla_uno = TablaUno::find($id);
        $tabla_dos = TablaDos::where('product_name',$id)->get();
        $tabla_tres = TablaTres::where('product_name',$id)->get();
        return view('producto.mostrar_producto',compact('tabla_uno','tabla_dos','tabla_tres'));

    } 

     

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\TablaUno  $tabla_uno
     * @param  \App\TablaDos  $tabla_dos
     * @param  \App\TablaTres $tabla_tres
     * @return \Illuminate\Http\Response

     */

    public function edit(Request $request, $id)

    {
        $tabla_uno = TablaUno::find($id);
        $tabla_dos = TablaDos::where('product_name',$id)->get();
        $tabla_tres = TablaTres::where('product_name',$id)->get();
        return view('producto.editar_producto',compact('tabla_uno','tabla_dos','tabla_tres'));

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $tabla_uno = TablaUno::find($id);
        $tabla_uno->tipo_de_producto = $request->input('tipo_producto');
        $tabla_uno->nombre_producto = $request->input('nombre_producto');
        $tabla_uno->precio_unitario = $request->input('precio_unitario');
        $tabla_uno->fecha_precio =$request->input('fecha_precio');
        $tabla_uno->save();

        $tabla_dos = TablaDos::where('product_name',$id)
        ->update(['fecha_ingreso_bodega'=>$request->input('fecha_bodega')]);

        $tabla_tres = TablaTres::where('product_name',$id)
        ->update(['unidades_vendidas'=>$request->input('unidades_vendidas'),
                  'numero_semana'=> $request->input('ultima_semana_unidades_vendidas')
        ]);

    
        return redirect()->route('productos.index')
        ->with('success','Producto Actualizado correctamente');

    }

    

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy(Product $product)

    {

        $product->delete();

    

        return redirect()->route('producto.index')

                        ->with('success','Product deleted successfully');

    }

    public function search($data){
        $search = DB::table('table_one')->where('tipo_de_producto','LIKE',$data)->orWhere('nombre_producto','LIKE',$data)->get();
        $result = count($search) ? $search[0]->id:0;
        return response()->json(['result'=>$result]);
    }
}
