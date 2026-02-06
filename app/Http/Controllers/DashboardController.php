<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function statsData()
    {   // Total Sales
        $total_Sales = Sale::where('sale_date', '>=', now()->subMonth())
            ->sum('total_price');

        $total_Transactions = Sale::where('sale_date', '>=', now()->subMonth())
            ->count();

        $total_transaction_purchases = Purchase::where('purchase_date', '>=', now()->subMonth())
            ->count();

        $total_purchases = Purchase::where('purchase_date', '>=', now()->subMonth())
            ->sum('total_price');

        return response()->json([
            'totalSales' => $total_Sales,
            'totalTransactions' => $total_Transactions,
            'totalPurchases' => $total_purchases,
            'totalTransactionPurchases' => $total_transaction_purchases,
        ]);
    }

    public function chartData()
    {

        // Sales Over Time Chart
        $sales = Sale::select(
            DB::raw('MONTH(sale_date) as month'),
            DB::raw('SUM(total_price) as total_sales')
        )
            ->whereYear('sale_date', now()->year)
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();

        // Top Selling Products Chart
        $topProducts = Sale::select('products.name', DB::raw('SUM(sales.quantity) as total_quantity'))
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_quantity')
            ->take(5)
            ->get();

        // Inventory Levels Chart

        $inventoryLevels = Product::select('name', 'stock')
            ->orderByDesc('stock')
            ->take(5)
            ->get();

        return response()->json([
            'salesOverTime' => $sales,
            'topSellingProducts' => $topProducts,
            'inventoryLevels' => $inventoryLevels,
        ]);

    }
}
