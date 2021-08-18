@extends('layouts.admin')

@section('content')
<div class="col-md-12" style="color: white">
    <h3 class="tile-title">Administrators Details</h3>
    @if (session('msg'))
        <div class="alert alert-danger" role="alert">
            <strong>{{ session('msg') }}</strong>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table" style="color: white">
        <thead>
            <tr>
                <th class="col-md-3">Name</th>
                <th class="col-md-4">Email</th>
                <th class="col-md-4">Date Creation</th>
                <th class="col-md-2">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (count($datas)>0)
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>
                        <form action="{{ route('responsables.destroy',$data->id) }}" method="POST">
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
