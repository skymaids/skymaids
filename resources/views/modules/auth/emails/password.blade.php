@extends('layouts.mail')

@section('content')

<h4 style="color: #424242; font-family: Roboto,sans-serif; font-weight: 400; font-size: 19px; margin:10px 0 0 0">
    Reset your password {{ $user->username }}
</h4>

<p>If you forgot your password and would like to create a new please click bellow:</p>

<a style="border-radius: 3px; box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.1);
font-size: 14px; line-height: 1.57143; padding: 10px 15px;
 background-color: #3f51b5; border-color: #3f51b5; color: #fff; text-decoration:none;"
 href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}&username={{ $user->username }}">
    Link to access
</a>
@endsection