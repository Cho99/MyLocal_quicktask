@extends('layouts.app')

@section('content')
    <h1 class="text-center">Edit Post</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Post</label>
                        <input type="text" name="name" class="form-control" placeholder="Name Post"
                            value="{{ $post->name }}">
                    </div>
                    @error('name')
                        <div>
                            <span class="text-danger font-weight-bold mt-2">{{ $message }}</span>
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
