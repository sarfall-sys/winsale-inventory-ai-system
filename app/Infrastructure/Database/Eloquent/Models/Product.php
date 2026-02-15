<?php

namespace App\Infrastructure\Database\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Database\Eloquent\Models\Category;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'stock',
        'min_stock',
        'image_path',
        'sale_price',
        'cost_price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
