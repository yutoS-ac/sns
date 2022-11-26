@extends('layouts.logout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open() !!}
<div class="form">
    <div class="form-size">
        <div class="form-title">
            <p>新規ユーザー登録</p>
        </div>
        <div class="form-mail">
            <div class="form-mail-label">
            <p class="new-ac-name">ユーザー名</p>
                <!--{{ Form::label('ユーザー名') }} !-->
            </div>
            <div class="form-mail-form">
                {{ Form::text('username',null,['class' => 'input']) }}
            </div>
        </div>
        <div class="form-mail">
            <div class="form-mail-label">
            <p class="new-ac-name">メールアドレス</p>
                <!--{{ Form::label('メールアドレス') }}!-->
            </div>
            <div class="form-mail-form">
                {{ Form::text('mail',null,['class' => 'input']) }}
            </div>
        </div>
        <div class ="form-password">
            <div class="form-password-label">
            <p class="new-ac-name">パスワード</p>
                <!--{{ Form::label('パスワード') }}!-->
            </div>
            <div class="form-password-form">
                {{ Form::password('password',['class' => 'input']) }}
            </div>
        </div>
        <div class ="form-password">
            <div class="form-password-label">
                <p class="new-ac-name">パスワード確認</p>
                <!--{{ Form::label('パスワード確認') }}!-->
            </div>
            <div class="form-password-form">
                {{ Form::password('password_confirmation',['class' => 'input']) }}
            </div>
        </div>
        <div class="btn-form">
            {{ Form::submit('登録', ['class' => 'btn btn-danger']) }}
        </div>
        <div class="form-new-letter2">
            <p><a href="/login">ログイン画面へ戻る</a></p>
        </div>  
    {!! Form::close() !!}
    </div>
</div>
@endsection
