@extends('admin.layout')

@section('content')
    <h3 class="mb-4">Admin Dashboard</h3>

    <div class="row">

        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body text-center">
                    <h5>Total Products</h5>
                    <h2>{{ $productCount }}</h2>
                    <a href="/admin/products" class="btn btn-light btn-sm">Manage</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body text-center">
                    <h5>Total Customers</h5>
                    <h2>{{ $customerCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-warning mb-3">
                <div class="card-body text-center">
                    <h5>Total Invoices</h5>
                    <h2>{{ $invoiceCount }}</h2>
                    <a href="/admin/invoices" class="btn btn-dark btn-sm">View</a>
                </div>
            </div>
        </div>

    </div>
@endsection
