<?php

namespace App\Services\Base;

use App\Repositories\Eloquent\Base\BaseModelRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModelService
{
    /**
    * @var Application $app
    */
    private Application $app;

    /**
    * @var BaseModelRepository $modelRepository
    */
    protected BaseModelRepository $modelRepository;

    public function __construct(Application $app) {
        $this->app = $app;
        $this->makeRepository();
    }

    protected abstract function getModelRepository(): string;

    private function makeRepository(): BaseModelRepository
    {
        /** @var BaseModelRepository $modelRepository */
        $modelRepository = $this->app->make($this->getModelRepository());
        if (!$modelRepository instanceof BaseModelRepository) {
            throw new \Exception("Class {$this->getModelRepository()}
            must be an instance of Illuminate\\Database\\Eloquent\\" . BaseModelRepository::class);
        }

        return $this->modelRepository = $modelRepository;
    }

    public function getCloneModelRepository(): BaseModelRepository
    {
        return clone $this->modelRepository;
    }

    public function getCallingMethodName(...$parameters)
    {
        $callerMethodName = debug_backtrace()[1]['function'];
        if (method_exists($this, $callerMethodName))
            return $this->$callerMethodName(...$parameters);
    }

    #region CRUD
    /**
     * Service Create
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return tap(
            $this->getCloneModelRepository()->getModelClone()->newInstance(),
            fn(Model $model) => $model->fill($data)->save()
        );
    }

    /**
     * Service Update
     *
     * @param integer $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model
    {
        if (array_key_exists('id', $data)) 
            unset($data['id']);

        return tap(
            $this->getCloneModelRepository()->getModelClone()->findOrFail($id),
            fn(Model $foundModel): Model => $foundModel->fill($data)
        );
    }

    /**
     * Service Delete
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        return tap(
            $this->getCloneModelRepository()->getModelClone()->newQuery()->findOrFail($id),
            fn(Model $foundModel): bool => $foundModel->delete()
        );
    }
    #endregion
}
