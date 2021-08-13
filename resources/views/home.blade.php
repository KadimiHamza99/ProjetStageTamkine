@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h5>Nombre de Responsables</h5>
                <?php
                    $j=0;
                ?>
                @if (count($rows)>0)
                    @foreach ($rows as $row)
                        <?php
                            $j++;
                        ?>
                    @endforeach
                @endif
                <?php
                    echo "<p><b>".$j."</b></p>";
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
                <h5>Nombre de Platforms</h5>
                <?php
                    $i=0;
                ?>
                @if (count($datas)>0)
                    @foreach ($datas as $data)
                        <?php
                            $i++;
                        ?>
                    @endforeach
                @endif
                <?php
                    echo "<p><b>".$i."</b></p>";
                ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <p>
        - Cette application permet à l'administrateur de gerer les platforms de la fondation TAMKINE (ajouter,supprimer et modifier) et par la suite , ces platforms vont subir à un test d'url et verifier si les platforms sont deja en ligne ou il y a un panne quelque part , et se test se fait d'une maniére automatique et l'administrateur n'a pas besoin d'actualiser la page à chaque fois .
    </p>
    <p>
        -Et aussi l'application permet à l'administrateur de gérer d'autre responsables (ajouter,modifier et supprimer) qui peuvent gérer les platforms mais avec des privilèges limités .
    </p>
</div>
@endsection
