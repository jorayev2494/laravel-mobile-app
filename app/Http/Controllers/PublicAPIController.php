<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class PublicAPIController extends Controller
{
    public function categories(): JsonResponse
    {
        /** @var CategoryService $categoryService */
        $categoryService = resolve(CategoryService::class);
        $categories = $categoryService->loadActiveCategories();
        return response()->json(CategoryResource::collection($categories));
    }

    public function products(): JsonResponse
    {
        $productsService = resolve(ProductService::class);
        $products = $productsService->activeProducts();
        return response()->json(ProductResource::collection($products));
    }
}