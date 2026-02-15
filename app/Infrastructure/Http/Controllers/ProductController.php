<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')
        ->paginate(10);

        return response()->json([
            'message' => 'Products retrieved successfully',
            'data' => $products,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::find($product->id);

        return response()->json([
            'message' => 'Product retrieved successfully',
            'data' => $product,
        ], 200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $products = Product::findOrFail($product->id);
        $products->update($request->all());

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $products,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $products = Product::findOrFail($product->id);
        $products->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
