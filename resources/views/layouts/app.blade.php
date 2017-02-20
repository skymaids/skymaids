<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

    @include('layouts._parts.app.head')

    <body class="animsition">
        @include('layouts._parts.app.check-browser')
        @include('layouts._parts.app.navigation.navbar')
        @include('layouts._parts.app.navigation.menu')

        <div id="app" class="page">
            @yield('content')
        </div>

        @include('layouts._parts.app.footer')
        @include('layouts._parts.app.script')
    </body>
</html>