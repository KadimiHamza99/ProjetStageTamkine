@extends('layouts.admin')

@section('content')
<div class="col-md-12" style="color: white">
    <h3 class="tile-title">Platforms Details</h3>
    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('msg') }}</strong>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table" style="color: white">
        <thead>
            <tr>
                <th class="col-md-3">Name</th>
                <th class="col-md-3">Logo</th>
                <th class="col-md-3">URL</th>
                <th class="col-md-1">Statut</th>
                <th class="col-md-1">Update</th>
                <th class="col-md-1">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (count($datas)>0)
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->nom }}</td>
                    <td><img src="logos/{{ $data->logo }}" class="img-responsive" width="70"></td>
                    <td>{{ $data->url }}</td>
                    <td>
                        @if ($data->statut==0)
                            <span class="badge badge-danger badge-sm">Offline</span>
                        @else
                            <span class="badge badge-success badge-sm">Online</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-info btn-sm"><a href="{{ route('platforms.edit',$data->id) }}" style="text-decoration:none ;color:white">Update</a></button>
                    </td>
                    <td>
                        <form action="{{ route('platforms.destroy',$data->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
        </table>
        {{ $datas->links('pagination::simple-bootstrap-4') }}
    </div>
</div>
@endsection
