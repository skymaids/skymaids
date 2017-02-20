<!DOCTYPE html>
<html  lang="en">
    <head>
        <meta charset="utf-8">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script type="application/javascript">
            window.Laravel = <?php
            echo json_encode([
                    'csrfToken' => csrf_token(),
            ]);
            ?>
        </script>
    </head>
    <body>
        @yield('content')
        <script src="{{ elixir('js/app.js') }}"></script>
        <script src="{{ elixir('js/vendor.js') }}"></script>
    </body>
</html>