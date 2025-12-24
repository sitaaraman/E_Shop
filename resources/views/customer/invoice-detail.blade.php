@extends('customer.layout')

@section('content')
<div class="container">
    <h2>Invoice #{{ $invoice->invoice_no }}</h2>

    <p>
        Status:
        <span class="badge bg-success">
            {{ ucfirst($invoice->status) }}
        </span>
    </p>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $item)
            <tr>
                <td>{{ $item->product->product_name ?? 'Deleted Product' }}</td>
                <td>₹{{ number_format($item->price, 2) }}</td>
                <td>{{ $item->qty }}</td>
                <td>₹{{ number_format($item->subtotal, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="text-end">
        Total: ₹{{ number_format($invoice->total, 2) }}
    </h4>

    <a href="{{ url('/customer/invoices') }}" class="btn btn-secondary mt-3">
        Back to Invoices
    </a>
</div>
@endsection
