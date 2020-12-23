@extends('layouts.app')

@section('content')
    <h1 class="text-center">My Posts</h1>
    <div class="container">
        <a href="{{ route('posts.create') }}" type="button" class="btn btn-primary mb-2">Add Post</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (Session::has('mess'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Thông báo: </strong> {!! Session::get('mess') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post['user']->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success mr-3">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
