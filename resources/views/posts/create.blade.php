@extends('layouts.app')

@section('content')
    <h1 class="text-center">{{ trans('label.add_post') }}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::has('mess'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ trans('label.message') }} </strong> {!! Session::get('mess') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
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
