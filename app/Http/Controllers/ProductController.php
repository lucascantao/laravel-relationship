<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    function index() {
        $products = Product::all();
        return view('products.index', [
            'products' => $products,
        ]);
    }

    function create() {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    function store(Request $request) {

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'categories' => 'required',
        ]);

        $data['price'] = str_replace(array('R$','.',','), array('','','.'),$data['price']);

        $newProduct = Product::create($data);
        $newProduct->categories()->attach($data['categories']);

        return redirect()->route('products.index')->with('success', 'Product Saved');
    }

    function edit(Product $product) {
        $categories = Category::all();
        // $products = Product::all();
        // $cat = $catego
        // dd($products->get(0)->categories->contains(function($cat, $key) { 
        //     $categories = Category::all();
        //     return $cat->id == $categories->get(0)->id;
        // }));
        // dd($products->get(0)->categories->contains($categories->get(0)));
        // dd($products->get(0)->categories->all());
        // dd($categories->get(0));
        return view('products.edit',[
            'product' => $product, 
            'categories' => $categories
        ]);
    }

    function update(Product $product, Request $request) {

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'categories' => 'required'
        ]);

        $data['price'] = str_replace(array('R$','.',','), array('','','.'),$data['price']);



        $product->update($data);
        $product->categories()->sync($data['categories']);
        return redirect()->route('products.index')->with('success', 'Product Saved');
    }

    function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted');
    }
}
