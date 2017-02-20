<?php

namespace  Modules\Auth\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class ResetPassword
 * OBS: Classe que envia a notification por email da alteração de senha
 * @package Modules\Auth
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date ${DATE}
 * @version 1.0
 */
class ResetPassword extends Notification
{
    /**
     * Token de acesso
     *
     * @var string
     */
    public $token;

    /**
     * Nome do usuário
     *
     * @var string
     */
    public $name;

    /**
     * Cria uma instancia
     *
     * @param  string  $token
     * @param  string  $name
     * @return void
     */
    public function __construct($token,$name)
    {
        $this->token = $token;
        $this->name  = $name;
    }

    /**
     * Verifica o tipo de notificação
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Cria o email da notificação
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail()
    {
        //Não está usando esses métodos é só o padrão utilizado pelo LARAVEL PASSPORT
        return (new MailMessage)
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', url('password/reset', $this->token))
            ->view('notifications::reset-password',['token' => $this->token,'name' => $this->name])
            ->line('If you did not request a password reset, no further action is required.');

    }
}