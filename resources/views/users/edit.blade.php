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
                    <form>
  <div class="form-group">
  <form action="{{ route('users.update', $id) }}" method="POST"> 
  {{ csrf_field() }}
  @method('PUT')

  <!-- <div class="form-group">
    <label>画像アイコン</label>
    <input type="file" class="form-control-file" name="icom image">
  </div> -->
    <label>名前</label>
    <input type="text" class="form-control" name="name">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label>ゲームID(任天堂ID・プレステーションID)</label>
    <input type="text" class="form-control" name="game_id">
  </div>
  <div class="form-group">
    <label>ツイッターURL</label>
    <input type="text" class="form-control" name="twitter_url">
  </div>
  <div class="form-group">
    <label>自己紹介文</label>
    <textarea class="form-control" rows="3" name="comment"></textarea>
  </div>
  <div class="form-check">
  </div>
  <label>ゲームタイトル選択(複数)</label>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="game_title" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
    フォートナイト
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="game_title" value="option2">
  <label class="form-check-label" for="exampleRadios2">
    スマブラ
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="game_title" value="option3">
  <label class="form-check-label" for="exampleRadios3">
    ポケモン
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="game_title" value="option4">
  <label class="form-check-label" for="exampleRadios4">
    スプラトゥーン
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="game_title" value="option5">
  <label class="form-check-label" for="exampleRadios5">
    エイペックスレジェンド
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="game_title" value="option6">
  <label class="form-check-label" for="exampleRadios6">
    NBA２K
  </label>
</div>

  <input type="hidden" name="user_id" value="{{ Auth::id() }}">
  <input type="submit" value="変更する">

</form>

 
            </div>
        </div>
    </div>
</div>
@endsection