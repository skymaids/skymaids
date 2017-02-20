<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Campo deve ser aceito.',
    'active_url'           => 'Campo não é uma URL válida.',
    'after'                => 'Campo deve ser uma data depois de :date.',
    'alpha'                => 'Campo deve conter somente letras.',
    'alpha_dash'           => 'Campo deve conter letras, números e traços.',
    'alpha_num'            => 'Campo deve conter somente letras e números.',
    'array'                => 'Campo deve ser um array.',
    'before'               => 'Campo deve ser uma data antes de :date.',
    'between'              => [
        'numeric' => 'Campo deve estar entre :min e :max.',
        'file'    => 'Campo deve estar entre :min e :max kilobytes.',
        'string'  => 'Campo deve estar entre :min e :max caracteres.',
        'array'   => 'Campo deve ter entre :min e :max itens.',
    ],
    'boolean'              => 'Campo deve ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação de :attribute não confere.',
    'date'                 => 'Campo não é uma data válida.',
    'date_format'          => 'Campo não confere com o formato :format.',
    'different'            => 'Campo e :other devem ser diferentes.',
    'digits'               => 'Campo deve ter :digits dígitos.',
    'digits_between'       => 'Campo deve ter entre :min e :max dígitos.',
    'email'                => 'Campo deve ser um endereço de e-mail válido.',
    'exists'               => 'O Campo selecionado é inválido.',
    'filled'               => 'Campo obrigatório.',
    'image'                => 'Campo deve ser uma imagem.',
    'in'                   => 'Campo é inválido.',
    'integer'              => 'Campo deve ser um inteiro.',
    'ip'                   => 'Campo deve ser um endereço IP válido.',
    'json'                 => 'Campo deve ser um JSON válido.',
    'max'                  => [
        'numeric' => 'Campo não deve ser maior que :max.',
        'file'    => 'Campo não deve ter mais que :max kilobytes.',
        'string'  => 'Campo não deve ter mais que :max caracteres.',
        'array'   => 'Campo não pode ter mais que :max itens.',
    ],
    'mimes'                => 'Campo deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'Campo deve ser no mínimo :min.',
        'file'    => 'Campo deve ter no mínimo :min kilobytes.',
        'string'  => 'Campo deve ter no mínimo :min caracteres.',
        'array'   => 'Campo deve ter no mínimo :min itens.',
    ],
    'not_in'               => 'Campo selecionado é inválido.',
    'numeric'              => 'Campo deve ser um número.',
    'regex'                => 'Campo com formato inválido.',
    'required'             => 'Campo obrigatório.',
    'required_if'          => 'Campo é obrigatório quando :other é :value.',
    'required_unless'      => 'Campo é necessário a menos que :other esteja em :values.',
    'required_with'        => 'Campo é obrigatório quando :values está presente.',
    'required_with_all'    => 'Campo é obrigatório quando :values estão presentes.',
    'required_without'     => 'Campo é obrigatório quando :values não está presente.',
    'required_without_all' => 'Campo é obrigatório quando nenhum destes estão presentes: :values.',
    'same'                 => 'Campo e :other devem ser iguais.',
    'size'                 => [
        'numeric' => 'Campo deve ser :size.',
        'file'    => 'Campo deve ter :size kilobytes.',
        'string'  => 'Campo deve ter :size caracteres.',
        'array'   => 'Campo deve conter :size itens.',
    ],
    'string'               => 'Campo deve ser uma string',
    'timezone'             => 'Campo deve ser uma timezone válida.',
    'unique'               => 'Valor do campo digitado já existente.',
    'url'                  => 'Campo com formato inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => ['password' => 'Senha'],

];
