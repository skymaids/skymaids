<!-- Template -->
@extends('layouts.login')

<!-- Abre seção de título -->
@section('pageTitle')
    Reset your password
@endsection

<!-- Abre seção de descrição -->
@section('pageDescription')
    Type your new password
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
            'url'           =>  '/password/reset',
            'method'        =>  'POST',
            'role'          =>  'form',
            'autocomplete'  => 'off',
        ))
    !!}

    <!-- Token Form -->
    {{ Form::token() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Campo username -->
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} form-material floating">

            <!-- Campo e label -->
            {!! Form::input('text', 'username', $username, ['class' => 'form-control', 'readonly' => 'true']) !!}
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
        {!! Form::input('email', 'email', $email, ['class' => 'form-control', 'readonly' => 'true']) !!}
        {{ Form::label('email', 'Email', ['class' => 'floating-label']) }}

            <!-- Erros campo -->
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>

        <!-- Campo password -->
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-material floating">

            <!-- Campo e label -->
            {!! Form::password('password', ['class' => 'form-control']) !!}
            {{ Form::label('password', 'Password', ['class' => 'floating-label']) }}

            <!-- Erros campo -->
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>

        <!-- Campo password confirmação -->
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} form-material floating">

            <!-- Campo e label -->
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            {{ Form::label('password_confirmation', 'Password Confirm', ['class' => 'floating-label']) }}

            <!-- Erros campo -->
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif

        </div>

        <!-- Botão de envio -->
        {!! Form::button('Reset Password', ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) !!}

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

