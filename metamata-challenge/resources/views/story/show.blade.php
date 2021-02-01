@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" >
                        <div class="card-body">
                            <h3 class="card-title d-block">{{ $story->title }}</h3>
                            <div class="blockquote-footer my-1">Created {{ $story->created_at->diffForHumans() }} by {{ $story->author}}</div>
                            <div class="card-text">
                                {!! nl2br($story->content) !!}
                            </div>
                            <div class="card-text text-right my-2">{{ $likesCount }} likes</div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($likesCount > 0)
                @if ($isLikeByMe === 0)
                <form action="{{ route('like.story', $story->id) }}" method="POST" class="text-right my-4">
                    @csrf
                    <button class="btn btn-success">Like</button>
                </form>
                @else
                <form action="{{ route('dislike.story', $story->id) }}" method="POST" class="text-right my-4">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Dislike</button>
                </form>
                @endif
            @else
                <form action="{{ route('like.story', $story->id) }}" method="POST" class="text-right my-4">
                    @csrf
                    <button class="btn btn-success">Like</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
