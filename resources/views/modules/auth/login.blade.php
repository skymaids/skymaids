<!-- Template -->
@extends('layouts.login')

<!-- Abre seção de título -->
@section('pageTitle')
    Sign in
@endsection

<!-- Abre seção de descrição -->
@section('pageDescription')
    Please type your username and password
@endsection

<!-- Abre seção de conteúdo -->
@section('content')

    <!-- Abrir Form -->
    {!! Form::open(array(
            'url'           =>  '/login',
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

        <!-- Campo password -->
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-material floating">

            <!-- Campo e label -->
            {!! Form::password('password', ['class' => 'form-control empty']) !!}
            {{ Form::label('password', 'Password', ['class' => 'floating-label']) }}

            <!-- Erros campo -->
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>

        <!-- Link Esqueceu password -->
        <div class="form-group clearfix">
            {!! link_to('/password/forgot', "Forgot your password?", ['class' => 'pull-right'], null) !!}
        </div>

        <!-- Botão de envio -->
        {!! Form::button('Sign in', ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) !!}

    <!-- Fechar Form -->
    {!! Form::close() !!}

    <!-- Link Cadastro usuáio -->
    <p>
        {!! link_to('/register', "Create a new account", [], null) !!}
    </p>

    <!-- Inclui rodapé -->
    @include("layouts._parts.login.footer")

<!-- Fecha seção do template -->
@endsection
