<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'type',
        'path',
        'name',
        'size',
        'mime_type',
        'user_file_name'
    ];
}
