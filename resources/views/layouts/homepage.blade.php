<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body>
    <!-- Navbar -->
    @include('includes.navbar')
    <!-- End Navbar -->

    {{-- Content --}}
    @yield('content')
    {{-- end Content --}}

    {{-- Footer --}}
    @include('includes.footer')
    {{-- end Footer --}}

    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>