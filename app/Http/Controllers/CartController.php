<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cart = json_decode(request()->input('cart'), true) ??[];

        $cart[$productId] = [
                'id' => $product->id,
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'color' => $product->color,
                'qty' => 1,
                'inCart' => true
        ];

        return response()->json([
            'cart' => $cart,
        ]);
    }

    public function deleteItem( $productId){

        return response()->json([
            'success' => true,
        ]);
    }


}
