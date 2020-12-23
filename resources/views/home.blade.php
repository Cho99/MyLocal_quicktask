@extends('layouts.app')

@section('content')
    <h1 class="text-center">Home</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                        $i = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $user->name }}</td>
                                <td><a href="{{ route('posts.index') }}">{{ $user->posts_count }} Posts</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
