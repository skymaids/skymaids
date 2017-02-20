<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cuidado sua sessão vai expirar</h4>
            </div>
            <div class="modal-body">
                <p>Sua sessão ficou inativa por muito tempo. Por questões de segurança ela será automáticamente bloqueada. Caso deseje cancelar o processo de bloqueio selecione o botão "Manter Conectado"</p>
                <p>Sua sessão vai expirar em <span class="bold" id="sessionSecondsRemaining">120</span> segundos.</p>
            </div>
            <div class="modal-footer">
                <button id="extendSession" type="button" class="btn btn-default btn-success" data-dismiss="modal">Manter Conectado</button>
                <button id="logoutSession" type="button" class="btn btn-default" data-dismiss="modal">Sair do Sistema</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mdlLoggedOut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">You have been logged out</h4>
            </div>
            <div class="modal-body">
                <p>Your session has expired.</p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
    Breakpoints();

    (function ($) {
        var
                session = {
                    //Logout Settings
                    inactiveTimeout: 600000,     //(ms) The time until we display a warning message 600000
                    warningTimeout: 30000,      //(ms) The time until we log them out
                    minWarning: 5000,           //(ms) If they come back to page (on mobile), The minumum amount, before we just log them out
                    warningStart: null,         //Date time the warning was started
                    warningTimer: null,         //Timer running every second to countdown to logout
                    logout: function () {       //Logout function once warningTimeout has expired
                        //window.location = settings.autologout.logouturl;
                        window.location.replace("{{ url('/lock') }}");
                    },

                    //Keepalive Settings
                    keepaliveTimer: null,
                    keepaliveUrl: "",
                    keepaliveInterval: 5000,     //(ms) the interval to call said url
                    keepAlive: function () {
                        {{--                        window.location.replace("{{ url('/logout') }}");--}}
                                                $.ajax({ url: session.keepaliveUrl });
                    }
                }
                ;


        $(document).on("idle.idleTimer", function (event, elem, obj) {
            //Get time when user was last active
            var
                    diff = (+new Date()) - obj.lastActive - obj.timeout,
                    warning = (+new Date()) - diff
                    ;

            //On mobile js is paused, so see if this was triggered while we were sleeping
            if (diff >= session.warningTimeout || warning <= session.minWarning) {
                window.location.replace("{{ url('/lock') }}");
            } else {
                //Show dialog, and note the time
                $('#sessionSecondsRemaining').html(Math.round((session.warningTimeout - diff) / 1000));
                $("#myModal").modal("show");
                session.warningStart = (+new Date()) - diff;

                //Update counter downer every second
                session.warningTimer = setInterval(function () {
                    var remaining = Math.round((session.warningTimeout / 1000) - (((+new Date()) - session.warningStart) / 1000));
                    if (remaining >= 0) {
                        $('#sessionSecondsRemaining').html(remaining);
                    } else {
                        session.logout();
                    }
                }, 1000)
            }
        });

        // create a timer to keep server session alive, independent of idle timer
        session.keepaliveTimer = setInterval(function () {
            //session.keepAlive();
        }, session.keepaliveInterval);

        //User clicked ok to extend session
        $("#extendSession").click(function () {
            clearTimeout(session.warningTimer);
        });
        //User clicked logout
        $("#logoutSession").click(function () {
//            session.logout();
            window.location.replace("{{ url('/logout') }}");
        });

        //Set up the timer, if inactive for 10 seconds log them out
        $(document).idleTimer(session.inactiveTimeout);
    })(jQuery);
</script>