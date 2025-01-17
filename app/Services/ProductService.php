<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductService {

    public function search(Request $request, $product, $orderBy) {

        if ($orderBy == 'asc') {
            $orderBy = 'asc';
        } else {
            $orderBy = 'desc';
        }

        $products = Product::query()
            ->where('name', 'LIKE', "%{$product}%")
            ->orWhere('description', 'LIKE', "%{$product}%")
            ->orWhere('price', 'LIKE', "%{$product}%")
            ->orWhere('discount', 'LIKE', "%{$product}%")
            ->orWhere('quantity', 'LIKE', "%{$product}%")
            ->orWhere('color', 'LIKE', "%{$product}%")
            ->orWhere('rating', 'LIKE', "%{$product}%")
            ->orWhere('size', 'LIKE', "%{$product}%")
            ->orderBy('price',$orderBy)
            ->paginate(10);


        return response()->json($products);
    }
}
