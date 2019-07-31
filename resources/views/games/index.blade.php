@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center mb-4">
                @if(Auth::check())
                <div class="card-body">
                    <h1 class="font-weight-bold">G-COM</h1>
                    <h4>ジーコム</h4>
                    <h4>ゲーム友達を探してフォローしましょう！<h4>
                </div>
                @else
                <div class="card-body">
                    <h1 class="font-weight-bold">G-COM</h1>
                    <h4>ジーコム</h4>
                    <h3>ゲーム友達を増やそう！
                        <h4>掲示板を作って
                        <br>友達とゲームしましょう！<h4>
                        <a href="{{ route('register') }}">
                        <button type="button" class="btn btn-outline-dark">新規登録</button></a>
                </div>
                @endif

                 <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> -->
            </div>
            
            @foreach($games_titles as $games_title)
            <div class="card">
                    <div class="card-body">
                　　　　　　　　<h4 class="card-title">{{ $games_titles->games_title }}</h4>　
                     
            @endforeach
            
                    </div>
            </div>
                


            @if(Auth::check())
            <div class="card">
                <div class="card-header text-center">
                    一覧ユーザー
                </div>
                @foreach($users as $user)
                <div class="card-body border">
        　　　　　　　　<h4 class="card-title">{{ $user->name }}</h4><h5>{{ $user->comment }}<h5>
        　　　　　　　　<a href="{{ route('users.show', $user) }}" class="btn btn-outline-dark  float-right">詳細</a>
    　　　　　    </div>
                @endforeach
                @else
                @endif
                <!-- <div class="card">
                    <div class="card-header text-center">
                        ユーザーネーム
                    </div>
                    @foreach($allusers as $alluser)
                    <div class="card-body border">
            　　　　　　　　<h5 class="card-title">{{ $alluser->name }}<h6>{{ $alluser->comment }}<h6></h5>
        　　　　　    </div>
                    @endforeach
                    
                </div> -->
            <div>
        </div>
    </div>
</div>
{{ $users->links() }}
@endsection