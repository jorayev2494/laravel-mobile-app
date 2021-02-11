<?php

namespace App\Models\Contracts;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

abstract class JWTAuthModel extends Authenticatable implements JWTSubject, AuthorizeModelInterface
{
    use HasFactory, Notifiable;

    public const AVATAR_DEFAULT_WIDTH = 45;  // Avatar default width 45

    public function getJWTIdentifier(): mixed
    {
        // dd(__METHOD__);
        return $this->getKey();
    }

    public function getJWTCustomClaims(): mixed
    {
        // dd(__METHOD__);
        // $this->remember_token = null;
        // return $this->save();
        return [];
    }

    public function invalidateToken() : bool
    {
        $this->remember_token = null;
        return $this->save();
    }

    // abstract public function getAvatarPath(): string;

    #region Avatar
    public function getAvatarPath(): string
    {
        return "/images/avatar";
    }

    public function getAvatarAttribute(): string
    {
        return $this->attributes['avatar'] ? $this->attributes['avatar'] : 'default.png';
    }

    public function getAvatarUrlAttribute(): string
    {
        return '/storage' . $this->getAvatarPath() . '/' . $this->avatar;
    }
    #endregion

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function setPasswordAttribute(string $password): self
    {
        $this->attributes['password'] = Hash::make($password);
        return $this;
    }

    public function setLastLogin(): self
    {
        $this->attributes['last_login'] = Carbon::now();
        return $this;
    }

    public function setLastActivity(): self
    {
        $this->attributes['last_activity'] = Carbon::now();
        return $this;
    }

    public function setEmailConfirmed(): bool
    {
        return $this->markEmailAsVerified();
    }
}
