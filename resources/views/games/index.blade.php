@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ゲームタイトル</div>

                 <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      @foreach($games_title as $games_title)
                      <div class="card">
  　　　　　　　　　　　　 <div class="card-header">
  　　　　　　　　　　　　 <div class="card-body">
    　　　　　　　　　　　  <h5 class="card-title">{{ $games_title->games_title }}</h5>　　　　　　　　　　　  
   <!-- 　　　　　　　　　　　   <a href="#" class="btn btn-primary">Go somewhere</a> -->
  　　　　　　　　　　　  </div>
                    </div>
                    </div>
                

                    @endforeach
                    
                    <div class="card-body">
                    <div class="card">
                    <div class="card-header">ユーザーネーム</div>
                    @foreach($user as $user)
                      <div class="card">
  　　　　　　　　　　　　 
  　　　　　　　　　　　　 <div class="card-body">
  　　　　　　　　　　　    <h5 class="card-title">{{ $user->name }}</h5>
  　　　　　　　　　　　    <h5 class="card-title">{{ $user->id }}</h5>
   　　　　　　　　　　　   <a href="{{ route('users.show', $user) }}" class="btn btn-primary">詳細</a>
  　　　　　　　　　　　  </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection