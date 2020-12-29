@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{ trans('label.add_post') }}</h1>
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ trans('label.name_post') }}</label>
                        <input type="text" name="name" class="form-control" placeholder="{{ trans('label.name_post') }}">
                    </div>
                    @error('name')
                        <div>
                            <span class="text-danger font-weight-bold mt-2">{{ $message }}</span>
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="image">Images</label>
                        <input name="image" type="file" class="form-control-file" id="image">
                    </div>
                    <div class="form-group">
                        <label for="list_images">list Images</label>
                        <input name="list_images[]" type="file" class="form-control-file" id="list_images" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ trans('label.add_post') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
