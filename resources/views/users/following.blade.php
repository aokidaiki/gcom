@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body text-center">

                    <h3>フォローユーザー</h3><h3>{{ $follow_users_number }}人</h3>

                        @foreach($following_users as $following_user)
                            <p>{{ $following_user->name }}</p>
                        @endforeach
                </div>
            </div>
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h3>フォロワーユーザー</h3><h3>{{ $be_followed_users_number }}人</h3>

                        @foreach($be_followed_users as $be_followed_user)
                            <p>{{ $be_followed_user->name }}</p>
                        @endforeach

                </div>
            </div>
            <a href="{{ route('users.show' ,$id) }}" class="btn btn-primary">戻る</a>
        </div>
    </div>
</div>

@endsection