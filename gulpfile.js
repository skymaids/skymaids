const elixir = require('laravel-elixir');
const HOST = "0.0.0.0";  // constante para alterar o nosos host de forma global, alterando aqui tudo é alterado para baixo

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {

    mix.sass('app.scss');

    mix.copy('./node_modules/skymaids-theme/assets/images', 'public/images')
        .copy('./node_modules/skymaids-theme/assets/fonts', 'public/fonts')
        .copy('./node_modules/skymaids-theme/assets/data', 'public/data')
        .copy('./node_modules/skymaids-theme/assets/js/pages', 'public/js/pages')
        .copy('./resources/assets/vendor/js/pdf', 'public/js/pdf');

    mix.scripts([
        './node_modules/skymaids-theme/global/vendor/html5shiv/html5shiv.min.js',
        './node_modules/skymaids-theme/global/vendor/media-match/media.match.min.js',
        './node_modules/skymaids-theme/global/vendor/respond/respond.min.js',
        './node_modules/skymaids-theme/global/vendor/breakpoints/breakpoints.js',
        './node_modules/skymaids-theme/global/vendor/babel-external-helpers/babel-external-helpers.js',
        './node_modules/skymaids-theme/global/vendor/jquery/jquery.js',
        './node_modules/skymaids-theme/global/vendor/tether/tether.js',
        './node_modules/skymaids-theme/global/vendor/bootstrap/bootstrap.js',
        './node_modules/skymaids-theme/global/vendor/animsition/animsition.js',
        './node_modules/skymaids-theme/global/vendor/mousewheel/jquery.mousewheel.js',
        './node_modules/skymaids-theme/global/vendor/asscrollbar/jquery-asScrollbar.js',
        './node_modules/skymaids-theme/global/vendor/asscrollable/jquery-asScrollable.js',
        './node_modules/skymaids-theme/global/vendor/ashoverscroll/jquery-asHoverScroll.js',
        './node_modules/skymaids-theme/global/vendor/waves/waves.js',
        './node_modules/skymaids-theme/global/vendor/switchery/switchery.min.js',
        './node_modules/skymaids-theme/global/vendor/intro-js/intro.js',
        './node_modules/skymaids-theme/global/vendor/screenfull/screenfull.js',
        './node_modules/skymaids-theme/global/vendor/datatables/jquery.dataTables.js',
        './node_modules/skymaids-theme/global/vendor/datatables-fixedheader/dataTables.fixedHeader.js',
        './node_modules/skymaids-theme/global/vendor/datatables-bootstrap/dataTables.bootstrap.js',
        './node_modules/skymaids-theme/global/vendor/datatables-responsive/dataTables.responsive.js',
        './node_modules/skymaids-theme/global/vendor/datatables-tabletools/dataTables.tableTools.js',
        './node_modules/skymaids-theme/global/vendor/select2/select2.full.min.js',
        './node_modules/skymaids-theme/global/vendor/slidepanel/jquery-slidePanel.js',
        './node_modules/skymaids-theme/global/vendor/toastr/toastr.js',
        './node_modules/skymaids-theme/global/vendor/chartist/chartist.min.js',
        './node_modules/skymaids-theme/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js',
        './node_modules/skymaids-theme/global/vendor/jvectormap/jquery-jvectormap.min.js',
        './node_modules/skymaids-theme/global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js',
        './node_modules/skymaids-theme/global/vendor/matchheight/jquery.matchHeight-min.js',
        './node_modules/skymaids-theme/global/vendor/peity/jquery.peity.min.js',
        './node_modules/skymaids-theme/global/vendor/jquery-placeholder/jquery.placeholder.js',
        './node_modules/skymaids-theme/global/js/State.js',
        './node_modules/skymaids-theme/global/js/Component.js',
        './node_modules/skymaids-theme/global/js/Plugin.js',
        './node_modules/skymaids-theme/global/js/Base.js',
        './node_modules/skymaids-theme/global/js/Config.js',
        './node_modules/skymaids-theme/assets/js/Section/Menubar.js',
        './node_modules/skymaids-theme/assets/js/Section/GridMenu.js',
        './node_modules/skymaids-theme/assets/js/Section/Sidebar.js',
        './node_modules/skymaids-theme/assets/js/Section/PageAside.js',
        './node_modules/skymaids-theme/assets/js/Plugin/menu.js',
        './node_modules/skymaids-theme/global/js/config/colors.js',
        './node_modules/skymaids-theme/assets/js/config/tour.js',
        './node_modules/skymaids-theme/assets/js/Site.js',
        './node_modules/skymaids-theme/global/js/Plugin/asscrollable.js',
        './node_modules/skymaids-theme/global/js/Plugin/slidepanel.js',
        './node_modules/skymaids-theme/global/js/Plugin/switchery.js',
        './node_modules/skymaids-theme/global/js/Plugin/toastr.js',
        './node_modules/skymaids-theme/global/js/Plugin/datatables.js',
        './node_modules/skymaids-theme/global/js/Plugin/select2.js',
        './node_modules/skymaids-theme/global/js/Plugin/matchheight.js',
        './node_modules/skymaids-theme/global/js/Plugin/jvectormap.js',
        './node_modules/skymaids-theme/global/js/Plugin/peity.js',
        './node_modules/skymaids-theme/global/js/Plugin/material.js',
        './node_modules/skymaids-theme/global/js/Plugin/animate-list.js',
        './node_modules/skymaids-theme/global/js/Plugin/animate-list.js',
        './resources/assets/vendor/js/idletimer/idletimer.js'
    ], 'public/js/vendor.js');

    mix.webpack('app.js');

    // mix.version([
    //     'public/css/app.css',
    //     'public/js/app.js'
    // ]);

    mix.browserSync({
        proxy: `http://${HOST}:8000`
    });
});