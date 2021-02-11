<?php

namespace App\Services\Base;

use Closure;
use Illuminate\Database\Eloquent\Model;

interface AppGuardInterface {
    public const WEB_GUARD = 'web';
    public const ADMIN_GUARD = 'admin';
    public const USER_GUARD = 'api';

    public static function getAuthGuard(): string;
    public static function getAuth(): Model;
    public static function getAuthCheck(): bool;
}