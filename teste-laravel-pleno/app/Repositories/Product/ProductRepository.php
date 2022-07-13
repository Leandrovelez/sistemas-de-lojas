<?php 

namespace App\Repositories\Product;

use App\Models\Product;
use App\Interfaces\Product\ProductRepositoryInterface;
 
class ProductRepository implements ProductRepositoryInterface {
 
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllProducts()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createProduct($request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->value = $request->value;
        $product->store_id = $request->store_id;
        $product->save();

        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProductById($id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct($id, $request)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->value = $request->value;
        $product->store_id = $request->store_id;
        $product->is_active = $request->is_active;
        $product->save();        

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        return $product;
    }
 
}