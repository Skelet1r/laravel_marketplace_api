<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller {

    protected ProductService $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }
    public function search(Request $request, $product, $orderBy) {
        return $this->productService->search($request ,$product, $orderBy);
    }
}
