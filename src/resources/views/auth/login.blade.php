@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('change')
  <div class="header__button">
    <a class="header__button--change" href="/register">register</a>
  </div>
@endsection

@section('content')
    <div class="login">
      <div class="login__heading">
        <h2 class="login__heading--h2">Login</h2>
      </div>
      <form class="form" action="{{ route('login') }}" method="post">
        @csrf
        <div class="loggingin-box">
          <div class="loggingin-box__row">
            <p class="input-title">メールアドレス</p>
            <input class="input-input" name="email" placeholder="例: test@example.com" type="text">
          </div>
          <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
          </div>
          <div class="loggingin-box__row"> 
            <p class="input-title">パスワード</p>
            <input class="input-input" name="password" placeholder="例: coachtech1106" type="password">         
          </div>
          <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
          </div>
          <div class="loggingin-box__row"> 
            <button class="login-button">ログイン</button>        
          </div>
        </div>
      </form>
    </div>
@endsection

