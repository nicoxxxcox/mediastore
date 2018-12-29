<?php
require_once __DIR__ . "/classes/database.class.php";
require_once __DIR__ . "/classes/products.class.php";
require_once __DIR__ . "/classes/users.class.php";
require_once __DIR__ . "/classes/booksellers.class.php";
require_once __DIR__ . "/classes/orders.class.php";
require_once __DIR__ . "/classes/cart.class.php";

// bdd
database::pdo();
$prod = new products(database::$bdd);
$usr = new users(database::$bdd);
$pdo = new database();
$cart = new cart();

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

    header("location:index.php?page=search&s=" . $_GET["searchprods"]);
}

//PRODUCT FRONT
if (isset($_GET["product"])) {
    $product = $_GET["product"];
    $prod->getProduct($product);
}


//SUBSCRIBE NEW USER
if (isset($_POST['emailsubs']) && isset($_POST['lastnamesubs']) && isset($_POST['firstnamesubs']) && isset($_POST['postalsubs']) && isset($_POST['passsubs']) && isset($_POST['adresssubs'])) {
    $userinfos = $_POST;
    $usr->setNewUser($userinfos);
}


//AFFICHE PROFILE
if (isset($_GET['page']) && $_GET['page'] == "profil" && isset($_GET['name']) && isset($_GET['user'])) {

    $infosall = $usr->getUser($_GET['name'], $_GET['user']);

}

//MOD PROFILE
if (isset($_POST['emailmod']) || isset($_POST['lastnamemod']) || isset($_POST['firstnamemod']) || isset($_POST['passmod']) || isset($_POST['adressmod']) || isset($_POST['postalmod'])) {
    $usr->setUser($_POST);

    $messageUser = "<div class=\"alert alert-primary m-2\" role=\"alert\">
                        Votre profil à bien été modifié !
                    </div>";
    header("location:index.php?page=profil&name=" . $_POST['firstnamemod'] . "&user=" . $_POST['idmod']);
} else {
    $messageUser = "";
}


//VERIFYUSER
if (isset($_POST['connexionemail']) && isset($_POST['connexionpass']) && !empty($_POST['connexionemail']) && !empty($_POST['connexionpass'])) {
    extract($_POST);

    $verif = $usr->_db->prepare("SELECT id_user , email_user , pass_user , firstname_user  FROM users WHERE email_user= :mail AND pass_user = :pass");
    $verif->bindValue(':mail', $connexionemail, PDO::PARAM_STR);
    $verif->bindValue(':pass', $connexionpass, PDO::PARAM_STR);
    $verif->execute();
    $check = $verif->fetchAll();


    if (!empty($check)) {
        foreach ($check as $row) {
            extract($row);
            $_SESSION['user'] = $id_user;
            $_SESSION['name'] = $firstname_user;
        }
    } else {

        $messageUser = "<div class=\"alert alert-danger m-2\" role=\"alert\">
                        Mot de passe ou email incorrect !! réesayez ou incrivez vous :-)
                    </div>";
    }
}

//DECONNEXION

if (isset($_POST['deconnexion'])) {
    if ($_POST['deconnexion'] == 1) {

        session_destroy();
        $messageUser = "<div class=\"alert alert-success m-2\" role=\"alert\">
                        Vous êtes déconnecté !
                    </div>";
    }
}

//ADD TO CART

if (isset($_GET['addcart']) && isset($_GET['page'])) {

    if(!isset($_SESSION['name']) && !isset($_SESSION['user'])){
        $messageUser = "<div class=\"alert alert-danger m-2\" role=\"alert\">
                       Vous devez être connecté pour ajouter un produit au panier !
                    </div>";
        session_destroy();
    }

    $product = $pdo->query('SELECT id_product FROM products WHERE id_product=:id', array('id'=> $_GET['addcart']));
    if(empty($product)){

        $messageUser = "<div class=\"alert alert-danger m-2\" role=\"alert\">
                       Le produit selectionné n'existe pas !
                    </div>";
        die();
    }
    $cart->add($product[0]->id_product);


    $messageUser = "<div class=\"alert alert-success m-2\" role=\"alert\">
                        Vous avez bien ajouté l'article au panier !
                    </div>";


}






















