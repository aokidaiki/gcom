
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
                    <div class="card-body text-center">
                        <h1 class="card-title">{{ $name }}
                        <a href="{{ $twitter_url }}" class="btn btn-outline-primary float-right">twitter</a></h1>
                        <button type="button" class="btn btn-primary">
                        フォロー <span class="badge badge-light">{{ $follow_users_number }}</span>
                        <span class="sr-only">unread messages</span>
                        </button>
                        <button type="button" class="btn btn-info">
                        フォロワー <span class="badge badge-light">{{ $be_followed_users_number }}</span>
                        <span class="sr-only">unread messages</span>
                        </button>
                        @if( $id !== Auth::user()->id)
                        @if(!empty($followingeachother))
                            <a href="{{ route('users.unfollow',$user) }}" class="btn btn-outline-info">フォロー解除</a>
                        @else
                            <a href="{{ route('users.follow',$user) }}" class="btn btn-outline-info">フォローする</a>
                        @endif
                        @endif
                        <h4 class="card-text">{{ $comment }}</h4>

                        @if( $id == Auth::user()->id)
                                <div class="text-center">
                                <a href="{{ route('users.edit' ,$id) }}" class="btn btn-primary">編集・掲示板作成</a>
                                </div>
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
　　　 　　　 　<h2>新着掲示板</h2>
　　　 　</div>
            <div class="card-body">
                <h3>{{ $user->board_name }}</h3>
                <h5>ゲームタイトル：{{ $gamelist }}</h5>
                <h5>{{ $user->board_comment }}</h5>
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
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
</div>

<div class="text-center">
        <a href="{{ route('comments.create' ,['user' => $user]) }}" class="btn btn-primary">コメントする</a>
        <a href="{{ route('games.index' ,$id) }}" class="btn btn-primary">戻る</a>
</div>

@endsection