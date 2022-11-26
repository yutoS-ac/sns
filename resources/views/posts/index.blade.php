@extends('layouts.login')
@section('content')
<!--投稿フォームの設置 -->
<div class="formarea">
    <img class="profile-edit-image" src="{{ asset('storage/images/' .auth()->user()->images) }}">
  <form action="/create" method="post">
    @csrf
    <textarea class="textarea" name="post" rows="4" cols="40"placeholder="投稿内容を入力してください。"></textarea>
    <button class="post-btn-background" type="submit"><img class="post-btn" src="images/post.png" alt="送信" /></button>

  </form>
</div>

<!-- 投稿一覧-->
<div class="tweet">
  @foreach ($post as $post)
  <div class="timeline">
    <div class="post">
        <img class="postimage" src="{{ asset('storage/images/'.$post->user->images) }}">
      <div class="user-post">
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->post }}</p>
      </div>
      <div class="postcreate">
        {{ $post->created_at }}
      </div>
    </div>
    @if(Auth::id() == $post->user_id)
      <div class="user-btn">         
        <div class="postupdate">
          <button class="edit-btn-background" data-toggle="modal" data-target="#MODAL1" data-post="{{ $post->post }}" data-id="{{ $post->id }}"><img class="edit-btn" src="images/edit.png" alt="更新"/></button>
        </div>
        <div class="postdelete">
            <a href="/post/{{$post->id}}/delete" onclick="return confirm('このレコードを削除します。よろしいでしょうか？')">
              <img class="trash-btn" src="images/trash.png" alt="削除"/>
            </a>     
        </div>  
      </div>
    @endif
    </div>
  @endforeach
</div>
    
  <!-- ここからモーダル -->
  
<div class="modal fade" id="MODAL1" tabindex="-1" role="dialog" aria-labelledby="MODAL1Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form action="/post/{{$post->id}}/update" method="post">
          @csrf
          <input type="text" class="form-control" id="postdata" name="postdata">    
          <input type="hidden" class="form-control" id="postid" name="postid"> 
          <div class="modal-footer">
            <input type="image" value="更新する"class="edit-btn" src="images/edit.png" alt="更新"/>
          </div>
        </form>
      </div><!-- /.modal-body -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal fade-->


@endsection