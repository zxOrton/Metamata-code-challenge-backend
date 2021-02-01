@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10">
            <div class="row">
                @foreach ($stories as $story)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <a href="{{ route('show.story', $story->slug) }}" class="h3 card-title d-block">{{ $story->title }}</a>
                            <div class="card-text mb-1">
                                {!! str_limit($story->content, 100) !!}
                            </div>
                            <div class="card-text mb-1">
                                {{ count($likes->where('story_id', $story->id))}} likes
                            </div>
                            <div class="blockquote-footer">Created {{ $story->created_at->diffForHumans() }} by {{ $story->author}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
