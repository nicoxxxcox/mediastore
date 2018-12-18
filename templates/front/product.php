<?php
require_once "../_header.php";

require_once "./_nav.php";
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-sm-8 my-4">
                <div class="card ">
                    <div class="card-header">
                        Nom de L'auteur

                    </div>


                    <div class="card-body">
                        <div class="btn btn-sm btn-success my-3">Nouveauté</div>

                        <h3 class="card-title ">35 €</h3>

                        <h5 class="card-title text-warning">Titre du produit</h5>
                        <p class="card-text">Description ... text below as a natural lead-in to additional content.</p>
                        <p class="card-text"> Editeur : <?php echo "12/11/2018"?></p>
                        <p class="card-text"> Catégorie : <?php echo "DVD"?></p>
                        <p class="card-text">Date d'ajout</p>
                        <p class="card-text">Stock : <?php echo "50"?></p>
                        <a href="#" class="btn btn-primary">Ajouter au panier</a>
                    </div>

                </div>

            </div>




            <div class="col-sm-4 my-4">

                <img class="card-img-top" src="https://media.senscritique.com/media/000016134438/source_big/La_Nuit_des_morts_vivants.jpg" width="350"  alt="Card image cap" style="object-fit: cover">
            </div>



        </div>


    </div>




<?php

require_once "../_footer.php";
?>