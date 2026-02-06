<?php

namespace App\Listeners;

use App\Events\SaleCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateProductStock implements ShouldQueue
{
    public $delay = 70;
    public function handle(SaleCreated $event): void
    {

        $product = $event->sale->product;
        $product->stock -= $event->sale->quantity;
        $product->save();
        //Log stock update
        Log::info("Product stock updated", [
            'product_id' => $product->id,
            'new_stock' => $product->stock,
            'sale_id' => $event->sale->id,
        ]);
    }

    public function failed(SaleCreated $event, \Throwable $exception): void
    {
        // Log the failure
        Log::error("Failed to update product stock", [
            'sale_id' => $event->sale->id,
            'error' => $exception->getMessage(),
        ]);
    }
}
