<?php
//require_once "../_header.php";

require "./templates/front/_nav.php";

?>

<div class="container py-5">

    <div class="row">
        <?php
        require_once "_search.php";

        echo $usr->_firstname_user;
        ?>
    </div>


    <div class="row">
        <div class="col">
            <?php


            echo " <p class=\"h2 my-5\">Notre selection de " . $categorie . "</p>";


            ?>

        </div>
    </div>

    <div class="row">

        <?php

        //Catégorie par defaut est DVD
        if (isset($_GET["categorie"])) {

        } else {
            $cat = 2;
        }


        // boucle d'affichage des produits
        $res = $prod->getProducts($cat);
        while ($prods = $res->fetch(PDO::FETCH_ASSOC)) {
            //si l'image n'est pas définie
            if (!isset($prods["url_product"])) {
                $prods["url_product"] = "https://via.placeholder.com/300";
            }

            //si le produit est une nouveauté


            echo "<div class=\"col-sm-3 my-4\">
                <div class=\"card text-center\">
                    <div class=\"card-header\">
                       " . $prods["author_product"] . "
                    </div>
                    <a href=\"?page=product&product=" . $prods["id_product"] . "&categorie=" . $prods["categorie_product"] . "\" >
                        <img class=\"card-img-top\" src='" . $prods["url_product"] . "' width=\"253\" height=\"151\" alt=\"Card image cap\" style=\"object-fit: cover\">
                    </a>
                    <div class=\"card-body\">
                    <h5 class=\"card-title \">" . $prods["price_product"] . " €</h5>
                        <h5 class=\"card-title text-warning\">" . $prods["name_product"] . "</h5>

                        <a href=\"?page=product&product=" . $prods["id_product"] . "&categorie=" . $prods["categorie_product"] . "\" class=\"btn btn-primary mr-1\">Voir produit</a>
                        <a href=\"?page=panier&addcart=" . $prods["id_product"]  . "\" class=\"btn btn-success mr-1\"><i class=\"fas fa-cart-plus\"></i></a>
                        
                       
                    </div>
                    <div class=\"card-footer text-muted\">
                        <div class=\"btn btn-sm btn-light \">Ajouté le " . $prods["dateadd"] . "</div>
                    </div>
                </div>
            </div>";
        }

        ?>


        <!--
                    <div class="col-sm-3 my-4">
                        <div class="card text-center">
                            <div class="card-header">
                                Nom de L'auteur
                            </div>
                            <img class="card-img-top" src="https://via.placeholder.com/253x151 " width="253" height="151" alt="Card image cap" style="object-fit: cover">
                            <div class="card-body">

                                <h5 class="card-title text-warning">Titre du produit</h5>

                                <a href="#" class="btn btn-primary">Voir produit</a>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="btn btn-sm btn-success ">Nouveauté</div>
                            </div>
                        </div>
                    </div>
        -->


    </div>


</div>




