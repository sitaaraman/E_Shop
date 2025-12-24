@extends('customer.layout')

@section('content')

<h4>Welcome 👋</h4>
<p>Total Invoices: <strong>{{ $invoiceCount }}</strong></p>

<div class="row">
@foreach($products as $product)
    <div class="col-md-4 mb-3">
        <div class="card h-100">

            @if($product->product_images)
                <img src="{{ asset('uploads/products/'.$product->product_images[0]) }}"
                     class="card-img-top" height="200">
            @endif

            <div class="card-body text-center">
                <h5>{{ $product->product_name }}</h5>
                <p>₹ {{ $product->product_price }}</p>

                <a href="/cart/add/{{ $product->id }}" class="btn btn-success btn-sm">
                    Add to Cart
                </a>
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection
