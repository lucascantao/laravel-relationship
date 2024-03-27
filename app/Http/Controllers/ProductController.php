<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index() {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    function create() {
        return view('products.create');
    }

    function store(Request $request) {

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $data['price'] = str_replace(array('R$','.',','), array('','','.'),$data['price']);

        $newProduct = Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product Saved');
    }
}
