<?php
// on débute la session
session_start();

require_once __DIR__."/templates/_header.php";

$_SESSION['user'] = "";
$_SESSION['name'] = "";

// on appele le modèle
require_once "./functions.php";



if (isset($_GET["page"]) && $_GET['page'] == "product") {
require __DIR__."/templates/front/product.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "products"){
    require __DIR__."/templates/front/products.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "home"){
    require __DIR__."/templates/front/products.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "subscribe"){
    require __DIR__."/templates/front/subscribe.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "panier" ){
    require __DIR__."/templates/front/orders.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "profil" ){
    require __DIR__."/templates/front/profile.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "payment" ){
    require __DIR__."/templates/front/payment.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "search" ){
    require __DIR__."/templates/front/search.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "login" ){
    require __DIR__."/templates/back/login.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "adproducts" ){
    require __DIR__."/templates/back/products.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "adproduct" ){
    require __DIR__."/templates/back/product.php";
}
elseif (isset($_GET["page"]) && $_GET['page'] == "adorders" ){
    require __DIR__."/templates/back/orders.php";
}
else { require __DIR__."/templates/front/home.php"; }








//DECONNEXION

if(isset($_POST['deconnexion'])){
    if($_POST['deconnexion'] == 1){

        session_unset();

        header("location:/index.php?products&categorie=2");
    }
}




require_once __DIR__."/templates/_footer.php";