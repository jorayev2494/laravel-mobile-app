<?php

namespace App\Providers;

use App\Pipelines\QueryBuilder\OrderBy;
use App\Pipelines\QueryBuilder\Paginate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\ServiceProvider;

class QueryBuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Pipeline $pipeline): void
    {

        Builder::macro('requestOrderBy', function() use($pipeline): Builder {
            $builder = $pipeline->send($this->applyScopes())
                     ->through(
                         OrderBy::class
                        )
                     ->thenReturn();

            return $builder;
        });


        Builder::macro(
            'requestPaginate',
            function(array $columns = ['*']) use($pipeline): mixed {
            $result = $pipeline->send($this->applyScopes()->select($columns))
                     ->through(
                        Paginate::class
                        )
                     ->thenReturn();

            return $result;
        });

    }
}
