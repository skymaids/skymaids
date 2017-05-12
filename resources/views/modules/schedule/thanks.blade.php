<!-- Template -->
@extends('layouts.confirm')

<!-- Abre seção de título -->
@section('pageTitle')
    Thank You
@endsection

<!-- Abre seção de descrição -->
@section('pageDescription')
    The Sky Maids appreciate your confirmation.
@endsection

<!-- Abre seção de conteúdo -->
@section('content')

    <!-- Abrir Form -->
    {!! Form::open(array(
            'url'           =>  'https://goo.gl/ARygZH',
            'method'        =>  'get'
        ))
    !!}

    <!-- Token Form -->
    {{ Form::token() }}

        <h4 class="example-title">Give us a review and get an one time discount!</h4>

        <!-- Botão de registro -->
        {!! Form::button('Review us', ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) !!}
    <!-- Fechar Form -->
    {!! Form::close() !!}

<!-- Fecha seção do template -->
@endsection