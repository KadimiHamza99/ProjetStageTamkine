{{-- @extends('layouts.app') --}}
@section('content')
    <title>{{ config('app.name', 'Tamkine') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="refresh" content="600"> <!-- actualiser la page chaque 10min -->
    {{-- <div style="text-align: center"><button class="btn btn-primary btn-sm"><a href="{{ route('live_search.index') }}" style="color: white;text-decoration: none;">Search</a></button></div> --}}
    <div style="text-align:center" >
        <button type="button" class="btn btn-outline-success btn-sm"><a href="{{ route('live_search.index') }}" style="color:#36473a ;text-decoration: none;"><b>Search</b></a></button>
        <button type="button" class="btn btn-outline-danger btn-sm"><a href="{{ route('login') }}" style="color:#620d0d ;text-decoration: none;"><b>Login</b></a></button>
    </div>
    <?php use App\Http\Controllers\PlatformsController; ?>
    <div class="container" id="display" style="display: grid;margin-top:2%;grid-template-columns: repeat(4, 1fr);grid-auto-rows: minmax(100px, auto);">
        @if (count($datas)>0)
            <?php
                // $u = 'localhost';
                // $username = 'root';
                // $password = '';
                // $dbName = 'platformstamkine';
                // $link=mysqli_connect($u, $username,$password,$dbName) or die('echec de connection');
            ?>
            @foreach ($datas as $data)
            {{-- <script>
                // $.get(url).done(function () {
                //     alert("success");
                // }).fail(function () {
                //     alert("failed");
                // });
            </script> --}}
            <?php
                // $url=$data->url;
                // $id=$data->id;
                // $ch = curl_init($url);
                // curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
                // curl_setopt($ch,CURLOPT_HEADER,true);
                // curl_setopt($ch,CURLOPT_NOBODY,true);
                // curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                // // Récupérer la réponse
                // $response = curl_exec($ch);
                // // Fermer la session cURL
                // curl_close($ch);
                // if($response==true){
                //     if($data->statut != 1){
                //         $sqls="UPDATE platforms SET statut=1 WHERE id=$id";
                //         mysqli_query($link,$sqls);
                //     }
                // }else if($response==false){
                //     if($data->statut != 0){
                //         $sqlf = "UPDATE platforms SET statut=0 WHERE id=$id";
                //         mysqli_query($link,$sqlf);
                //         $error=new PlatformsController();
                //         $error->warning();
                //     }
                // }
            ?>
            <div class="container">
                @if ($data->statut==1)
                <div class="center">
                    <div class="property-card">
                        <a href="{{ $data->url }}">
                        <div class="property-image" style="background-image:url('logos/{{ $data->logo }}');">
                            <div class="property-image-title">
                            <!-- Optional <h5>Card Title</h5> If you want it, turn on the CSS also. -->
                            </div>
                        </div></a>
                    <div class="property-description" style="background-image: linear-gradient(to bottom, rgba(172, 245, 194, 0.5), rgba(138, 197, 138, 0.5))">
                        <h5> {{ $data->nom }} </h5>
                        <h6 style="color: #3d8850;margin:1.5em auto">Click To Visite Website</h6>
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
                    <div class="property-description" style="background-image: linear-gradient(to bottom, rgba(235, 175, 175, 0.746), rgba(236, 113, 113, 0.904))">
                        <h5> {{ $data->nom }} </h5>
                        <h6 style="color: #9e3636;margin:1.5em auto">Click To Visite Website</h6>
                    </div>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        @endif
        {{ $datas->links('pagination::bootstrap-4') }}
    </div>
{{-- @endsection --}}
