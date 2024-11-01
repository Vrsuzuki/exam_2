@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('change')
  <div class="header__button">
    <a class="header__button--change" href="/login">login</a>
  </div>
@endsection

@section('content')
    <div class="register">
      <div class="register__heading">
        <h2 class="register__heading--h2">Register</h2>
      </div>
      <form class="form" action="{{ route('register') }}" method="post">
      @csrf
        <div class="registering-box">
          <div class="registering-box__row">
            <p class="input-title">お名前</p>
            <input class="input-input" name="name" placeholder="例: 山田 太郎" type="text">
          </div>
          <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
          </div>
          <div class="registering-box__row">
            <p class="input-title">メールアドレス</p>
            <input class="input-input" name="email" placeholder="例: test@example.com" type="text">
          </div>
          <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
          </div>
          <div class="registering-box__row"> 
            <p class="input-title">パスワード</p>
            <input class="input-input" name="password" placeholder="例: coachtech1106" type="password">         
          </div>
          <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
          </div>
          <div class="registering-box__row"> 
            <p class="input-title">パスワード確認</p>
            <input class="input-input" name="password_confirmation" placeholder="例: coachtech1106" type="text">         
          </div>
          <div class="registering-box__row"> 
            <button class="register-button">登録</button>        
          </div>
        </div>
      </form>
    </div>
@endsection

