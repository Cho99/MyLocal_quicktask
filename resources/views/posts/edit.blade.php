@extends('layouts.app')

@section('content')
    <h1 class="text-center">{{ trans('label.edit_post') }}</h1>
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
                    <div class="form-group">
                        <label for="exampleInputEmail1">Iamge</label>

                        <input name="image" type="file" class="form-control-file" id="image">
                        <img class="imgae-post mt-3" name="image" src="{{ asset('upload/' . $post->images) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">List Images</label>

                        <input name="image" type="file" class="form-control-file" id="image">
                        @if ($post->list_images)
                            @php
                            $list_images = json_decode($post->list_images);
                            @endphp
                            @foreach ($list_images as $item)
                                <img class="imgae-post mt-3" id="delete" name="list_image[]"
                                    src="{{ asset('upload/' . $item) }}">
                            @endforeach
                        @endif
                        <input type="hidden" value="{{ $post->list_images }}">
                        {{-- <script>
                            function myFunction() {
                                var images = document.getElementById("delete");
                                console.log(images);
                                // images = Array.from(images);
                                // images.forEach(function(item, index) {
                                //     console.log(item);
                                // });
                            }
                        </script> --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
