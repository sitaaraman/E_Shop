{{-- @extends('customer.layout')

@section('content')
    <h3>My Orders</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Invoice No</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->invoice_no }}</td>
                <td>{{ $invoice->total_amount }}</td>
                <td>
                    <span class="badge bg-info">
                        {{ ucfirst($invoice->status) }}
                    </span>
                </td>
                <td>{{ $invoice->created_at->format('d-m-Y') }}</td>
            </tr>
        @endforeach

    </table>
@endsection --}}

@extends('customer.layout')

@section('content')
<h3 class="mb-3">My Invoices</h3>

<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @forelse($invoices as $invoice)
        <tr>
            <td>{{ $invoice->id }}</td>
            <td>₹{{ $invoice->total }}</td>
            <td>
                <span class="badge bg-info">{{ ucfirst($invoice->status) }}</span>
            </td>
            <td>
                <a href="/customer/invoice/{{ $invoice->id }}" class="btn btn-sm btn-primary">
                    View
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">No invoices found</td>
        </tr>
    @endforelse
</table>
@endsection
