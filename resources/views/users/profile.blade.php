@extends('layouts.login')

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

<div class="profile-edit"> 
    <form action="/profile/{{$Auth->id}}/update" method="post" enctype="multipart/form-data">
            <img class="profile-edit-image" src="{{ asset('storage/images/' .auth()->user()->images) }}">            
            <div class="form-edit">
                @csrf
                <div class="profile-edit-username">
                    <p>user name</p>
                    <input type="text" name="name" value="{{$Auth->username}}">
                </div>
                <div class="profile-edit-mail">
                    <p>mail adress</p>
                    <input type="text" name="mail" value="{{$Auth->mail}}">
                </div>
                <div class="profile-edit-password">
                    <p>password</p>
                    <input type="password" name="password">
                </div>
                <div class="profile-edit-passwordcheck">
                    <p>password comfirm</p>
                <input type="password" name="password_confirmation">
                </div>
                <div class="profile-edit-bio">
                <p>bio</p>
                    <input type="text" name="bio" value="{{$Auth->bio}}">
                </div>
                <div class="profile-edit-imageedit">
                <p>icon image</p>
                    <input type="file" name="img">
                </div>
                <!-- localhost:8889データベース: atlassnsテーブル: users -->
                <div class="p-edit-btn">
                    <button type="submit" class="btn btn-danger">更新</button>
                </div>
            </div>
    </form>
</div>

@endsection


