<?php

namespace App\Infrastructure\Database\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Database\Eloquent\Models\Product;

class Purchase extends Model
{
    /** @use HasFactory<\Database\Factories\PurchaseFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'total_price',
        'purchase_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
