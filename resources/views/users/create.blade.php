@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                掲示板作成
                </div>
                            <form　action="{{ route('users.update') }}" method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleFormControlInput1">タイトル</label>
                                <input type="text" class="form-control" name="board_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">ゲーム選択</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="games_id">
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
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="board_comment"></textarea>
                            </div>
                            <div class="card-body">
                              <input type="submit" value="掲示板投稿">
                            </div>
                             </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection