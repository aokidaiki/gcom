
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body text-left">
                        <h1 class="card-title">{{ $name }}
                        <a href="{{ $twitter_url }}" class="btn btn-outline-primary float-right">twitter</a></h1>
                        <h4 class="card-text">{{ $comment }}</h4>

                        <a href=" {{ route('users.following', $user) }}">
                        <button type="button" class="btn btn-outline-primary">
                        フォロー <span class="badge badge-light">{{ $follow_users_number }}</span>
                        </button></a>
                        <a href=" {{ route('users.following', $user) }}">
                        <button type="button" class="btn btn-outline-primary">
                        フォロワー <span class="badge badge-light">{{ $be_followed_users_number }}</span>
                        </button></a>
                        @if( $id !== Auth::user()->id)
                        @if(!empty($followingeachother))
                            <a href="{{ route('users.unfollow',$user) }}" class="btn btn-outline-primary">フォロー解除</a>
                        @else
                            <a href="{{ route('users.follow',$user) }}" class="btn btn-outline-primary">フォローする</a>
                        @endif
                        @endif

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- <ul class="list-group list-group-flush"> -->
            <!-- <li class="list-group-item">ゲームプレイ一覧{{ $games }}</li> -->
            <!-- <li class="list-group-item">ゲームID：{{ $games_id }}</li> -->
<div class="container text-center">
    <div class="card mb-4">
        <div class="card-header">
　　　 　　　 　<h3>新着掲示板</h3>
　　　 　</div>
            <div class="card-body">
                <h3>{{ $user->board_name }}</h3>
                <h5>ゲームタイトル：{{ $gamelist }}</h5>
                <h5>{{ $user->board_comment }}</h5>
                @if( $id == Auth::user()->id)
                    <div class="text">
                    <a href="{{ route('users.edit' ,$id) }}" class="btn btn-light border-secondary">編集・掲示板作成</a>
                    </div>
                @endif
            </div>
    </div>
</div>

<div class="container">
    <!-- <div class="col-md-8"> -->
        <div class="card">
                <div class="card-header">
                    <h3 class="text-center">コメント一覧</h3>
                </div>
                    <div>
                    　  @foreach($comments as $comment)
                        <div class="card">
                            <div class='card-body'>
                                <p class="card-text">{{ $comment->comment }}</p>
                                <p class="card-text">
                                    投稿者：{{ $comment->post_user->name }}
                                    </p>
                                    @if( $comment->post_user->id == Auth::user()->id)
                                    <form method="post" action="/comments/{{$comment->id}}">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <input type="submit" value="削除" class="btn btn-outline-danger btn-sm" onclick='return confirm("削除しますか？");'>
                                    </form>
                                    @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
</div>

<div class="text-center">
        <a href="{{ route('comments.create' ,['user' => $user]) }}" class="btn btn-light border-secondary">コメントする</a>
        <a href="{{ route('games.index' ,$id) }}" class="btn btn-light border-secondary">戻る</a>
</div>

@endsection