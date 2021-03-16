<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Address
 * 
 * @property int $id
 * @property string $name
 * @property string $city
 * @property string $address_street
 * @property string $address_lane
 * @property int $postal_code
 * @property string $phone_number
 * @property int $author_id
 */
class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "author_id",
        "name",
        "city",
        "address_street",
        "address_lane",
        "postal_code",
        "phone_number"
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, "author_id", "id");
    }
}
