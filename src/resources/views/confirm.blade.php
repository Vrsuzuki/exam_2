@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2 class="contact-form__heading--h2">Confirm</h2>
      </div>
      <form class="form" action="/thanks" method="post">
        @csrf
        <table class="confirm">
            <tr class="confirm__row">
                <th class="confirm__header">
                    <span class="confirm__header--span">お名前</span>
                </th>
                <td class="confirm__descript">
                    <span class="confirm__descript--span">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</span>
                    <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}"/>
                    <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}"/>
                </td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__header">
                    <span class="confirm__header--span">性別</span>
                </th>
                <td class="confirm__descript">
                    <span class="confirm__descript--span">{{ $contact['gender'] == 1 ? '男性' : ($contact['gender'] == 2 ? '女性' : ($contact['gender'] == 3 ? 'その他' : '不明')) }}</span>
                    <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                </td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__header">
                    <span class="confirm__header--span">メールアドレス</span>
                </th>
                <td class="confirm__descript">
                    <span class="confirm__descript--span">{{ $contact['email'] }}</span>
                    <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                </td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__header">
                    <span class="confirm__header--span">電話番号</span>
                </th>
                <td class="confirm__descript">
                    <span class="confirm__descript--span">{{ $contact['tel-1'] }}{{ $contact['tel-2'] }}{{ $contact['tel-3'] }}</span>
                    <input type="hidden" name="tel" value="{{ $contact['tel-1'] . $contact['tel-2'] . $contact['tel-3'] }}" />
                    <input type="hidden" name="tel-1" value="{{ $contact['tel-1'] }}" />
                    <input type="hidden" name="tel-2" value="{{ $contact['tel-2'] }}" />
                    <input type="hidden" name="tel-3" value="{{ $contact['tel-3'] }}" />
                </td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__header">
                    <span class="confirm__header--span">住所</span>
                </th>
                <td class="confirm__descript">
                    <span class="confirm__descript--span">{{ $contact['address'] }}</span>
                    <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                </td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__header">
                    <span class="confirm__header--span">建物名</span>
                </th>
                <td class="confirm__descript">
                    <span class="confirm__descript--span">{{ $contact['building'] }}</span>
                    <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                </td>
            </tr>
            <tr class="confirm__row">
                <th class="confirm__header">
                    <span class="confirm__header--span">お問い合わせの種類</span>
                </th>
                <td class="confirm__descript">
                    <span class="confirm__descript--span">{{ $contact['category_id'] == 1 ? '商品のお届けについて' : ($contact['category_id'] == 2 ? '商品の交換について' : ($contact['category_id'] == 3 ? '商品トラブル' : ($contact['category_id'] == 4 ? 'ショップへのお問い合わせ' : ($contact['category_id'] == 5 ? 'その他' : '不明')))) }}</span>
                    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
                </td>
            </tr>
            <tr class="confirm__row" id="confirm__row--bottom">
                <th class="confirm__header">
                    <span class="confirm__header--span">お問い合わせ内容</span>
                </th>
                <td class="confirm__descript">
                    <textarea class="confirm__descript--span" id="confirm__descript--textarea" name="detail" readonly>{{ $contact['detail'] }}</textarea>
                </td>
            </tr>
        </table>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
          <button class="form__button-back" type="submit" formaction="/edit">修正</button>
        </div>
      </form>
    </div>
@endsection

