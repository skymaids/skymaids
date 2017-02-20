@extends('layouts.mail')

@section('content')

    <h4 style="color: #424242; font-family: Roboto,sans-serif; font-weight: 400; font-size: 19px; margin:10px 0 0 0">
        Resetar senha do usuário {{ $name }}
    </h4>

    <p>Caso você tenha esquecido sua senha e desejar cadastrar uma nova clique no link abaixo:</p>

    <a style="border-radius: 3px; box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.1);
font-size: 14px; line-height: 1.57143; padding: 10px 15px;
 background-color: #3f51b5; border-color: #3f51b5; color: #fff; text-decoration:none;"
       href="{{ url('password/reset', $token) }}">
        Link de Acesso
    </a>
@endsection