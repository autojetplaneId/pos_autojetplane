<?php

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addOrder(){
        $products = Product::orderBy('created_at','DESC')->get();
        return view('orders.add',compact('products'));
    }

    public function getProduct($id)
    {
        $products = Product::findOrFail($id);
        return response()->json($products, 200);
    }

}
