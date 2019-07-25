@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">編集</div>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               
                <form action="{{ route('users.update', $id) }}" method="POST" enctype="multipart/form-data"> 
                    {{ csrf_field() }}
                    @method('PUT')

                    <div class="form-icon_image">
                        <label>画像アイコン</label>
                        <input type="file" class="form-control-file" name="icon_image">
                    </div>
                        <label>名前</label>
                        <input type="text" class="form-control" name="name" value="{{ $name }}">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                
                    <div class="form-group">
                        <label>ゲームID(任天堂ID・プレステーションID)</label>
                        <input type="text" class="form-control" name="games_id" value="{{ $games_id }}">
                    </div>
                    <div class="form-group">
                        <label>ツイッターURL</label>
                        <input type="text" class="form-control" name="twitter_url" value="{{ $twitter_url }}">
                    </div>
                    <div class="form-group">
                        <label>自己紹介文</label>
                        <textarea class="form-control" rows="3" name="comment" >{{ $comment }}</textarea>
                    </div>
                    <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            掲示板作成
                                        </div>
                                        <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">タイトル</label>
                                                        <input type="text" class="form-control" name="board_name" value="{{ $board_name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">ゲーム選択</label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="gamelist" value="{{ $gamelist }}">
                                                        <option>ポケモン</option>
                                                        <option>スマブラ</option>
                                                        <option>フォートナイト</option>
                                                        <option>スプラトゥーン</option>
                                                        <option>エイペックス</option>
                                                        <option>NBA2K</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">コメント</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="board_comment">{{ $board_comment }}</textarea>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="submit" value="変更する">


                    </form>
                

 
            </div>
        </div>
    </div>
</div>
@endsection