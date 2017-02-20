<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div">
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category">Administrator</li>
                    {{ Menu::get() }}
                </ul>

                @include('layouts._parts.app.navigation.menu-progress')
            </div>
        </div>
    </div>
    @include('layouts._parts.app.navigation.menu-footer')
</div>