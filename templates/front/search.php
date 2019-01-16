<?php
include "./templates/front/_nav.php";
?>
<div class="container py-5">
    <div class="row">
        <?php
        include "_search.php";
        ?>
    </div>
    <div class="row">
        <div class="col">
            <?php
            echo " <p class=\"h2 my-5\">Resultat de votre recherche</p>";
            ?>
        </div>
    </div>
    <div class="row">
        <?php
        $res = $prod->searchProduct($_GET["s"]);

        $search = $res->fetchAll(PDO::FETCH_ASSOC);
       if(empty($search)){
           echo "<p class=\" text-danger\">Aucuns resultats</p>";
       }
        foreach ($search as $row) {

            extract($row);
            echo "
                <div class=\"col-sm-3 my-4\">
                <div class=\"card text-center \">
                    <div class=\"card-header\">
                       " . $author_product . "
                    </div>
                    <img class=\"card-img-top\" src='" . $url_product . "' width=\"253\" height=\"151\" alt=\"Card image cap\" style=\"object-fit: cover\">
                    <div class=\"card-body\">
                    <h5 class=\"card-title \">" . $price_product . " €</h5>
                        <h5 class=\"card-title text-warning\">" . $name_product . "</h5>

                        <a href=\"?page=product&product=" . $id_product . "&categorie=" . $categorie_product . "\" class=\"btn btn-primary\">Voir produit</a>
                    </div>
                    <div class=\"card-footer text-muted\">
                        <div class=\"btn btn-sm btn-light \">Ajouté le " . $dateadd . "</div>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</div>




