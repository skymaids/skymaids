<!DOCTYPE html>
<html lang="en">
    @include('layouts._parts.app.head')

    <body class="animsition page-login-v2 layout-full page-dark">
        @include('layouts._parts.app.check-browser')

        <div id="app" class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <div class="page-content">
                @include('layouts._parts.login.brand-info')
                <div class="page-login-main" style="padding: 50px 60px 30px !important; ">
                    @include('layouts._parts.login.form')
                </div>
            </div>
        </div>

        @include('layouts._parts.login.script')
    </body>
</html>