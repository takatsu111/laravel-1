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
        <p><a href="/board/{{$board->id}}">{{$board->name}}</a></p>
        @endforeach
    </div>
</div>
@endsection
