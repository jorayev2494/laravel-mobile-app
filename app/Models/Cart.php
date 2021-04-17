<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    public const STATUS_APPROVED = "approved";
    public const STATUS_WAITING = "waiting";
    public const STATUS_CANCEL = "cancel";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "author_id",
        "quantity_orders",
        "sum",
        "status",
        "address_id"
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, "author_id", "id");
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, "cart_id", "id");
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, "address_id", "id");
    }
}
