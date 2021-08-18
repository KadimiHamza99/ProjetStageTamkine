@extends('layouts.admin')

@section('content')
    <h3 class="tile-title" style="color: white">Edit Platform</h3>
    {{-- @if ($errors->any())
        @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif --}}
    <form class="row" action="{{ route('platforms.update',$platform->id) }}" method="post" enctype="multipart/form-data" style="color: white">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="form-group col-md-12">
            <label class="control-label">Nom de la platform</label>
            <input class="form-control" type="text" placeholder="platform TAMKINE" name="nom" value={{ $platform->nom }}>
        </div>
        <div class="form-group col-md-12">
            <label class="control-label">URL de la platform</label>
            <input class="form-control" type="url" placeholder="https://tamkine.fondation.org" name="url" value={{ $platform->url }}>
        </div>
        <div class="form-group col-md-12">
            <label class="control-label">Logo de la platform</label>
            <input class="form-control" type="file" name="logo">
        </div>
        <div class="form-group col-md-4 align-self-end">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
@endsection
