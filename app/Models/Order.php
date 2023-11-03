<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    // Specify the fillable fields in the database
    protected $fillable = [
        'user_id',
        'reference_id',
        'order_items',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'total_price',
        'shipping_fee',
        'grand_total',
        'paid'
    ];

    // Defines a one-to-one relationship: Order belongs to a user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
