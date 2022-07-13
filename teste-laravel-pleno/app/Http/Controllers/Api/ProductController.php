<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Requests\Product\CreateProductRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Success;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Interfaces\Store\StoreRepositoryInterface;
use App\Mail\ProductSave;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    private $productRepository;
    private $storeRepository;
    
    // ProductRepositoryInterface is the interface
    public function __construct(ProductRepositoryInterface $productRepositoryInterface, StoreRepositoryInterface $storeRepositoryInterface)
    {
        $this->productRepository = $productRepositoryInterface;
        $this->storeRepository = $storeRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->productRepository->getAllProducts();
        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = $this->productRepository->createProduct($request);
        
        if($product){
            $this->mailSuccess($product, "salvo");
        };
        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->getProductById($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = $this->productRepository->updateProduct($id, $request);
        if($product){
            $this->mailSuccess($product, "editado");
        }
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->deleteProduct($id);
        return response()->json($product);
    }

    public function mailSuccess($product, $action) {
        $store = $this->storeRepository->getStoreById($product->store_id);
        Mail::to($store->email)->send(new ProductSave($store->name, $product, $action));
    }
}
