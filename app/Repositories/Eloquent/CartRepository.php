<?php

namespace App\Repositories\Eloquent;

use App\Models\Cart;
use App\Repositories\Eloquent\Base\BaseModelRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CartRepository extends BaseModelRepository
{
    protected function getModel(): string
    {
        return Cart::class;
    }

    public function getForManagement(): Collection
    {
        return $this->getModelClone()->newQuery()->orderBy("created_at", "DESC")->withCount("orders")->with("author")->get();
    }

    public function showManagementCart(int $id): Model
    {
        return $this->find($id)->loadMissing("author", "orders.category", "address");
    }
}
