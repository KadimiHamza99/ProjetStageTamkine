@extends('layouts.admin')

@section('content')
    <h3 class="tile-title">Creer Une Nouvelle Platform</h3>
    {{-- @if ($errors->any())
        @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif --}}
    <form class="row" action="{{ route('platforms.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-12">
            <label class="control-label">Nom de la platform</label>
            <input class="form-control" type="text" placeholder="platform TAMKINE" name="nom" value={{ old('nom') }}>
        </div>
        <div class="form-group col-md-12">
            <label class="control-label">URL de la platform</label>
            <input class="form-control" type="url" placeholder="https://tamkine.fondation.org" name="url" value={{ old('url') }}>
        </div>
        <div class="form-group col-md-12">
            <label class="control-label">Logo de la platform</label>
            <input class="form-control" type="file" name="logo" value= {{ old('logo') }}>
        </div>
        <div class="form-group col-md-4 align-self-end">
            <input type="submit" value="Create" class="btn btn-primary">
        </div>
    </form>
@endsection
