<?php

namespace App\Infrastructure\Database\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Database\Eloquent\Models\Product;
class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
