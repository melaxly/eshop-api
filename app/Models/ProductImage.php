<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    // Specify the fillable fields in the database
    protected $fillable = [
        'product_id',
        'image'
    ];

    // Defines a one-to-many relationship: ProductImage belongs to a Product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
