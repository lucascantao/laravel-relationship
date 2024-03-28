@extends('layouts.app')
@section('title', 'products')
@section('content')
    <div class="container mt-3">
        <div class="container text-center">
            <div class="row">
              <div class="col">
                <p>ID</p>
              </div>
              <div class="col">
                <p>Name</p>
              </div>
              <div class="col">
                <p>Category</p>
              </div>
              <div class="col">
                <p>Price</p>
              </div>
              <div class="col">
                
              </div>
            </div>
          </div>
        @foreach ($products as $product) 
            <div class="container text-center">
                <div class="row border-bottom">
                  <div class="col">
                    <p>{{$product->id}}</p>
                  </div>
                  <div class="col">
                    <p>{{$product->name}}</p>
                  </div>
                  <div class="col">
                    @foreach ($product->categories as $category)
                        <p class="text-secondary border bg-body-tertiary">{{$category->name}}</p>
                    @endforeach
                  </div>
                  <div class="col">
                    <p>{{ 'R$' . number_format($product->price, 2, ",", ".")}}</p>
                  </div>
                  <div class="col">
                    <a href="{{route('products.edit', ['product' => $product])}}"><button class="btn btn-warning">Edit</button></a>
                  </div>

                </div>
              </div>
        @endforeach
    </div>
@endsection