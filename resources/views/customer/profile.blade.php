@extends('customer.layout')

@section('content')
    <a href="{{ route('customer.dashboard') }}" class="btn btn-secondary btn-sm mb-3">
        ← Dashboard
    </a>

    <h3>My Profile</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('customer.profile.update') }}">
        @csrf

        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" value="{{ $customer->name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
    </form>
@endsection
