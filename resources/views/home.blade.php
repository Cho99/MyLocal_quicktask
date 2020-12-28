@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{ trans('label.home') }}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('posts.create') }}" type="button" class="btn btn-primary mb-2"><i class="fas fa-plus-circle"></i> {{ trans('label.add_post') }}</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ trans('label.name_post') }}</th>
                            <th scope="col">{{ trans('label.total_posts') }}</th>
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
                                <td>{{ trans_choice('label.posts', $user->posts_count) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
