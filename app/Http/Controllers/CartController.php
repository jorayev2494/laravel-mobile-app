<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\User;
use App\Services\Base\AppGuardInterface;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    /**
    * @var User $authUser
    */
    private ?User $authUser;
    
    /**
    * @var CartService $cartService
    */
    private CartService $cartService;

    public function __construct(CartService $cartService) {
        $this->middleware("auth:" . AppGuardInterface::USER_GUARD);
        $this->authUser = Auth::guard(AppGuardInterface::USER_GUARD)->user();
        $this->cartService = $cartService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $carts = $this->cartService->myCarts($this->authUser);
        return response()->json(CartResource::collection($carts));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): Response
    {
        $this->cartService->createCart($this->authUser, $request->all());
        return response()->noContent(Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $foundMyCart = $this->cartService->findMyCart($this->authUser, $id);
        return response()->json(CartResource::make($foundMyCart));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, int $id): JsonResponse
    // {
    //     return response()->json();
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->cartService->deleteByCart($this->authUser, $id);
        return response()->noContent();
    }
}
