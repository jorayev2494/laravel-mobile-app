<?php

namespace App\Pipelines\QueryBuilder;

use App\Pipelines\Contracts\QueryBuilderAbstract;
use Illuminate\Database\Eloquent\Builder;

class OrderBy extends QueryBuilderAbstract
{
    /**
    * @var string $sortField
    */
    private string $sortField = 'sort_field';

    /**
    * @var string $sortRule
    */
    private string $sortRule = 'sort_rule';

    /**
    * @var array $sortRules
    */
    private array $sortRules = array('DESC', 'ASC');

    protected function action(Builder $query, string $methodName): Builder
    {
        return $query->$methodName(
            $this->request->query($this->sortField, 'id'),
            $this->request->query($this->sortRule, 'ASC')
        );
    }

    protected function rule(array $fillable): array
    {
        return [
            $this->sortField => 'string|in:' . implode(',', $fillable),
            $this->sortRule => 'string|in:' .  implode(',', $this->sortRules),
        ];
    }
}
