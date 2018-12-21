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
else { require __DIR__."/templates/front/products.php"; }



//VERIFYUSER
if( isset($_POST['connexionemail']) &&  isset($_POST['connexionpass'])){
    $infosconnect = $_POST;
    $usr->getConnexion($infosconnect);


    if( ($usr->getConnexion($infosconnect)) === TRUE){

        $infosall = $usr->getUser($_POST['connexionemail'] , $_POST['connexionpass']);

        $_SESSION['name'] = $infosall['firstname_user'] ;
        $_SESSION['user'] = $infosall['id_user'] ;

        $usr->_id_user = $_SESSION['user'];
        $usr->_firstname_user = $_SESSION['name'] ;




        header("location:/?page=products&categorie=2&user=". $_SESSION['user']."?name=".$_SESSION['name']) ;
    }
    else { header("location:/?page=products&categorie=2&user=0"); }
}




//DECONNEXION

if(isset($_POST['deconnexion'])){
    if($_POST['deconnexion'] == 1){

        session_unset();

        header("location:/index.php?products&categorie=2");
    }
}




require_once __DIR__."/templates/_footer.php";