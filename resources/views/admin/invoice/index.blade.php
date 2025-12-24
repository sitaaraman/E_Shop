@extends('admin.layout')

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h3>Invoices</h3>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
            ← Back to Dashboard
        </a>
    </div>


    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->customer->name ?? '-' }}</td>
                <td>₹{{ $invoice->total }}</td>
                <td>{{ $invoice->status }}</td>
                <td>
                    <a href="/admin/invoice/status/{{ $invoice->id }}/paid" class="btn btn-success btn-sm">Paid</a>
                    <a href="/admin/invoice/status/{{ $invoice->id }}/cancelled" class="btn btn-danger btn-sm">Cancel</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
