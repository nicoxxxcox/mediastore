<?php


require_once "./templates/front/_nav.php";
?>

    <div class="container py-5">
        <div class="row">
            <div class="col-sm-8 my-4">

                <div class="card ">


                    <?php



                    //
                    if(isset($_GET["product"])){
                        $res = $prod->getProduct($_GET["product"]);
                        $prod = $res->fetch();
                    } else { echo "Ce produits n'exite pas ! " ; }


                    //CATEGORY
                    if(  $prod['categorie_product'] == 0){
                        $categorie = "Autre";
                    } elseif ($prod['categorie_product'] == 1){
                        $categorie = "CD";
                    } elseif ($prod['categorie_product'] == 2){
                        $categorie = "DVD";
                    }

                    echo "
                    <div class=\"card-header\">
                        
                        ".$prod['author_product']."
                       
                    </div>
                    <div class=\"card-body\">
                        <div class=\"btn btn-sm btn-success my-3\">Nouveauté</div>

                        <h3 class=\"card-title \">".$prod['price_product']." €</h3>

                        <h5 class=\"card-title text-warning\">".$prod['name_product']."</h5>
                        <p class=\"card-text\">".$prod['description_product']."</p>
                        <p class=\"card-text\"> Editeur : ".$prod['editor_product']."</p>
                        <p class=\"card-text\"> Catégorie : ".$categorie."</p>
                        <p class=\"card-text\">Ajouté le : ".$prod['dateadd']."</p>
                        <p class=\"card-text\">Stock : ".$prod['state_product']."</p>
                        <a href=\"#\" class=\"btn btn-primary\">Ajouter au panier</a>
                    </div>
                    
                   



                </div>

            </div>




            <div class=\"col-sm-4 my-4\">

                <img class=\"card-img-top\" src=\"".$prod['url_product']."\" width=\"350\"  alt=\"Card image cap\" style=\"object-fit: cover\">
            </div>
            
             "; ?>



        </div>


    </div>

