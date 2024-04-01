@extends('layouts.app')
@section('title', 'products')
@section('content')
    <table class="table container">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">name</th>
          <th scope="col">category</th>
          <th scope="col">price</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product) 
        <tr>
          <th scope="row">{{$product->id}}</th>
          <td>{{$product->name}}</td>
          <td>
            @foreach ($product->categories as $category)
              {{$category->name}}
            @endforeach
          </td>
          <td>{{ 'R$' . number_format($product->price, 2, ",", ".")}}</td>
          <td><a href="{{route('products.edit', ['product' => $product])}}"><button class="btn btn-warning">Edit</button></a></td>
          <td><form action="{{route('products.destroy', ['product'=>$product])}}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" value="delete" class="btn btn-danger">
          </form></td>
        </tr>
            {{-- <div class="container text-center">
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
                  <div class="col">  
                    <form action="{{route('products.destroy', ['product'=>$product])}}" method="POST">
                      @csrf
                      @method('delete')
                      <input type="submit" value="delete" class="btn btn-danger">
                    </form>
                    <a href="{{route('products.destroy', ['product' => $product])}}"><button class="btn btn-danger">Delete</button></a>
                  </div>

                </div>
              </div> --}}
        @endforeach
      </tbody>
    </table>
        
@endsection