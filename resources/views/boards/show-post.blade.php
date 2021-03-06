@extends('layouts.app')


@section('content')
@error('content_id')
errorrrrrr
@enderror
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-md-left">
            <ul class="c-category_list">
                @foreach($board->categories as $category)
                <li class="u-category_name">{{$category->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card p-board u-board">
                <div class="card-header">
                    <h1 class="c-title">{{ $board['name'] }}</h1>
                </div>
                @foreach ($board->contents as $content)

                <div class="c-board_content">
                    <p class="c-paragraph u-content_user">{{$content->user['name']}}さん</p>
                    <p class="c-paragraph u-content_text">{{$content["content"]}}</p>
                    <div class="u-daytime_and_good">
                        <p class="c-paragraph u-daytime">{{$content["created_at"]}}</p>
                        @auth
                        <form action="{{route('boardGood')}}" method="POST" class="js-form">
                            @csrf
                            <button type="submit" name="function" value=@if($content->usersOfGoods->contains($userid)) "delete" @else "insert" @endif class="btn c-paragraph u-good @if($content->usersOfGoods->contains($userid)) btn-primary @else btn-outline-primary u-active @endif ">いいね:<span class="js-count" onfocus="this.blur();">{{$content->usersOfGoods->count()}}</span></button>
                            <input id="content_id" type="hidden" name="content_id" value="{{$content->id}}">
                        </form>
                        @else
                        <p class="c-paragraph u-good">いいね:{{$content->usersOfGoods->count()}}</p>
                        @endauth
                    </div>
                </div>

                @endforeach
            </div>
            @auth
            <div class="card p-board_form">
                <div class="card-header">{{ __('投稿') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('boardPost') }}">
                        @csrf

                        <input type="hidden" name="board_id" value="{{ $board['id'] }}">
                        <div class="form-group row justify-content-center">


                            <div class="col-md-12">
                                <textarea rows="5" id="content" class="form-control @error('content') is-invalid @enderror" name="content" placeholder="本文" required autofocus>
                                </textarea>

                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 text-md-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('投稿') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</div>
<script src="{{ asset('js/good.js') }}" defer></script>
@endsection
