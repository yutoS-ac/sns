@extends('layouts.logout')


@section('content')
{!! Form::open() !!}


<div class="form">
    <div class="form-size">
        <div class="form-title">
            <p>AtlasSNSへようこそ</p>
        </div>
        <div class="form-mail">
            <div class="form-mail-label">
            {{ Form::label('mail adress') }}
            </div>
            <div class="form-mail-form">
            {{ Form::text('mail',null,['class' => 'input']) }}
            </div>
        </div>

        <div class ="form-password">
            <div class="form-password-label">
                {{ Form::label('password') }}
                </div>
            <div class="form-password-form">
                {{ Form::password('password',['class' => 'input']) }}
            </div>
        </div>
        <div class="btn-form">
        {{ Form::submit('ログイン',['class'=>'btn btn-danger']) }}
        </div>
        <div class="form-new-letter2">
            <p class="form-new-letter"><a href="/register">新規ユーザーの方はこちら</a></p>
        </div>    
        {!! Form::close() !!}
    </div>
</div>


    
@endsection
