<?php
//require_once "../_header.php";

require "./templates/front/_nav.php";

?>



<div class="container">


    <div class="row" style="background: url('./assets/img/Frame.svg')">
        <div class="col-sm-6 mx-auto">

            <div class="jumbotron bg-light shadow-lg  my-5">
                <h1 class="display-4 font-weight-bold">Bienvenue sur Medi@Store!</h1>
                <p class="lead">Chez nous ! vous trouverez le CD ou DVD de choix . Toutes les nouveautés sont sur
                    Medi@store !</p>
                <hr class="my-4">
                <p>Differents supports sont disponibles !</p>
                <a class="btn btn-primary btn-lg" href="index.php?page=products&categorie=1" role="button">CD</a>
                <a class="btn btn-primary btn-lg" href="index.php?page=products&categorie=1" role="button">DVD</a>


            </div>
        </div>


    </div>

    <div class="row mt-5">
        <?php
        require "_search.php";
        ?>
    </div>


</div>




