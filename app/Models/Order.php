<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "category_id",
        "cart_id",
        "title",
        "price",
        "sale_price",
        "description",
        "rating",
        "is_active",
        "quantity",
        "cart_price",
        "cart_sale_price"
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, "cart_id", "id");
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
