<?php

namespace App\Http\Controllers;

use App\Models\PurchaseStatus;
use App\Http\Requests\StorePurchaseStatusRequest;
use App\Http\Requests\UpdatePurchaseStatusRequest;

class PurchaseStatusController extends Controller
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
    public function store(StorePurchaseStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseStatus $purchaseStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseStatusRequest $request, PurchaseStatus $purchaseStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseStatus $purchaseStatus)
    {
        //
    }
}
