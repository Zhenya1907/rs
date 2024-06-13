<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a list of the products
     */
    public function index(ProductFilterRequest $request): AnonymousResourceCollection
    {
        $validatedData = $request->validated();

        $products = $this->productService->getProducts($validatedData);

        return ProductResource::collection($products);
    }
}
