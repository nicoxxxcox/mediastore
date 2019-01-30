<?php
include "./templates/front/_nav.php";
?>

<div class="container py-5">

    <div class="row">
        <?php
        include_once "_search.php";
        echo $usr->_firstname_user;
        ?>
    </div>

    <div class="row">
        <div class="col">
            <?php echo " <p class=\"h2 my-5\">Notre selection de " . $categorie . "</p>"; ?>
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
                $prods["url_product"] = "https://via.placeholder.com/253x151";
            }

            echo '<div class="col-sm-3 my-4">
                <div class="card text-center shadow">
                    <div class="card-header font-weight-bold">
                       ' . tronque($prods["author_product"], 20) . '
                    </div>
                    <a href="?page=product&product=' . $prods['id_product'] . "&categorie=" . $prods["categorie_product"] . '" >
                        <img class="card-img-top" src="' . PATH_RACINE_CONFIG . '/assets/img/thumb.png" width="253" height="151" alt="Card image cap" style="background-size: cover;background-image: url(' . $prods["url_product"] . '); ">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold ">' . $prods['price_product'] . ' €</h5>
                        <h5 class="card-title text-warning font-weight-bold">' . tronque($prods['name_product'], 20) . '</h5>
                        <a href="?page=product&product=' . $prods['id_product'] . '&categorie=' . $prods['categorie_product'] . '" class="btn btn-primary mr-1">Voir produit</a>
                        <a href="?page=' . $_GET['page'] . '&categorie=' . $_GET['categorie'] . '&addcart=' . $prods['id_product'] . '" class="btn btn-success mr-1"><i class="fas fa-cart-plus"></i></a>
                        
                       
                    </div>
                    <div class="card-footer text-muted">
                        <div class="btn btn-sm btn-light ">Ajouté le ' . $prods['dateadd'] . '</div>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>


</div>




