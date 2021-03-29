<?php

namespace App\Http\Controllers\Admin\Managements;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\User;
use App\Services\Base\AppGuardInterface;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryManagementController extends Controller
{

    /**
    * @var CategoryService $categoryService
    */
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->middleware("auth:" . AppGuardInterface::ADMIN_GUARD);
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $categories = $this->categoryService->getForManagement();
        return response()->json(CategoryResource::collection($categories));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $storedCategory = $this->categoryService->storeCategory($request->all());
        return response()->json(CategoryResource::make($storedCategory));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $foundCategory = $this->categoryService->showCategory($id);
        return response()->json(CategoryResource::make($foundCategory));
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
        $updatedCategory = $this->categoryService->updateCategory($id, $request->all());
        return response()->json(CategoryResource::make($updatedCategory));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->categoryService->deleteCategory($id);
        return response()->noContent();
    }
}
