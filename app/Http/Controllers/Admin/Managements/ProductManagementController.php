<?php

namespace App\Http\Controllers\Admin\Managements;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\User;
use App\Services\Base\AppGuardInterface;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductManagementController extends Controller
{

    /**
    * @var User $authUser
    */
    private ?User $authUser;

    /**
    * @var ProductService $productService
    */
    private ProductService $productService;

    public function __construct(ProductService $productService) {
        $this->middleware("auth:" . AppGuardInterface::ADMIN_GUARD);
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $products = $this->productService->getProducts();
        return response()->json(ProductCollection::make($products));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $createsProduct = $this->productService->storeProduct($request->all());
        return response()->json(ProductResource::make($createsProduct));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $showProduct = $this->productService->showProduct($id);
        return response()->json(ProductResource::make($showProduct));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $updatedProduct = $this->productService->updateProduct($id, $request->all());
        return response()->json(ProductResource::make($updatedProduct));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->productService->deleteProduct($id);
        return response()->noContent();
    }
}
