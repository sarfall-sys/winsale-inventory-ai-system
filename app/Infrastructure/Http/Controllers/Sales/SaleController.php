<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;

class SaleController extends Controller
{

    public function index()
    {
        $sales = Sale::with('product')
            ->orderby('sale_date', 'desc')
            ->paginate(10);

        return response()->json([
            'message' => 'Sales retrieved successfully',
            'data' => $sales,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        $sale = Sale::create($request->all());

        return response()->json([
            'message' => 'Sale created successfully',
            'data' => $sale,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $sale = Sale::findOrFail($sale->id);

        return response()->json([
            'message' => 'Sale retrieved successfully',
            'data' => $sale,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sales = Sale::findOrFail($sale->id);
        $sales->update($request->all());

        return response()->json([
            'message' => 'Sale updated successfully',
            'data' => $sales,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sales = Sale::findOrFail($sale->id);
        $sales->delete();

        return response()->json([
            'message' => 'Sale deleted successfully',
        ], 200);
    }
}
