@extends('layouts.app')

@section('content')
<div class="p-welcome container">
    <div class="row justify-content-center">
        <div>
            <h1>ようこそ</h1>
        </div>
    </div>

    @foreach($boards as $board)
    <div class="row justify-content-center">
        <p><a href="/board/{{$board->id}}">{{$board->name}}</a></p>
    </div>
    @endforeach
</div>
@endsection
