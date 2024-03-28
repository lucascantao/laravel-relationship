@extends('layouts.app')
@section('title', 'products')
@section('content')
    
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <div class="container mt-3">
            <label class="form-label">Product name</label>
            <input class="form-control mb-3" type="text" name="name">
            <label class="form-label">Description</label>
            <input class="form-control mb-3" type="text" name="description">
            <div class="mb-3">
                <label class="form-label">Categories</label>
                    @foreach ($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]" id="{{$category->id}}" value="{{$category->id}}">
                            <label class="from-check-label" for="{{$category->id}}">{{$category->name}}</label>
                        </div>
                    @endforeach
            </div>
            <input class="form-control mb-3" type="text" name="price" id="price">
            <input class="btn btn-success" type="submit" value="Create">
        </div>
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