
<!-- Template -->
@extends('layouts.login')

<!-- Abre seção de título -->
@section('pageTitle')
    Forgot your password?
@endsection

<!-- Abre seção de descrição -->
@section('pageDescription')
    Type your username and email then a link for reset your password will be send
@endsection

<!-- Abre seção de conteúdo -->
@section('content')

    <!-- Mostra alerta para erros -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Abrir Form -->
    {!! Form::open(array(
            'url'           =>  '/password/email',
            'method'        =>  'POST',
            'role'          =>  'form',
            'autocomplete'  => 'off',
        ))
    !!}

    <!-- Token Form -->
    {{ Form::token() }}

        <!-- Campo username -->
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} form-material floating">

            <!-- Campo e label -->
            {!! Form::input('text', 'username', old('username'), ['class' => 'form-control empty']) !!}
            {{ Form::label('username', 'Username', ['class' => 'floating-label']) }}

            <!-- Erros campo -->
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif

        </div>

        <!-- Campo email -->
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-material floating">

            <!-- Campo e label -->
            {!! Form::input('email', 'email', old('email'), ['class' => 'form-control empty']) !!}
            {{ Form::label('email', 'Email', ['class' => 'floating-label']) }}

            <!-- Erros campo -->
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>

        <!-- Botão de envio -->
        {!! Form::button('Send', ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) !!}

    <!-- Fechar Form -->
    {!! Form::close() !!}

    <!-- Link voltar login -->
    <p>
        {!! link_to('/login', "Back to Sign in", [], null) !!}
    </p>


    <!-- Inclui rodapé -->
    @include("layouts._parts.login.footer")

<!-- Fecha seção do template -->
@endsection
