<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    // Specify the fillable fields in the database
    protected $fillable = [
        'category_id',
        'title',
        'price',
        'description'
    ];

    // Defines a one-to-one relationship: Product belongs to a Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Defines one-to-many relationship: Product has many Product Image
    public function product_image(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
