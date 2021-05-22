<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\User;
use App\Services\AddressService;
use App\Services\Base\AppGuardInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
    * @var User $authUser
    */
    private ?User $authUser;

    /**
    * @var AddressService $addressService
    */
    private AddressService $addressService;

    public function __construct(AddressService $addressService) {
        $this->middleware("auth:" . AppGuardInterface::USER_GUARD);
        $this->authUser = Auth::guard(AppGuardInterface::USER_GUARD)->user();
        $this->addressService = $addressService;
        $this->authorizeResource(Address::class);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        return response()->json(
            AddressResource::collection(
                $this->authUser->addresses()->orderBy('created_at', 'DESC')->get()
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request): Response
    {
        $this->addressService->addAddress($this->authUser, $request->validated());
        return response()->noContent(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $address = $this->addressService->showAddress($id);
        return response()->json(AddressResource::make($address));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, int $id): Response
    {
        $this->addressService->updateAddress($id, $request->validated());
        return response()->noContent(Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->addressService->deleteAddress($id);
        return response()->noContent();
    }
}
