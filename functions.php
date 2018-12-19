<?php
include_once __DIR__."/classes/database.class.php";
include_once __DIR__."/classes/products.class.php";
include_once __DIR__."/classes/users.class.php";
include_once __DIR__."/classes/booksellers.class.php";
include_once __DIR__."/classes/orders.class.php";

// bdd
database::pdo();
$prod = new products(database::$bdd);

//CATEGORY
$categorie = NULL;
if(isset($_GET['categorie'])){
    if(  $_GET['categorie'] == 0){
        $categorie = "Autre";
    } elseif ($_GET['categorie'] == 1){
        $categorie = "CD";
    } elseif ($_GET['categorie'] == 2){
        $categorie = "DVD";
    }
}




//ALLPRODUCTS FRONT

if(isset($_GET["categorie"])){

    $cat = $_GET["categorie"];
    $prod->getProducts($cat);
}

//PRODUCT FRONT
if(isset($_GET["product"])){

    $product = $_GET["product"];
    $prod->getProduct($product);
}





