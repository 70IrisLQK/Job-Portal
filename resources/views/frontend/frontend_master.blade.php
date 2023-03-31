<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="" />
    <title>Job Hunt</title>

    <link rel="icon" type="image/png" href="{{ asset('frontend/imgs/favicon.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- All CSS -->
    @include('frontend.layouts.styles')

    <!-- All Javascripts -->
    @include('frontend.layouts.script')

</head>

<body>

    {{-- Top --}}
    @include('frontend.layouts.top')

    {{-- Navbar --}}
    @include('frontend.layouts.navbar')

    @yield('frontend-content')

    {{-- Footer --}}
    @include('frontend.layouts.footer')

    {{-- Footer bottom --}}
    @include('frontend.layouts.footer_bottom')

    {{-- scroll_top --}}
    @include('frontend.layouts.scroll_top')

    @include('frontend.layouts.script_footer')
</body>

</html>
