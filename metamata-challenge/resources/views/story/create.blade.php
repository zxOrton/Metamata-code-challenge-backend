@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10">
            <form action="{{ route('post.story')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Story Title</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="title" required>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" class="form-control" id="author" readonly value="{{auth()->user()->name}}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea type="text" name="content" class="form-control" rows="15" id="content" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">CREATE</button>
              </form>
        </div>
    </div>
</div>
@endsection
