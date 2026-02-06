<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiController extends Controller
{
    private $pythonUrl = 'http://127.0.0.1:5000';

    public function forecast()
    {
        $sales_history = Sale::whereYear('sale_date', now()->year)
            ->get();

        $pythonURL = $this->pythonUrl.'/forecast';

        $response = Http::post($pythonURL, [
            'sales_data' => $sales_history,
        ]);

        return $response->json();
    }

    public function insights()
    {
        $sales = Sale::whereYear('sale_date', now()->year)
            ->get();

        $products = Product::whereIn('id', $sales->pluck('product_id'))->get();

        Log::info('Products for insights', ['products' => $products]);

        Log::info('Sales for insights', ['sales' => $sales]);

        $pythonURL = $this->pythonUrl.'/insights';

        $response = Http::post($pythonURL, [
            'sales_data' => $sales,
            'products' => $products,
        ]);

        return $response->json();
    }

    public function anomalies()
    {
        $sales = Sale::whereYear('sale_date', now()->year)
            ->get();

        $pythonURL = $this->pythonUrl.'/anomalies';

        $response = Http::post($pythonURL, [
            'sales_data' => $sales,
        ]);

        return $response->json();
    }
}
