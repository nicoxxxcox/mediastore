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

//SEARCHPRODUCTS FRONT
if (isset($_GET["searchprods"])) {

     header("location:index.php?page=search&s=".$_GET["searchprods"]);
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



//AFFICHE PROFILE
if(isset($_GET['page']) &&  $_GET['page'] == "profil") {
    if(isset($_GET['name'])){
        $infosall = $usr->getUser( $_GET['name'] ,$_GET['user'] );

    }
}

//MOD PROFILE
if(isset($_POST['emailmod']) || isset($_POST['lastnamemod']) || isset($_POST['firstnamemod']) || isset($_POST['passmod']) || isset($_POST['adressmod']) || isset($_POST['postalmod'])){
    $usr->setUser($_POST);

    $messagemod = "<div class=\"alert alert-primary m-2\" role=\"alert\">
                        Votre profil à bien été modifié !
                    </div>";
    header("location:index.php?page=profil&name=".$_POST['firstnamemod']."&user=".$_POST['idmod']);
}
else{ $messagemod = "" ;}

















