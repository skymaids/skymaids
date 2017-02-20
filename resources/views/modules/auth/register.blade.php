<!-- Template -->
@extends('layouts.login')

<!-- Abre seção de título -->
@section('pageTitle')
    Create a new account
@endsection

<!-- Abre seção de descrição -->
@section('pageDescription')
    Please fill out your information below
@endsection

<!-- Abre seção de conteúdo -->
@section('content')

    <!-- Abrir Form -->
    {!! Form::open(array(
            'url'           =>  '/register',
            'method'        =>  'POST',
            'role'          =>  'form',
            'autocomplete'  => 'off',
        ))
    !!}

    <!-- Token Form -->
    {{ Form::token() }}

        <!-- Campo name -->
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} form-material floating">

            <!-- Campo e label -->
            {!! Form::input('text', 'name', old('name'), ['class' => 'form-control empty']) !!}
            {{ Form::label('name', 'Full Name', ['class' => 'floating-label']) }}

            <!-- Erros campo -->
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
            @endif

        </div>

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

        <!-- Botão de registro -->
        {!! Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) !!}

    <!-- Fechar Form -->
    {!! Form::close() !!}

    <!-- Link voltar login -->
    <p>
        {!! link_to('/login', "Back to sign in", [], null) !!}
    </p>

    <!-- Inclui rodapé -->
    @include("layouts._parts.login.footer")

<!-- Fecha seção do template -->
@endsection
