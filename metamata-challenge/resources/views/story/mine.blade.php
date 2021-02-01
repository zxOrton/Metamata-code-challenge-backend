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
                        <div class="d-flex">
                            <form class="w-100" action="{{ route('edit.story', $story->slug) }}" method="GET">
                                <button class="w-100 btn btn-primary">Edit</button>
                            </form>

                            <button type="button" class="w-100 btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                Delete
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete {{$story->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete this story?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form class="align-self-end" action="{{ route('delete.story', $story->slug) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
