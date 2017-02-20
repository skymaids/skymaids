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