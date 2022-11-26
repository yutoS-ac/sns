@extends('layouts.logout')

@section('content')

<div class="form">
    <div class="form-size">
      <div class="new-account">
      <p>{{$username}}さん</p>
@csrf
      <p>ようこそ！AtlasSNSへ！</p>
    </div>
    <div class="new-account-word">
      <p>ユーザー登録が完了しました。</p>
      <p>早速ログインをしてみましょう。</p>
    <div>
      <div>

      </div>
      <div class="form-new-letter2">
        <button type="button" class="btn btn-danger"><a href="/login">ログイン画面へ</a></button>
      </div>
    </div>
</div>

@endsection