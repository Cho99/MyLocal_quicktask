@extends('layouts.app')

@section('content')
    <h1 class="text-center">Home</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('posts.create') }}" type="button" class="btn btn-primary mb-2">Add Post</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Total Posts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $index = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $index++ }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->posts_count }} Posts</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
