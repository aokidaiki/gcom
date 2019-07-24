
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
                        <!-- <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body"> -->
                            <h5 class="card-title">{{ $name }}</h5>
                            <p class="card-text">{{ $comment }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <!-- <li class="list-group-item">ゲームプレイ一覧{{ $games }}</li> -->
                            <li class="list-group-item">ゲームID：{{ $games_id }}</li>
                            <li class="list-group-item">新着投稿掲示板</li>
                            <h5 class="card-title">タイトル：{{ $board_name }}</h5>
                            <p class="card-text">ゲーム名：{{ $gamelist }}</p>
                            <p class="card-text">コメント：{{ $board_comment }}</p>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('comment.create' ,$user) }}" class="btn btn-primary">コメントする</a>
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