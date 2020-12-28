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
                <form action="{{ route('posts.store') }}" method="POST">
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
                    <button type="submit" class="btn btn-primary">{{ trans('label.add_post') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
