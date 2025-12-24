<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="/admin/dashboard">Admin Panel</a>

        @if (session()->has('admin_id'))
            <a href="/admin/logout" class="btn btn-danger btn-sm">Logout</a>
        @endif
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

</body>

</html>
