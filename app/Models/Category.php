<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Specify the fillable fields in the database
    protected $fillable = [
        'category',
        'image'
    ];

    // Defines a one-to-many relationship: Category has many products
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
