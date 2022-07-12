<?php 

namespace App\Interfaces\Product;

interface ProductRepositoryInterface {
    
    public function getAllProducts();
    public function getProductById($id);
    public function createProduct($request);
    public function updateProduct($id, $request);
    public function deleteProduct($id);
}