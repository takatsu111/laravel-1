@extends('layouts.app')

@section('content')
<div class="p-welcome container">
    <div class="row justify-content-center">
        <div>
            <h1>ようこそ</h1>
        </div>
    </div>

    <div class="row justify-content-center">
    @foreach($boards as $board)
        <div class="col-md-4 c-board_item">
            <div>
            <h4><a href="/board/{{$board->id}}">{{$board->name}}</a></h4>
            <p>テスト文章です</p>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
