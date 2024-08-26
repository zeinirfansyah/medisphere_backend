<?php

namespace App\Http\Controllers;

use App\Models\ShippingStatus;
use App\Http\Requests\StoreShippingStatusRequest;
use App\Http\Requests\UpdateShippingStatusRequest;

class ShippingStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShippingStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingStatus $shippingStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShippingStatusRequest $request, ShippingStatus $shippingStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingStatus $shippingStatus)
    {
        //
    }
}
