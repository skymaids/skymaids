<script src="{{ elixir('js/app.js') }}"></script>
<script src="{{ elixir('js/vendor.js') }}"></script>

<script>
    Breakpoints();

    (function(document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function() {
            Site.run();
        });
    })(document, window, jQuery);
</script>