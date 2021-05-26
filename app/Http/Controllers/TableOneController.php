<?php

namespace App\Http\Controllers;
use App\TablaUno;
use Illuminate\Http\Request;

class TableOneController extends Controller
{
    public function index()

    {

        $products = TablaUno::latest()->paginate(5);

    

        return view('products.index',compact('products'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

     

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()
    {
        return view('productos.crear_producto');     
    }


    public function store(Request $request)

    {

        $request->validate([

            'name' => 'required',

            'detail' => 'required',

        ]);

    

        Product::create($request->all());

     

        return redirect()->route('products.index')

                        ->with('success','Product created successfully.');

    }

     

    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Product $product)

    {

        return view('products.show',compact('product'));

    } 

     

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(Product $product)

    {

        return view('products.edit',compact('product'));

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

    

        return redirect()->route('products.index')

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

    

        return redirect()->route('products.index')

                        ->with('success','Product deleted successfully');

    }
}
