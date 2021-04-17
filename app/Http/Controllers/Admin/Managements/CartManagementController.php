<?php

namespace App\Http\Controllers\Admin\Managements;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Services\Base\AppGuardInterface;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartManagementController extends Controller
{

    /**
    * @var CartService $cartService
    */
    private CartService $cartService;

    public function __construct(CartService $cartService) {
        $this->middleware("auth:" . AppGuardInterface::ADMIN_GUARD);
        $this->cartService = $cartService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $carts = $this->cartService->getManagementCats();
        return response()->json(CartResource::collection($carts));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $foundCart = $this->cartService->showManagementCart($id);
        return response()->json(CartResource::make($foundCart));
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
        $updatedCart = $this->cartService->updateManagementCart($id, $request->all());
        return response()->json(CartResource::make($updatedCart));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->cartService->deleteManagement($id);
        return response()->noContent();
    }

    public function changeStatus(Request $request, int $id): JsonResponse
    {
        $changedStatus = $this->cartService->changeStatus($id, $request->all());
        return response()->json(["status" => $changedStatus->status]);
    }
}
