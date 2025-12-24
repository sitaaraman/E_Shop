@extends('customer.layout')

@section('content')
    <h3>Checkout</h3>

    <table class="table table-bordered">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>

        @php $grand = 0; @endphp
        @foreach ($cart as $item)
            @php
                $total = $item['price'] * $item['qty'];
                $grand += $total;
            @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>{{ $total }}</td>
            </tr>
        @endforeach

        <tr>
            <th colspan="3">Grand Total</th>
            <th>{{ $grand }}</th>
        </tr>
    </table>

    <form method="POST" action="{{ route('customer.place.order') }}">
        @csrf
        <button class="btn btn-success">Place Order</button>
    </form>
@endsection
