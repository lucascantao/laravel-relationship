@extends('layouts.app')
@section('title', 'products')
@section('content')
    
    <form action="{{route('products.update', ['product' => $product])}}" method="POST">
        @csrf
        @method('put')
        <input type="text" name="name" value="{{$product->name}}">
        <input type="text" name="description" value="{{$product->description}}">
        <input type="text" name="price" id="price" value="R${{$product->price}}">
        <input type="submit" value="update">
    </form>

    <script>
        $(function() {
            $("#price").maskMoney({
                prefix:'R$',
                decimal:',',
                thousands:'.'
            })
        })
    </script>
    
@endsection