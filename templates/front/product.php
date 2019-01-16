<?php
include "./templates/front/_nav.php";
?>

<div class="container py-5">


    <div class="row">
        <div class="col-sm-8 my-4">

            <div class="card shadow ">
                <?php
                if (isset($_GET["product"])) {
                    $res = $prod->getProduct($_GET["product"]);
                    $prod = $res->fetch();
                } else {
                    echo "Ce produits n'exite pas ! ";
                }
                //CATEGORY
                if ($prod['categorie_product'] == 0) {
                    $categorie = "Autre";
                } elseif ($prod['categorie_product'] == 1) {
                    $categorie = "CD";
                } elseif ($prod['categorie_product'] == 2) {
                    $categorie = "DVD";
                }
                echo "
                    <div class=\"card-header font-weight-bold\">
                        
                        " . $prod['author_product'] . "
                       
                    </div>
                    <div class=\"card-body\">
                        <div class=\"btn btn-sm btn-success my-3\">Nouveauté</div>

                        <h3 class=\"card-title font-weight-bold \">" . $prod['price_product'] . " €</h3>

                        <h5 class=\"card-title text-warning font-weight-bold\">" . $prod['name_product'] . "</h5>
                        <p class=\"card-text\">" . $prod['description_product'] . "</p>
                        <p class=\"card-text\"> Editeur : " . $prod['editor_product'] . "</p>
                        <p class=\"card-text\"> Catégorie : " . $categorie . "</p>
                        <p class=\"card-text\">Ajouté le : " . $prod['dateadd'] . "</p>
                        <p class=\"card-text\">Stock : " . $prod['state_product'] . '</p>
                       <a href=\'?page=' . $_GET['page'] . '&categorie=' . $_GET['categorie'] . '&addcart=' . $prod['id_product'] . '\' class="btn btn-success"><i class="fas fa-cart-plus"></i> Ajouter au panier</a>
                       </div>
                </div>
            </div>
            <div class="col-sm-4 my-4 shadow">
                <img class="" src="' . $prod['url_product'] . "\" width=\"350\"  alt=\"Card image cap\" style=\"object-fit: cover\">
            </div>
            
            <div class='row'>
            
            <a href='index.php?page=products&categorie=" . $prod['categorie_product'] . "'class='btn btn-secondary'> <- Retour aux " . $categorie . " </a>
</div>
"; ?>


            </div>


        </div>

