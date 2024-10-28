@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2 class="contact-form__heading--h2">Contact</h2>
      </div>
      <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__last-name">
              <div class="form__name">
                <input class="form__name--input" type="text" name="last_name" autocomplete="family-name" placeholder="例: 山田" value="{{ old('last_name', $contact['last_name'] ?? '') }}" />
              </div>
              <div class="form__error">
                @error('last_name')  
                {{ $message }}
                @enderror
              </div>
            </div>
            <div class="form__first-name">
              <div class="form__name">
                <input class="form__name--input" type="text" name="first_name" autocomplete="given-name" placeholder="例: 太郎" value="{{ old('first_name', $contact['first_name'] ?? '') }}" />
              </div>
              <div class="form__error">
                @error('first_name')  
                {{ $message }}
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content" id="gender__content">
            <div class="form__gender3">
              <div class="form__gender">
                <input class="form__gender--input" type="radio" name="gender" value="1" @checked(old('gender', $contact['gender'] ?? '') == 1) />男性
              </div>
              <div class="form__error">
                @error('gender')  
                {{ $message }}
                @enderror
             </div>
            </div>
            <div class="form__gender3">
              <div class="form__gender">
                <input class="form__gender--input" type="radio" name="gender" value="2" @checked(old('gender', $contact['gender'] ?? '') == 2) />女性
              </div>
              <div class="form__error">
                @error('gender')  
                {{ $message }}
                @enderror
             </div>
            </div>
            <div class="form__gender3">
              <div class="form__gender">
                <input class="form__gender--input" type="radio" name="gender" value="3" @checked(old('gender', $contact['gender'] ?? '') == 3) />その他
              </div>
              <div class="form__error">
                @error('gender')  
                {{ $message }}
                @enderror
             </div>
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__mail">
              <input class="form__mail--input" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email', $contact['email'] ?? '') }}" />
            </div>
            <div class="form__error">
              @error('email')  
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__tel-1">
              <div class="form__tel">
                <input class="form__tel--input" type="tel" name="tel-1" placeholder="080" value="{{ old('tel-1', $contact['tel-1'] ?? '') }}" />
              </div>
              <div class="form__error">
                @error('tel')  
                {{ $message }}
                @enderror
              </div>
            </div>
            <span class="form__section">-</span>
            <div class="form__tel-2">
              <div class="form__tel">
                <input class="form__tel--input" type="tel" name="tel-2" placeholder="1234" value="{{ old('tel-2', $contact['tel-2'] ?? '') }}" />
              </div>
              <div class="form__error">
                @error('tel')  
                {{ $message }}
                @enderror
              </div>
            </div>
            <span class="form__section">-</span>
            <div class="form__tel-3">
              <div class="form__tel">
                <input class="form__tel--input" type="tel" name="tel-3" placeholder="5678" value="{{ old('tel-3', $contact['tel-3'] ?? '') }}" />
              </div>
              <div class="form__error">
                @error('tel')  
                {{ $message }}
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__address">
              <input class="form__address--input" type="text" name="address" autocomplete="street-address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', $contact['address'] ?? '') }}" />
            </div>
            <div class="form__error">
              @error('address')  
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__building">
              <input class="form__building--input" type="text" name="building" autocomplete="address-line2" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building', $contact['building'] ?? '') }}" />
            </div>
            <div class="form__error">
              @error('building')  
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせの種類</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__category">
              <select class="form__category--select" name="category_id" value="{{ old('category_id', $contact['category_id'] ?? '') }}">
                <option value="" disabled selected>選択してください</option>
                <option value="option1" @selected(old('category_id', $contact['category_id'] ?? '') == 'option1')>オプション 1</option>
                <option value="option2" @selected(old('category_id', $contact['category_id'] ?? '') == 'option2')>オプション 2</option>
                <option value="option3" @selected(old('category_id', $contact['category_id'] ?? '') == 'option3')>オプション 3</option>
              </select>
            </div>
            <div class="form__error">
              @error('category_id')  
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__input--text" class="form__label--item">お問い合わせ内容</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__detail">
              <textarea class="form__detail--input" name="detail" placeholder="お問い合わせ内容をご記入ください">{{ old('detail', $contact['detail'] ?? '') }}</textarea>
            </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>
      </form>
    </div>
@endsection

