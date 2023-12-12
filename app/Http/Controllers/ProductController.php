<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index (){

        return view('home',[
            ]
        );
    }

    public function getData()
    {
        $data = Product::get();
        return response()->json($data);
    }
}
