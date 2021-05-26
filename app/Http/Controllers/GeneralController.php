<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TablaUno;
use App\Models\TablaDos;
use App\Models\TablaTres;
use Redirect;
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
        $tabla_tres->unidades_vendidas=$request->input('unidades_vendidas');
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

    public function show(Product $product)

    {

        return view('producto.show',compact('product'));

    } 

     

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(Product $product)

    {

        return view('producto.edit',compact('product'));

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Product $product)

    {

        $request->validate([

            'name' => 'required',

            'detail' => 'required',

        ]);

    

        $product->update($request->all());

    

        return redirect()->route('producto.index')

                        ->with('success','Product updated successfully');

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
}
