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

        if (isset($cart[$productId])) {
            $cart[$productId]['qty'] += 1;
        } else {
            $cart[$productId] = [
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'color' => $product->color,
                'qty' => 1
            ];
        }

        $request->session()->put('cart', $cart);
        return response()->json([
            'cart' => $cart,
        ]);
    }

    public function index(Request $request)
    {
        $products = Product::get();

        $cart = session()->get('cart');
        return view('home', [
            'cart' => $cart,
            'products' => $products,
        ]);
    }

    public function deleteItem( $productId){
        $cart = session()->get('cart', []);
        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return response()->json([
            'success' => true,
        ]);
    }

}
