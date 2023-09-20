<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use IntlChar;

class ProductController extends Controller
{
    public function index()
    {   
        $product = Product::orderBy('id', 'desc')->get()->map(function($item){
            $item->created_at = $item_
        })
        return Inertia::render('Backend/Product/Index');
    }
    public function product_create()
    {
        return Inertia::render('Backend/Product/CreateProduct');
    }
   public function product_store(Request $request)
   {
        $request->validate([
            'name'=>'required|max:255|string',
            'price'=>'required|min:0|numeric',
            'public'=>'required|numeric',
            'desc'=>'max:255|string',
        ]);

        $product = Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'public'=>$request->public,
            'desc'=>$request->desc,
        ]);
   }
}
