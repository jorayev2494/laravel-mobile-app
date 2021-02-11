<?php

namespace App\Pipelines\QueryBuilder;

use App\Pipelines\Contracts\QueryBuilderAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginate extends QueryBuilderAbstract
{
    protected function action(Builder $query, string $methodName): LengthAwarePaginator|Collection
    {
        if ($this->request->query->has('current_page')) {
            $perPage = $this->request->query('per_page', 10);
            $currentPage = $this->request->query('current_page', 1);
            $builder = $query->paginate($perPage, ['*'], 'page', $currentPage);
        } else {
            $builder = $query->get();
        }

        return $builder;
    }

    protected function rule(array $fillable): array
    {
         return [
            'per_page' => 'integer',
            'current_page' => 'integer'
         ];
    }
}
