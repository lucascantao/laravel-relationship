@extends('layouts.app')
@section('title', 'products')
@section('content')
    <div class="container">
      <table id="myTable" class="table container">
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
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">category</th>
            <th scope="col">price</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </tfoot>
      </table>
  
      <a class="btn btn-success" href="{{route('products.create')}}">New product</a>
    </div>
        
@endsection