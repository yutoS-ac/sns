<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
@extends('layouts.login')

@section('content')
<div class="container">
    <div class="follow-list">
        <div class="follow-title">
            <p>Follow List</p>
        </div>
        <div class="follow-img">
        @foreach($user as $user)
            <a href="/userprofile/{{$user->id}}"><img class="profile-edit-image" src="{{ asset('storage/images/'.$user->images) }}"></a>            
        @endforeach
        </div>
    </div>
    <div class="tweet">
    @foreach($post as $post)
        <div class="timeline">
            <div class="post">
                <div class="userimage">
                    <a href="/userprofile/{{$post->id}}"><img class="profile-edit-image" src="{{ asset('storage/images/' .$user->images) }}"></a>
                </div>
            <div class="user-post">
                <p>{{$post->username}}</p>
                <p>{{$post->post}}</p>
            </div>
            <div class="postcreate">
                {{$post->created_at}}
            </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
