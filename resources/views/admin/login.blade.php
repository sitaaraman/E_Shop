@extends('admin.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">

            <h3 class="mb-3 text-center">Admin Login</h3>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="/admin/login">
                @csrf

                <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                <button class="btn btn-primary w-100">Login</button>
            </form>

        </div>
    </div>
@endsection
