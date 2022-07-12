<?php 

namespace App\Interfaces\Store;

interface StoreRepositoryInterface {
    
    public function getAllStores();
    public function getStoreById($id);
    public function createStore($request);
    public function updateStore($id, $request);
    public function deleteStore($id);
}