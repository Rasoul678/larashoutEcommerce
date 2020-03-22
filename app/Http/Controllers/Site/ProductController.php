<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class ProductController extends Controller
{
    /**
     * @param $slug
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

//        dd($product);
        return view('site.pages.product', compact('product'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->input('productId'));

        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'));

        return redirect()->back();
    }
}
