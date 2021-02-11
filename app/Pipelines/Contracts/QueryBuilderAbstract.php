<?php

namespace App\Pipelines\Contracts;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class QueryBuilderAbstract
{
    /**
    * @var Request $request
    */
    protected Request $request;

    /**
    * @var string $field
    */
    protected string $method;

    protected abstract function action(Builder $query, string $methodName): object;
    protected abstract function rule(array $fillable): array;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function handle(Builder $query, Closure $next): object
    {
        $this->validate(array_merge(['id'], $query->getModel()->getFillable()));
        $query = $this->action($query, $this->methodName());
        return $next($query);
    }

    protected function methodName(): string
    {
        return Str::camel(class_basename($this));
    }

    public function validate(array $fillable): void
    {
        $this->request->merge($this->request->query->all())->validate($this->rule($fillable));
    }
}
