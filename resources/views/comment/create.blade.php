@extends('layouts.app')

@section('content')
<div class="card-body text-center">
    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="comment">コメント</label>
            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
        </div>

        <input type="hidden" name="post_user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="board_user_id" value="{{ $user['user'] }}">
        <button type="submit" class="btn btn-primary">コメントする</button>
    </form>
</div>
@endsection