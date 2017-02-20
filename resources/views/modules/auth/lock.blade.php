@extends('layouts.lock')

@section('content')

<div class="avatar avatar-lg">
    <img src="{{ asset(Portrait::get(['userId' => $userId,'userGender' => $userGender])) }}" alt="...">
</div>

<p class="locked-user">{{ $username }}</p>

<!-- Abrir Form -->
{!! Form::open(array(
        'url'           =>  '/lock',
        'method'        =>  'POST',
        'role'          =>  'form',
        'autocomplete'  => 'off',
    ))
!!}

    <!-- Token Form -->
    {{ Form::token() }}

    <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="hidden" name="username" value="{{ $username }}" />
        <input type="password" class="form-control last" id="inputPassword" name="password" placeholder="Type your password" >
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">
                <i class="icon md-lock-open" aria-hidden="true"></i>
                <span class="sr-only">Unlock</span>
            </button>
        </span>
    </div>

    @if ($errors->has('password'))

        <span class="help-block">
            <strong style="color: palevioletred">{{ $errors->first('password') }}</strong>
        </span>

    @endif


<!-- Fechar Form -->
{!! Form::close() !!}

<p>Type your password to back</p>
<p><a href="{{ url('/logout') }}">Sign in with a different account</a></p>

<div class="brand visible-xs text-center">
    <img class="brand-img" src="{{ asset('images/logo.png') }}" alt="...">
</div>
@endsection
