@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{ trans('label.my_posts') }}</h1>
    @if (Session::has('mess'))
        <div class="card notification">
            <div class="card-header">
                <b>{{ trans('label.message') }}</b>
            </div>
            <div class="toast-body">
                <span>{!! Session::get('mess') !!}</span>
            </div>
        </div>
    @endif
    <div class="container">
        <a href="{{ route('posts.create') }}" type="button" class="btn btn-primary mb-2"><i class="fas fa-plus-circle"></i>
            {{ trans('label.add_post') }}</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (count($user->posts))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ trans('label.name_post') }}</th>
                                <th scope="col">{{ trans('label.image') }}</th>
                                <th scope="col">{{ trans('label.list_images') }}</th>
                                <th scope="col">{{ trans('label.author') }}</th>
                                <th scope="col">{{ trans('label.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $index = 1;
                            @endphp
                            @foreach ($user->posts as $post)
                                <tr>
                                    <th scope="row">{{ $index++ }}</th>
                                    <td>{{ $post->name }}</td>
                                    <td><img class="imgae-post" src="{{ asset('upload/' . $post->images) }}" alt=""></td>
                                    <td>
                                        @if ($post->list_images)
                                            @php
                                            $list_images = json_decode($post->list_images)
                                            @endphp
                                            @foreach ($list_images as $item)
                                                <div><img class="imgae-post" src="{{ asset('upload/' . $item) }}" alt=""></div>
                                            @endforeach
                                        @else
                                            <div>No Images</div>
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('posts.edit', $post->id) }}"
                                                class="btn btn-success mr-3">{{ trans('label.edit') }}</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger">{{ trans('label.delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center fa-3x no-posts">
                        <p class="text-muted"><i class="far fa-newspaper"></i> {{ trans('label.have_not_posts') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
