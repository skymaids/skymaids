<?php
namespace Modules\Auth\Traits;

/**
 * Class SessionTrait
 * @package Modules\Auth
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @date 20/07/2016
 * @version 1.0
 */
Trait LockSessionTrait
{
    /**
     * Recebe a session do usuário
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * Nome da chave da session responsável pelo bloqueio
     *
     * @var string
     */
    protected $sessionKey = 'lock';


    /**
     * Seta a session
     *
     * @param $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * Retorna chave da session
     *
     * @return string
     */
    public function getKey()
    {
        return $this->sessionKey;
    }

    /**
     * Apaga da sessão
     *
     * @param $sessionKey
     */
    public function forget($sessionKey)
    {
        $this->session->forget($sessionKey);
    }

    /**
     * Seta valor a chave
     *
     * @param $sessionKey
     * @param $value string|boolean Valor a ser atribuído
     */
    public function push($sessionKey,$value)
    {
        $this->session->push($sessionKey,$value);
    }

    /**
     * Trava a sessão do usuário setando variável
     *
     * @param $session
     */
    public function lockSession($session)
    {
        $this->setSession($session);
        $this->push($this->sessionKey,true);
    }

    /**
     * Destrava sessão removendo variável
     *
     * @param $session
     */
    public function unlockSession($session)
    {
        $this->setSession($session);
        $this->forget($this->sessionKey);
    }
}