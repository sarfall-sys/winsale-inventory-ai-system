<?php

namespace App\Http\Controllers;

use App\Models\Product;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function updateStock()
    {
        Product::chunk(100, function ($products) {
            foreach ($products as $product) {
                // Example logic to update stock based on sales data
                $totalSold = $product->sales()->sum('quantity');
                $newStock = max(0, $product->initial_stock - $totalSold);
                $product->stock = $newStock;
                $product->save();
            }
        });
    }
}
