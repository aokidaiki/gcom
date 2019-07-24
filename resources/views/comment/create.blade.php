@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                         <div class="form-group">
                                <label for="exampleFormControlTextarea1">コメント</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="board_comment">{{ $user->board_comment }}</textarea>
                         </div>
                            <a href="" class="btn btn-primary">コメントする</a>
                            
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection