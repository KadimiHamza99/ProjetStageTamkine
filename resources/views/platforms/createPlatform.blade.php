@extends('layouts.admin')

@section('content')

    <h3 style="color: white">{{ __('Create Platform') }}</h3>

    <div class="card-body" style="color: white">
        <form method="post" action="{{ route('platforms.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input class="form-control" type="text" name="nom" value={{ old('nom') }}>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('URL') }}</label>

                <div class="col-md-6">
                    <input class="form-control" type="url" name="url" value={{ old('url') }}>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                <div class="col-md-6">
                    <input class="form-control" type="file" name="logo" value= {{ old('logo') }}>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>

@endsection

