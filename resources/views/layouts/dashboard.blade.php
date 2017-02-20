<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

    @include('layouts._parts.app.head')

    <body class="animsition dashboard">
        @include('layouts._parts.app.check-browser')
        @include('layouts._parts.app.navigation.navbar')
        @include('layouts._parts.app.navigation.menu')

        @yield('content')

        @include('layouts._parts.app.footer')
        @include('layouts._parts.dashboard.script')
    </body>
</html>