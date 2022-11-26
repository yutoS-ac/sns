    @extends('layouts.login')

    @section('content')
    <form action="{{ url('/search')}}">
        <div class="form-group">
            <div class="search-area">
                <input type="text" value="{{request('search')}}" class="search-text" placeholder="ユーザー名" name="search">
            </div>
            <div class="search">
                <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
            </div>
            @isset($keyword)
            <p class="search-word">検索ワード: {{request('search')}}</p>
            @endisset
        </div>
    </form>
@foreach($user as $user)
@if(!(Auth::id() == $user->id))
<div class="search-result">
    <div class="search-image">
        <img class="userimage" src="{{ asset('storage/images/'.$user->images) }}">
    </div>
    <div class="search-name">
        {{ $user->username }}
    </div>
    <div class="search-follow">
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
@endif
@endforeach
@endsection

<script src="https://kit.fontawesome.com/3bac61338e.js" crossorigin="anonymous"></script>