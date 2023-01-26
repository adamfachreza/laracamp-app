@extends('layouts.app')

@section('content')
    <section class="login-user">
        <div class="left">
            <img src="{{ asset('laracamp/assets/images/ill_login_new.png')}}" alt="">
        </div>
        <div class="right">
            <img src="{{ asset('laracamp/assets/images/logo.png')}}" class="logo" alt="">
            <h1 class="header-third">
                Start Today
            </h1>
            <p class="subheader">
                Because tomorrow become never
            </p>
            <p>
                <a class="btn btn-border btn-google-login" href="{{route('signin-google')}}">
                    <img src="{{ asset('laracamp/assets/images/ic_google.svg')}}" class="icon" alt=""> Sign In with Google
                </a>
                <a class="btn btn-border btn-google-login" href="{{route('signin-github')}}">
                    <img src="{{ asset('laracamp/assets/images/ic_github.svg')}}" class="icon" alt=""> Sign In with github
                </a>
            </p>
            <img src="{{ asset('laracamp/assets/images/people.png')}}" class="people" alt="">
        </div>
    </section>
@endsection


