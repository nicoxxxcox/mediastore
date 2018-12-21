<?php
//require_once "../_header.php";

//require_once "./templates/front/_nav.php";



?>

<div class="container py-5">

    <div class="row">
        <?php
        require_once "_search.php";


        ?>
    </div>



    <div class="row">
        <div class="col">
            <?php



            echo " <p class=\"h2 my-5\">Resultat de votre recherche</p>" ;


            ?>

        </div>
    </div>

    <div class="row">

        <?php
        $res = $prod->searchProduct($_GET["s"]);



        while ($search = $res->fetch(PDO::FETCH_ASSOC)) {

            echo "
                <div class=\"col-sm-3 my-4\">
                <div class=\"card text-center\">
                    <div class=\"card-header\">
                       ".$search["author_product"]."
                    </div>
                    <img class=\"card-img-top\" src='".$search["url_product"]."' width=\"253\" height=\"151\" alt=\"Card image cap\" style=\"object-fit: cover\">
                    <div class=\"card-body\">
                    <h5 class=\"card-title \">".$search["price_product"]." €</h5>
                        <h5 class=\"card-title text-warning\">".$search["name_product"]."</h5>

                        <a href=\"?page=product&product=".$search["id_product"]."&categorie=".$search["categorie_product"]."\" class=\"btn btn-primary\">Voir produit</a>
                    </div>
                    <div class=\"card-footer text-muted\">
                        <div class=\"btn btn-sm btn-light \">Ajouté le ".$search["dateadd"]."</div>
                    </div>
                </div>
            </div>
            
            
            ";
        }

        ?>





    </div>



</div>




