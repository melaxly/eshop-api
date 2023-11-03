<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // Specify the fillable fields in the database
    protected $fillable = [
        'user_id',
        'cart_items'
    ];

    // Defines a one-to-many relationship: Cart belongs to a user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
