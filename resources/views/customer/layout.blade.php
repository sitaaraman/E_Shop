<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'E_Site') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('customer.dashboard') }}">E-Shop</a>

            <div class="d-flex gap-2">

                {{-- IF CUSTOMER LOGGED IN --}}
                @if (session()->has('customer_id'))
                    <a href="{{ route('customer.profile') }}" class="btn btn-outline-light btn-sm">
                        Profile
                    </a>

                    <a href="{{ route('customer.cart') }}" class="btn btn-warning btn-sm">
                        Cart ({{ session('cart') ? count(session('cart')) : 0 }})
                    </a>

                    <a href="{{ route('customer.invoices') }}" class="btn btn-success btn-sm">
                        Invoices
                    </a>

                    <a href="{{ route('customer.logout') }}" class="btn btn-danger btn-sm">
                        Logout
                    </a>

                    {{-- IF CUSTOMER NOT LOGGED IN --}}
                @else
                    <a href="{{ route('customer.login') }}" class="btn btn-outline-light btn-sm">
                        Login
                    </a>

                    <a href="{{ route('customer.register') }}" class="btn btn-success btn-sm">
                        Register
                    </a>
                @endif

            </div>


        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

</body>

</html>
