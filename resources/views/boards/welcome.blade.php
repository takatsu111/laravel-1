@extends('layouts.app')

@section('content')
<div class="p-welcome container">
    <div class="row justify-content-center">
        <div>
            <h1>ようこそ</h1>
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        @foreach($boards as $board)
        <div class="col-md-4 c-board_item">
            <div>
                <a href="/board/{{$board->id}}">
                </a>
                <h4>{{$board->name}}</h4>
                <p>{{$board->contents->find($board->contents->max('id'))["content"]}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
