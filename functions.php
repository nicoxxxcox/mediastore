<?php

//#######################
//### BDD : BEGIN ###
//#######################

//on instancie une connexion à la bdd avec la fonction pdo()
database::pdo();
$prod = new product(database::$bdd);
$usrMan = new userManager(database::$bdd);
$usr = new user(database::$bdd);
$pdo = new database();
$cart = new cart(database::$bdd);

//#######################
//### BDD : END ###
//#######################

$_SESSION['panier']['id_product'] = null;

//CATEGORY CONVERSION

function whatCategory($cat)
{
    $categorie = "";
    switch ($cat) {
        case 0 :
            $categorie = "Autre";
            break;
        case 1 :
            $categorie = "CD";
            break;
        case 2 :
            $categorie = "DVD";
            break;
    }
}

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

// GENERATE AN UUID
function gen_uuid()
{
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', // 32 bits for "time_low"
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),

        // 16 bits for "time_mid"
        mt_rand(0, 0xffff),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand(0, 0x0fff) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand(0, 0x3fff) | 0x8000,

        // 48 bits for "node"
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
}

// Coupe un texte à $longueur caractères, sur les espaces, et ajoute des points de suspension...
// Code proposé par Le Caphar http://www.lepotlatch.org
function tronque($chaine, $longueur = 120)
{
    if (empty ($chaine)) {
        return "";
    } elseif (strlen($chaine) < $longueur) {
        return $chaine;
    } else {
        $str = substr($chaine, 0, $longueur - strlen(" ...") + 1);
        //return substr($str,0,strrpos($str,' '))."...";

        return substr($chaine, 0, $longueur) . "...";
    }
}

// Affiche les messages
//isset($_GET['message']) ? $_GET['message'] = $messageUser : $messageUser =  '';


//#######################
//### PRODUCT : BEGIN ###
//#######################

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
    $prod->getProduct($_GET["product"]);
}

//#######################
//### PRODUCT : END ###
//#######################

//#######################
//### USER : BEGIN ###
//#######################


//SUBSCRIBE NEW USER
if (isset($_POST['emailsubs']) && isset($_POST['lastnamesubs']) && isset($_POST['firstnamesubs']) && isset($_POST['postalsubs']) && isset($_POST['passsubs']) && isset($_POST['adresssubs'])) {
    $usr->setNewUser($_POST);
}

//VERIFYUSER
if (isset($_POST['connexionemail']) && isset($_POST['connexionpass']) && !empty($_POST['connexionemail']) && !empty($_POST['connexionpass'])) {
    // On vérifie si l'email et le mot de passe sont dans la bdd
    var_dump($usrMan->validateUser($_POST));
    if ($usrMan->validateUser($_POST)) {

        // Si oui , on récupère les infos de l'utilisateur avec l'email
        $infos = $usrMan->getUserInfo($_POST);

        // On Utilise la SESSION pour sauver les infos de l'utilisateur
        $_SESSION['user'] = $infos[0];


        // On hydrate les propriétés de l'objet user
        $usr->hydrate($infos[0]);

        // On affiche un message de success
        $messageUser = '<div class="alert alert-success shadow m-2" role="alert">' . MESSAGE_WELCOME . '</div>';
    } else {
        // On affiche un message d'erreur
        $messageUser = '<div class="alert alert-danger shadow m-2" role="alert">' . MESSAGE_ERRLOG . '</div>';
    }
}


//AFFICHE PROFILE
if (isset($_GET['page']) && $_GET['page'] == "profile") {
    $infosall = $_SESSION['user'];
}




//MOD PROFILE
if (isset($_POST['email_user_user']) || isset($_POST['lastname_user']) || isset($_POST['firstname_user']) || isset($_POST['adress_user']) || isset($_POST['postal_user'])) {
    // On met à jour le/les info(s) utilisateur avec ce que l'on recoit dans $_POST
    $usr->setUser($_POST);
    // On met à jour la $_SESSION['user'] avec les nouvelles infos
    $_SESSION['user'] = $_POST;

    $messageUser = '<div class="alert alert-primary shadow m-2" role="alert">
                        ' . MESSAGE_USER_MOD_SUCCESS . '
                    </div>';
    header("location:index.php?page=profile&guid=" . $_SESSION['user']['guid_user'] . "&message=" . MESSAGE_USER_MOD_SUCCESS );
} else {
    $messageUser =  "";
}


//DECONNEXION
if (isset($_POST['deconnexion'])) {
    if ($_POST['deconnexion'] == 1) {
        session_destroy();
        header("location:index.php?deconnexion=1");
    }
}

//DECONNEXION MESSAGE
if (isset($_GET['deconnexion'])) {
    if ($_GET['deconnexion'] == 1) {
        $messageUser = "<div class=\"alert alert-success shadow m-2\" role=\"alert\">
                        Vous êtes maintenant déconnecté !
                    </div>";
    }
}

//#######################
//### USER : END ###
//#######################

//#######################
//### CART : BEGIN ###
//#######################

//ADD TO CART
if (isset($_GET['addcart'])) {
    // Si l'utilsateur n'est pas connecté
    if (!isset($_SESSION['name']) && !isset($_SESSION['user'])) {
        $messageUser = "<div class=\"alert alert-danger shadow m-2\" role=\"alert\">
                       Vous devez être connecté pour ajouter un produit au panier !
                    </div>";
        session_destroy();
    } else {
        $exist = $cart->productExist($_GET['addcart']);
        if ($exist == false) {
            $messageUser = '<div class="alert alert-danger shadow m-2" role="alert">
                       Le produit selectionné n\'existe pas !
                    </div>';
        } else {
            $_SESSION['panier']['id_product'];
            $cart->add($_GET['addcart']);
            $messageUser = "<div class=\"alert alert-success shadow m-2\" role=\"alert\">
                        Vous avez bien ajouté l'article au panier !
                    </div>";
        }
    }
}

//AFFICHE PANIER
if (isset($_GET['page']) && $_GET['page'] == 'orders') {

    if (empty($_SESSION['panier'])) {
        $messageUser = '<div class="alert alert-danger shadow m-2" role="alert">
                      Le pannier est vide
                    </div>';
    }
}

//#######################
//### USER : END ###
//#######################




















