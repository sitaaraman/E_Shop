@extends('admin.layout')

@section('content')
    <h3 class="mb-3">Products</h3>

    <a href="/admin/product/create" class="btn btn-primary mb-3">Add Product</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Action</th>
        </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>₹{{ $product->product_price }}</td>
                <td>{{ $product->product_quantity }}</td>
                <td>
                    <a href="/admin/product/edit/{{ $product->id }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/admin/product/delete/{{ $product->id }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mb-3 d-flex justify-content-between align-items-center">

        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
            ← Back to Dashboard
        </a>
    </div>
@endsection
