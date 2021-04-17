<?php

namespace App\Models;

use App\Models\Contracts\AuthorizeModelInterface;
use App\Models\Contracts\JWTAuthModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * User Model
 * 
 * @property string $name
 * @property string $email
 * @property string $password
 * 
 */
class User extends JWTAuthModel implements AuthorizeModelInterface
{

    public const BLOCK_STATUS = 'block';
    public const UNBLOCK_STATUS = 'unblock';

    public const BLOCK_STATUSES = [
        self::BLOCK_STATUS,
        self::UNBLOCK_STATUS
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'avatar',
        'phone',
        'email_verified_at',
        'email_confirmed',
        'password',
        'is_blocked',
        'last_login',
        'last_activity',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        "avatar_url",
        "full_name"
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_blocked' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'last_activity',
        'email_confirmed',
        'email_verified_at',
        'last_login',
        'last_activity',
    ];

    public function getFullNameAttribute(): string
    {
        return "{$this->attributes['first_name']} {$this->attributes['last_name']}";
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, "author_id", "id");
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, "author_id", "id");
    }
}
