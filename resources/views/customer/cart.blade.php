@extends('customer.layout')

@section('content')
    <h3>My Cart</h3>

    @if (empty($cart))
        <p>Cart is empty</p>
    @else
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Action</th>
            </tr>

            @php $grand = 0; @endphp
            @foreach ($cart as $id => $item)
                @php
                    $total = $item['price'] * $item['qty'];
                    $grand += $total;
                @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>
                        <a href="/cart/decrease/{{ $id }}">−</a>
                        {{ $item['qty'] }}
                        <a href="/cart/increase/{{ $id }}">+</a>
                    </td>
                    <td>{{ $total }}</td>
                    <td>
                        <a href="/cart/remove/{{ $id }}" class="btn btn-danger btn-sm">
                            Remove
                        </a>
                    </td>
                </tr>
            @endforeach

            <tr>
                <th colspan="4">Grand Total</th>
                <th>{{ $grand }}</th>
            </tr>
        </table>

        <a href="{{ route('customer.checkout') }}" class="btn btn-primary">
            Checkout
        </a>
        {{-- <form method="POST" action="{{ route('customer.place.order') }}">
            @csrf
            <button class="btn btn-success w-100 mt-3">
                Place Order
            </button>
        </form> --}}
    @endif
@endsection
