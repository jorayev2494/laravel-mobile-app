<?php

namespace App\Services\Base;

use Illuminate\Database\Eloquent\Model;

class AppGuard implements AppGuardInterface
{
    public static function getAuth(): Model
    {
        if (auth()->guard(self::ADMIN_GUARD)->check())
            return auth()->guard(self::ADMIN_GUARD)->user();
        else if (auth()->guard(self::USER_GUARD)->check())
            return auth()->guard(self::USER_GUARD)->user();
        return null;
    }

    public static function getAuthCheck(): bool
    {
        return auth()->guard(self::ADMIN_GUARD)->check() | auth()->guard(self::USER_GUARD)->check();
    }

    public static function getAuthGuard(): string
    {
        if (auth()->guard(self::ADMIN_GUARD)->check())
            return self::ADMIN_GUARD;
        else if (auth()->guard(self::USER_GUARD)->check())
            return self::USER_GUARD;
        return null;
    }
}
