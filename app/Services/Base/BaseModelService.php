<?php

namespace App\Services\Base;

use App\Exceptions\BadRequestException;
use App\Repositories\Eloquent\Base\BaseModelRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

abstract class BaseModelService
{

    /**
    * @var const GATE_DOESNT_RIGHTS_MSG
    */
    private const GATE_DOESNT_RIGHTS_MSG = "you don't have enough rights";

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
            throw new \Exception(
                "Class {$this->getModelRepository()} must be an instance of Illuminate\\Database\\Eloquent\\" . BaseModelRepository::class
            );
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
    public function update(int $id, array $data, bool $hasModelPolicy = false): Model
    {
        if (array_key_exists('id', $data)) 
            unset($data['id']);

        return tap(
            $this->getCloneModelRepository()->getModelClone()->findOrFail($id),
            function(Model $foundModel) use($data, $hasModelPolicy): Model {
                if ($hasModelPolicy && Gate::denies("update", $foundModel)) {
                    throw new BadRequestException(self::GATE_DOESNT_RIGHTS_MSG);
                }

                return $foundModel->fill($data);
            } 
        );
    }

    /**
     * Service Delete
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id, bool $hasModelPolicy = false): bool
    {
        $foundModel = $this->getCloneModelRepository()->getModelClone()->newQuery()->findOrFail($id);

        if ($hasModelPolicy && Gate::denies("delete", $foundModel)) {
            throw new BadRequestException(self::GATE_DOESNT_RIGHTS_MSG);
        }

        return $foundModel->delete();
    }
    #endregion
}
