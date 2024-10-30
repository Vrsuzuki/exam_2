@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
    <div class="admin">
      <div class="admin__heading">
        <h2 class="admin__heading--h2">Admin</h2>
      </div>
      <form class="search" action="/admin/search" method="post">
        @csrf
        <div class="search__word">
          <input class="search__word--input" type="text" name="name-or-email" placeholder="名前やメールアドレスを入力してください" />
        </div>
        <div class="search__gender">
          <select class="search__gender--select" name="gender">
            <option value="" disabled selected>性別</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
            <option value="3">その他</option>
          </select>
        </div>
        <div class="search__category">
          <select class="search__category--select" name="category_id" value="{{ old('category_id', $contact['category_id'] ?? '') }}">
            <option value="" disabled selected>お問い合わせの種類</option>
            <option value="1">オプション 1</option>
            <option value="2">オプション 2</option>
            <option value="3">オプション 3</option>
          </select>
        </div>
        <div class="search__date">
          <select class="search__date--select">
            <option value="" disabled selected>年/月/日</option>
            <option value="1">オプション 1</option>
            <option value="2">オプション 2</option>
            <option value="3">オプション 3</option>
          </select>
        </div>
        <div class="search__submit">
          <button class="search__submit--button" type="submit">検索</button>
        </div>
        <div class="search__reset">
          <button class="search__reset--button" type="submit" formaction="/admin/reset">リセット</button>
        </div>
      </form>
      <div class="contact">
        <div class="contact__custom-button">
          <div class="contact__custom-button--export">
            <button class="contact__custom-button--export-button">エクスポート</button>
          </div>
          <div class="content__custom-button--pages">
            {{-- $contacts->links() --}}
          </div>
        </div>
        <div class="contact__list">
          <table class="contact__list-table">
            <tr class="table__title-row">
              <th class="table__title-row--name">お名前</th>
              <th class="table__title-row--gender">性別</th>
              <th class="table__title-row--email">メールアドレス</th>
              <th class="table__title-row--category">お問い合わせの種類</th>
            </tr>
            {{-- @foreach($received_contacts as $received_contact) --}}
            <tr class="table__row">
              <td class="table__row--name">山田 太郎</td>
              <td class="table__row--gender">男性</td>
              <td class="table__row--email">test@example<.com</td>
              <td class="table__row--category">商品の交換について</td>
            </tr>
            {{-- @endforeach --}}
          </table>
        </div>
      </div>
    </div>
@endsection

