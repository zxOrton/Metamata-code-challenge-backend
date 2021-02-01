@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="mx-auto text-center">
                        <h1>Metamata</h1>
                        <p>An online story sharing media platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
