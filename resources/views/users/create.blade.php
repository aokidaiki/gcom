@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                     掲示板作成
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                            <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                            <input type="hidden" name="password" value="{{ Auth::user()->password }}">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">タイトル</label>
                                <input type="text" class="form-control" name="board_name" value="{{ $user->borad_name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">ゲーム選択</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="games_id" value="{{ $user->game_id }}">
                                <option>ポケモン</option>
                                <option>スマブラ</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">コメント</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="board_comment">{{ $user->board_comment }}</textarea>
                            </div>
                            <div class="form-group">
                              <input type="submit" value="掲示板投稿">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection