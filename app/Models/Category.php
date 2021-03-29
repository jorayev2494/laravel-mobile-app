<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Category Class
 * 
 * @property string $image
 * @property string $color
 * @property string $title
 * @property bool $is_active
 */
class Category extends Model
{
    use HasFactory;

    public const IMAGE_PATH = "/images/categories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "image",
        "color",
        "slug",
        "is_active"
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "is_active" => "boolean",
    ];

    public function getImageAttribute(): string
    {
        $image = $this->attributes["image"];
        return filter_var($image, FILTER_VALIDATE_URL) ? $image : "/storage" . Category::IMAGE_PATH . "/" . $image;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, "category_id", "id");
    }
}
