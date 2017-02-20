<?php
namespace Modules\Auth\Http\Requests;

use Illuminate\Http\Request;

/**
 * Class LockRequest
 * @package Modules\Auth
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date ${DATE}
 * @version 1.0
 */
class LockRequest extends Request
{
    /**
     * Libera o acesso sempre as regras não importa o usuário
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Regras de validação do formulário do bloqueio
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:6'
        ];
    }
}
