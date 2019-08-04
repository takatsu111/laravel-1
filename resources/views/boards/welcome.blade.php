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
                <a href="/board/{{$board->id}}">
                    <h4>{{$board->name}}</h4>
                    <p>{{$board->contents->find($board->contents->max('id'))["content"]}}</p>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
