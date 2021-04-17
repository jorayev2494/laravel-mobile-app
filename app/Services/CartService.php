<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Eloquent\AddressRepository;
use App\Repositories\Eloquent\CartRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Services\Base\BaseModelService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as SupportCollection;

class CartService extends BaseModelService
{

    /**
    * @var CartRepository $repository
    */
    private CartRepository $repository;

    /**
    * @var ProductRepository $productRepository
    */
    private ProductRepository $productRepository;

    /**
    * @var AddressRepository $addressRepository
    */
    private AddressService $addressService;

    protected function getModelRepository(): string
    {
        $this->repository = resolve(CartRepository::class);
        $this->productRepository = resolve(ProductRepository::class);
        $this->addressService = resolve(AddressService::class);
        return CartRepository::class;
    }

    public function myCarts(User $author): SupportCollection
    {
        return $author->carts()->with("orders")->get();
    }

    public function createCart(User $author, array $data): void
    {
        $this->addressService->showAddress($data["address_id"]);
        $orders = Arr::pull($data, "orders");
        $orderedProducts = $this->handlerProducts($orders);

        /** @var Cart $createdCart */
        $createdCart = $author->carts()->create($data);
        $createdCart->orders()->createMany($orderedProducts);
    }

    public function findMyCart(User $author, int $id): Model
    {
        return $author->carts()->with("orders")->findOrFail($id);
    }

    public function deleteByCart(Model $author, int $id): void
    {
        $foundCart = $author->carts()->findOrFail($id);
        $foundCart->delete();
    }

    public function getManagementCats(): Collection
    {
        return $this->repository->getForManagement();
    }

    public function showManagementCart(int $id): Model
    {
        return $this->repository->showManagementCart($id);
    }

    public function updateManagementCart(int $id, array $data): Model
    {
        $foundCart = $this->repository->find($id);
        $foundCart->update(Arr::pull($data, "orders"));
        return $foundCart->refresh();

    }

    public function deleteManagement(int $id): void
    {
        $foundCart = $this->repository->find($id);
        $foundCart->delete();
    }

    /**
     * Undocumented function
     *
     * @param array $orders
     * @return array
     */
    private function handlerProducts(array $orders): iterable
    {
        $orderIds = array_column($orders, "id");
        $orderedProducts = $this->productRepository->foundProducts($orderIds);

        /** @var Product $orderedProduct */
        foreach ($orderedProducts as $key => $orderedProduct) {
            $ordersQuantity = $orders[$key]["quantity"];      
            $orderedProduct->setAttribute("quantity", $ordersQuantity);
            $orderedProduct->setAttribute("cart_price", $ordersQuantity * $orderedProduct->price);
            $orderedProduct->setAttribute("cart_sale_price", $ordersQuantity * $orderedProduct->sale_price);
            $orderedProduct->setAttribute("category_id", $orderedProduct->category->id);
        }

        return $orderedProducts->toArray();
    }

    public function changeStatus(int $id, array $data): Model
    {
        $foundCart = $this->repository->find($id);
        $foundCart->status = $data["status"];
        $foundCart->save();
        return $foundCart->refresh();
    }
}
