@extends('layouts.app')

@section('content')
<div class="card-body text-center">
    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="コメント"></textarea>
        </div>

        <input type="hidden" name="post_user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="board_user_id" value="{{ $user['user'] }}">
        <button type="submit" class="btn btn-light border-secondary">コメントする</button>
    </form>
</div>
@endsection