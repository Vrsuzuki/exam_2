@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
    <div class="admin">
      <div class="admin__heading">
        <h2 class="admin__heading--h2">Admin</h2>
      </div>
      <form class="search" action="/admin/search" method="get">
        @csrf
        <div class="search__word">
          <input class="search__word--input" type="text" name="name_or_email" placeholder="名前やメールアドレスを入力してください" />
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
            @foreach ($received_categories as $received_category)
            <option value="{{ $received_category['id'] }}">{{ $received_category['content'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="search__date">
            <input class="search__date--calendar" type="date" name="created_at">
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
            {{ $received_contacts->links('vendor.pagination.bootstrap-4') }}
          </div>
        </div>
        <div class="contact__list">
          <table class="contact__list-table">
            <tr class="table__title-row">
              <th class="table__title-row--name">お名前</th>
              <th class="table__title-row--gender">性別</th>
              <th class="table__title-row--email">メールアドレス</th>
              <th class="table__title-row--category">お問い合わせの種類</th>
              <th class="table__title-row--button"></th>
            </tr>
            @foreach($received_contacts as $received_contact)
            <tr class="table__row">
              <td class="table__row--name">{{$received_contact->last_name}} {{$received_contact->first_name}}</td>
              <td class="table__row--gender">{{ $received_contact['gender'] == 1 ? '男性' : ($received_contact['gender'] == 2 ? '女性' : ($received_contact['gender'] == 3 ? 'その他' : '不明')) }}</td>
              <td class="table__row--email">{{$received_contact->email}}</td>
              <td class="table__row--category">{{ $received_contact->category_id == 1 ? '商品のお届けについて' : ($received_contact->category_id == 2 ? '商品の交換について' : ($received_contact->category_id == 3 ? '商品トラブル' : ($received_contact->category_id == 4 ? 'ショップへのお問い合わせ' : ($received_contact->category_id == 5 ? 'その他' : '不明')))) }}</td>
              <th class="table__row--button"><button class="detail-button">詳細</button></th>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
    <div class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>お問い合わせ詳細</h2>
        <p><strong>名前:</strong> <span id="contactName"></span></p>
        <p><strong>性別:</strong> <span id="contactGender"></span></p>
        <p><strong>メールアドレス:</strong> <span id="contactEmail"></span></p>
        <p><strong>電話番号:</strong> <span id="contactPhone"></span></p>
        <p><strong>住所:</strong> <span id="contactAddress"></span></p>
        <p><strong>建物名:</strong> <span id="contactBuilding"></span></p>
        <p><strong>お問い合わせの種類:</strong> <span id="contactCategory"></span></p>
        <p><strong>お問い合わせ内容:</strong> <span id="contactContent"></span></p>
      </div>
    </div>
@endsection

