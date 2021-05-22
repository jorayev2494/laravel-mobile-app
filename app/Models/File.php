<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * File
 * 
 * @property string $type
 * @property string $path
 * @property string $name
 * @property string $size
 * @property string $mime_type
 * @property string $user_file_name
 * @property string $fileable
 */
class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "type",
        "path",
        "name",
        "size",
        "mime_type",
        "user_file_name"
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "fileable_type",
        "fileable_id",
        "updated_at",
        "created_at",
    ];

    public function getPathAttribute(): string
    {
        return "/storage{$this->attributes['path']}";
    }

    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getUrlAttribute(): string
    {
        return "{$this->path}/{$this->attributes['name']}";
    }
}
