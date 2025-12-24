@extends('admin.layout')

@section('content')
    <h3>Edit Product</h3>

    <form method="POST" action="/admin/product/update/{{ $product->id }}">
        @csrf

        <input class="form-control mb-2" name="product_name" value="{{ $product->product_name }}">
        <textarea class="form-control mb-2" name="product_detail">{{ $product->product_detail }}</textarea>
        <input class="form-control mb-2" name="product_price" value="{{ $product->product_price }}">
        <input class="form-control mb-2" name="product_quantity" value="{{ $product->product_quantity }}">
        <input class="form-control mb-2" name="product_category" value="{{ $product->product_category }}">

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
