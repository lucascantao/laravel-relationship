@extends('layouts.app')
@section('title', 'products')
@section('content')
    
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <input type="text" name="name">
        <input type="text" name="description">
        <input type="text" name="price" id="price">
        <input type="submit" value="submit">
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