<?php

namespace App\Repositories\Store;

use App\Models\Store;
use App\Interfaces\Store\StoreRepositoryInterface;

class StoreRepository implements StoreRepositoryInterface{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllStores()
    {
        return Store::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createStore($request)
    {
        $store = new Store;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->save();

        return $store;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getStoreById($id)
    {
        return Store::with('products')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStore($id, $request)
    {
        $store = Store::find($id);
        $store->name = $request->name;
        $store->email = $request->email;
        $store->save();

        return $store;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteStore($id)
    {
        $store = Store::find($id);
        $store->delete();

        return $store;
    }
}
