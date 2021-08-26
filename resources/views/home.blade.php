@extends('layouts.admin')

@section('content')
<title>{{ config('app.name', 'Tamkine') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="refresh" content="1800"> <!-- actualiser la page chaque 10min -->
        <div class="container">
        @if (count($datas)>0)
            @foreach ($datas as $data)
            {{-- <script>
                // $.get(url).done(function () {
                //     alert("success");
                // }).fail(function () {
                //     alert("failed");
                // });
            </script> --}}
                @if ($data->statut==1)
                <div class="center">
                    <div class="property-card">
                        <a href="{{ $data->url }}">
                        <div class="property-image" style="background-image:url('logos/{{ $data->logo }}');">
                            <div class="property-image-title">
                            <!-- Optional <h5>Card Title</h5> If you want it, turn on the CSS also. -->
                            </div>
                        </div></a>
                    <div class="property-description" style="background-image: linear-gradient(to bottom, rgba(48, 121, 70, 0.787), rgba(83, 136, 83, 0.698))">
                        <h5> {{ $data->nom }} </h5>
                        <h6 style="color: #aad3b4;margin:1.5em auto">Click To Visite Website</h6>
                    </div>
                    </div>
                </div>
                @endif
                @if ($data->statut==0)
                <div class="center">
                    <div class="property-card">
                        <a href="{{ $data->url }}">
                        <div class="property-image" style="background-image:url('logos/{{ $data->logo }}');">
                            <div class="property-image-title">
                            <!-- Optional <h5>Card Title</h5> If you want it, turn on the CSS also. -->
                            </div>
                        </div></a>
                    <div class="property-description" style="background-image: linear-gradient(to bottom, rgba(97, 31, 31, 0.609), rgba(160, 71, 71, 0.904))">
                        <h5> {{ $data->nom }} </h5>
                        <h6 style="color: #e0b8b8;margin:1.5em auto">Error Code : {{ $data->response_code }}</h6>
                    </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif
        </div>
        {{ $datas->links('pagination::bootstrap-4') }}
    </div>
@endsection
