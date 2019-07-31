@extends('layouts.app')


@section('content')
@foreach($board->categories as $category)
@endforeach
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-md-left">
            カテゴリ：{{$category->name}}
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-board u-board">
                <div class="card-header">
                    <h1 class="c-title">{{ $board['name'] }}</h1>
                </div>
                @foreach ($contents as $content)

                <div class="c-board_content">
                    <p class="c-paragraph u-content_user">{{$content->user['name']}}さん</p>
                    <p class="c-paragraph u-content_text">{{$content["content"]}}</p>
                    <div class="u-daytime_and_good">
                        <p class="c-paragraph u-daytime">{{$content["created_at"]}}</p>
                        <p class="c-paragraph u-good">いいね:{{$content["good"]}}</p>
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
                                <textarea rows="10" id="content" class="form-control @error('content') is-invalid @enderror" name="content" placeholder="本文" required autofocus>
                                </textarea>

                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('投稿') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @endauth
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
