
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">タイトル</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="card" style="width: 18rem;">
                     <img class="card-img-top" src="..." alt="Card image cap">
                     <div class="card-body">
                    @if( $id == Auth::user()->id)
                            <a href="{{ route('users.edit' ,$id) }}">編集</a>
                    @endif
                     <h5 class="card-title">{{ $name }}</h5>
                     <p class="card-text">コメント{{ $comment }}</p>
                     </div>
                     <ul class="list-group list-group-flush">
                     <li class="list-group-item">ゲームプレイ一覧{{ $gamelist }}</li>
                     <li class="list-group-item">ゲームID{{ $game_id }}</li>
                     <li class="list-group-item">新着投稿掲示板</li>
                     </ul>
                     <div class="card-body">
                     <a href="" class="btn btn-primary">コメントする</a>
                     <a href="#" class="card-link">ツイッターURL</a>
                     </div>
                     </div>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection