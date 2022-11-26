<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\User;
use App\Post;
use Auth;




class FollowsController extends Controller {

    public function followList() {
        $user = user::query()->whereIn('id', Auth::user()->follows()
        ->pluck('followed_id'))->latest()->get();
        $post = \DB::table('posts')
        ->whereIn('users.id', Auth::user()->follows()
        ->pluck('followed_id'))
        ->join('users', 'posts.user_id', '=', 'users.id') 
        ->get(); 
        return view('follows.followList',[
            'user'=>$user,
            'post'=>$post
            ]);
    }
    public function followerlist(){
        $user = user::query()->whereIn('id', Auth::user()->followers()
        ->pluck('following_id'))->latest()->get();
        $post = \DB::table('posts')
        ->whereIn('users.id', Auth::user()->followers()
        ->pluck('following_id'))
        ->join('users', 'posts.user_id', '=', 'users.id') 
        ->get(); 
        return view('follows.followerList',
        ['user'=>$user,
        'post'=>$post
    ]);
    }
}