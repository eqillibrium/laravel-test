
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Блог</title>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>
<body>
<!-- Responsive navbar-->
<x-header></x-header>
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">

    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
    @yield('content')
    <!-- Side widgets-->
        <x-sidebar></x-sidebar>
    </div>
</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('assets/js/scripts.js') }}"></script>

@stack('js')
</body>
</html>
