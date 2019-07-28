@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ "todo:掲示板名" }}</div>
                @foreach ($contents as $content)
                
                <div class="c-board_content" >
                    <p>{{$content["user"]}}さん</p>
                    <p>{{$content["content"]}}</p>
                    <p style="margin:0;">{{$content["created_at"]}}----------------いいね:{{$content["good"]}}</p>
                </div>

                @endforeach
            </div>
            <div class="card">
                <div class="card-header">{{ __('投稿') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('boardPost') }}">
                        @csrf
                        <input type="hidden" name="board" value="0">
                        <input type="hidden" name="user" value="0">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('本文') }}</label>

                            <div class="col-md-6">
                                <textarea rows="10" id="content" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autofocus>
                                </textarea>

                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('投稿') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
