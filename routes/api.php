<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

    Route::post('/ai/forecast', [App\Http\Controllers\AiController::class, 'forecast']);
    Route::post('/ai/insights', [App\Http\Controllers\AiController::class, 'insights']);
    Route::post('/ai/anomalies', [App\Http\Controllers\AiController::class, 'anomalies']);
    Route::apiResource('products', App\Http\Controllers\ProductController::class);
    Route::apiResource('sales', App\Http\Controllers\SaleController::class);
    Route::put('/inventory/update-stock', [App\Http\Controllers\InventoryController::class, 'updateStock']);
    Route::get('/dashboard/stats', [App\Http\Controllers\DashboardController::class, 'statsData']);
    Route::get('/dashboard/charts', [App\Http\Controllers\DashboardController::class, 'chartData']);
