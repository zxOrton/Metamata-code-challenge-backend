@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10">
            <form action="{{ route('update.story', $story->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Story Title</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="title" required value="{{ $story->title }}">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" class="form-control" id="author" readonly value="{{ $story->author }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea type="text" name="content" class="form-control" id="content" required rows="15">{{ $story->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">UPDATE</button>
              </form>
        </div>
    </div>
</div>
@endsection
