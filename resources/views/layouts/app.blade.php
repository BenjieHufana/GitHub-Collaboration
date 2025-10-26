<!DOCTYPE html>
<html>
<head>
    <title>MySales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">MySales</a>
        <div>
            <a href="{{ route('products.index') }}" class="btn btn-outline-light btn-sm">Products</a>
            <a href="{{ route('sales.index') }}" class="btn btn-outline-light btn-sm">Sales</a>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
