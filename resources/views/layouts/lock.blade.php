<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    @include('layouts._parts.app.head')
    <body class="animsition page-locked layout-full page-dark">
        @include('layouts._parts.app.check-browser')
        <div id="app" class="page vertical-align text-xs-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <div class="page-content vertical-align-middle">
                @yield('content')

                @include('layouts._parts.lock.footer')
            </div>
        </div>
        @include('layouts._parts.app.script')
    </body>
</html>