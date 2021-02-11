<?php

namespace App\Models;

use App\Models\Contracts\AuthorizeModelInterface;
use App\Models\Contracts\JWTAuthModel;

class Admin extends JWTAuthModel implements AuthorizeModelInterface
{
    
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

}
