<?php

namespace App\Repositories\Eloquent\Base;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseModelRepository
{
    /**
    * @var Model $model
    */
    public ?Model $model;

    public function __construct() {
        $this->model = app($this->getModel());
    }

    protected abstract function getModel(): string;

    public function getModelClone(): Model
    {
        return clone $this->model;
    }
    
    // protected function newQuery(): Builder
    // {
    //     return $this->getModelClone()->newQuery();
    // }

    protected function baseQuery(): Builder
    {
        return $this->getModelClone()->newQuery()->requestOrderBy();
    }

    public function get($columns = ['*']): Collection
    {
        return $this->getModelClone()->newQuery()->get($columns);
    }

    public function getBy(string $field, string $value, $columns = ['*']): Collection
    {
        return $this->getModelClone()->newQuery()->where($field, $value)->get($columns);
    }

    public function paginateOrGet($columns = ['*']): LengthAwarePaginator|Collection
    {
        return $this->getModelClone()->newQuery()->requestPaginate($columns);
    }

    public function find(int $id, $columns = ['*']): Model
    {
        return $this->getModelClone()->newQuery()->findOrFail($id, $columns);
    }

    public function findBy(string $field, string $value, $columns = ['*']): Model
    {
        return $this->getModelClone()->newQuery()->where($field, $value)->firstOrFail($columns);
    }
}
