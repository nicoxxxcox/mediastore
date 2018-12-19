<?php
// on débute la session
session_start();

require_once __DIR__."/templates/_header.php";

// on appele le modèle
require_once "./functions.php";

// si une session admin ou user n'est pas en cours
if (isset($_SESSION["user"]) || isset($_SESSION["bookseller"])) {
    require_once __DIR__."/templates/front/products.php";

} else {

    if(!isset($_GET["product"])){
        require_once __DIR__."/templates/front/products.php";
    } elseif ($_GET["product"]){
        require_once __DIR__."/templates/front/product.php";

    }


    //$_GET["categorie"] = 2;
}






require_once __DIR__."/templates/_footer.php";