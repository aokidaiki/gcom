
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                タイトル
                </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @if ($icon_image)
                            <p>画像：<img src ="/storage/post_images/{{ $user->id }}.jpg"></p>
                            @endif
                            <h5 class="card-title">{{ $name }}</h5>
                            <p class="card-text">{{ $comment }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <!-- <li class="list-group-item">ゲームプレイ一覧{{ $games }}</li> -->
                            <li class="list-group-item">ゲームID：{{ $games_id }}</li>
                            <div class="card-header">
                　　　 　　　 　新着掲示板
                　　　 　　　 </div>
                            <h5 class="card-title">タイトル：{{ $user->board_name }}</h5>
                            <p class="card-text">ゲーム名：{{ $gamelist }}</p>
                            <p class="card-text">コメント：{{ $user->board_comment }}</p>
                        </ul>
                        <div class="p-3">
                        <h3 class="card-title">コメント一覧</h3>
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
                           
                        <div class="card-body">
                            <a href="{{ route('comments.create' ,['user' => $user]) }}" class="btn btn-primary">コメントする</a>
                        </div>
                        <div class="card-body">
                            <a href="{{ $twitter_url }}" class="card-link">ツイッターURL</a>
                        </div>
                            @if( $id == Auth::user()->id)
                             <div class="card-body">  
                                <a href="{{ route('users.edit' ,$id) }}" class="btn btn-primary">編集・掲示板作成</a>
                             </div>
                            @endif

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection