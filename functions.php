<?php
include_once __DIR__ . "/classes/database.class.php";
include_once __DIR__ . "/classes/products.class.php";
include_once __DIR__ . "/classes/users.class.php";
include_once __DIR__ . "/classes/booksellers.class.php";
include_once __DIR__ . "/classes/orders.class.php";

// bdd
database::pdo();
$prod = new products(database::$bdd);
$usr = new users(database::$bdd);

//CATEGORY
$categorie = "DVD";
if (isset($_GET['categorie'])) {
    if ($_GET['categorie'] == 0) {
        $categorie = "Autre";
    } elseif ($_GET['categorie'] == 1) {
        $categorie = "CD";
    } elseif ($_GET['categorie'] == 2) {
        $categorie = "DVD";
    }
}


//ALLPRODUCTS FRONT

if (isset($_GET["categorie"])) {

    $cat = $_GET["categorie"];
    $prod->getProducts($cat);
}

//PRODUCT FRONT
if (isset($_GET["product"])) {

    $product = $_GET["product"];
    $prod->getProduct($product);
}


//SUBSCRIBE NEW USER

    if(isset($_POST['emailsubs']) &&  isset($_POST['lastnamesubs']) &&  isset($_POST['firstnamesubs']) &&  isset($_POST['postalsubs']) &&  isset($_POST['passsubs']) &&  isset($_POST['adresssubs'])){
    $userinfos = $_POST;
    $usr->setNewUser($userinfos);
}

//VERIFYUSER

if(isset($_POST['connexionemail']) &&  isset($_POST['connexionpass'])){


    $infosconnect = $_POST;
    $usr->getConnexion($infosconnect);


}









