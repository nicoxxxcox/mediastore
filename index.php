<?php
// on débute la session
session_start();

require_once __DIR__."/templates/_header.php";



// on appele le modèle
require_once "./functions.php";









if (isset($_GET["product"])) {
require __DIR__."/templates/front/product.php";
}
elseif (isset($_GET["products"])){
    require __DIR__."/templates/front/products.php";
}
elseif (isset($_GET["home"])){
    require __DIR__."/templates/front/products.php";
}
elseif (isset($_GET["subscribe"])){
    require __DIR__."/templates/front/subscribe.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "panier" ){
    require __DIR__."/templates/front/orders.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "profil" ){
    require __DIR__."/templates/front/profile.php";
}
else { require __DIR__."/templates/front/products.php"; }




//DECONNEXION

if(isset($_POST['deconnexion'])){
    if($_POST['deconnexion'] == 1){

        session_unset();

        header("location:/index.php?products&categorie=2");
    }
}




require_once __DIR__."/templates/_footer.php";