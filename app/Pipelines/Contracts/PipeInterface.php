<?php

namespace App\Pipelines\Contracts;

use Closure;
use Illuminate\Database\Eloquent\Builder;

interface PipeInterface {
    public function handle(object $obj, Closure $next): object;
}