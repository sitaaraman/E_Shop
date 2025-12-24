@extends('admin.layout')

@section('content')
    <h3>Add Product</h3>

    <form method="POST" action="/admin/product/store" enctype="multipart/form-data">
        @csrf

        <input class="form-control mb-2" name="product_name" placeholder="Product Name" required>
        <textarea class="form-control mb-2" name="product_detail" placeholder="Details"></textarea>
        <input class="form-control mb-2" type="file" name="product_images[]" multiple>
        <input class="form-control mb-2" name="product_price" placeholder="Price">
        <input class="form-control mb-2" name="product_quantity" placeholder="Quantity">
        <input class="form-control mb-2" name="product_category" placeholder="Category">

        <button class="btn btn-success">Save</button>
    </form>
@endsection
