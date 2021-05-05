<?php

namespace App\Http\Controllers;

use App\Http\Resources\CardResource;
use App\Models\User;
use App\Services\Base\AppGuardInterface;
use App\Services\CardService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{

    /**
    * @var User $authUser
    */
    private User $authUser;

    /**
    * @var CardService $cardService
    */
    private CardService $cardService;

    public function __construct(CardService $cardService) {
        $this->middleware('auth:' . AppGuardInterface::USER_GUARD);
        $this->authUser = Auth::guard(AppGuardInterface::USER_GUARD)->user();
        $this->cardService = $cardService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $cards = $this->cardService->loadMyCards($this->authUser);
        return response()->json(CardResource::collection($cards));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $storedCard = $this->cardService->storeCard($this->authUser, $request->all());
        return response()->json(CardResource::make($storedCard));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $showCard = $this->cardService->showCard($id);
        return response()->json(CardResource::make($showCard));
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
        $updatedCard = $this->cardService->updateCard($this->authUser, $id, $request->all());
        return response()->json(CardResource::make($updatedCard));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->cardService->deleteCard($this->authUser, $id);
        return response()->noContent();
    }
}
