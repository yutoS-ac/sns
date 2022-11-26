@extends('layouts.login')

@section('content')
<div class="userprofile">
    <div class="up-image">
        <img class="userimage" src="{{ asset('storage/images/'.$user->images) }}">
    </div>
    <div class="up-name_bio">
        <p>name</p>
        <p>bio</p>
    </div>
    <div class="up-real-name_bio">
        <p>{{$user->username}}</p>
        <p>{{$user->bio}}</p>
    </div>
    <div class="up-follow">
        @if (auth()->user()->isFollowing($user->id))
        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
        {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
        @endif
    </div>
</div>

<div class="tweet">
    @foreach($post as $post)
    <div class="timeline">
        <div class="post">
            <img class="postimage" src="{{ asset('storage/images/'.$user->images) }}">
            <div class="user-post">
                <p>{{$user->username}}</p>
                <p>{{$post->post}}</p>
            </div>
            <div class="postcreate">
                {{$post->created_at}}
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection