<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('backend/uploads/favicon.png') }}">

    <title>Admin Panel</title>

    @include('admin.layouts.admin_styles')
    @include('admin.layouts.admin_scripts')
</head>

<body>
    @include('admin.components.display_toast')

    <div id="app">
        <div class="main-wrapper">

            @include('admin.layouts.admin_header')

            @include('admin.layouts.admin_sidebar')

            <div class="main-content">
                @yield('admin-content')
            </div>

        </div>
    </div>

    @include('admin.layouts.admin_scripts_footer')

</body>

</html>
