<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Eloquent\AddressRepository;
use App\Services\Base\BaseModelService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class AddressService extends BaseModelService
{
    /**
    * @var AddressRepository $repository
    */
    private AddressRepository $repository;

    public function __construct(AddressRepository $addressRepository) {
        $this->repository = $addressRepository;
        parent::__construct(app());
    }

    protected function getModelRepository(): string
    {
        return AddressRepository::class;
    }

    public function addAddress(User $user, array $data): void {
        $user->addresses()->create($data);
    }

    public function showAddress(int $id): Model
    {
        return $this->repository->find($id);
    }

    public function updateAddress(int $id, array $data): void
    {
        $this->update($id, $data, true);
    }

    public function deleteAddress(int $id): void
    {        
        $this->delete($id, true);
    }
}
