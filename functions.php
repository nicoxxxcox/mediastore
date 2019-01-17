<?php

// bdd
//on instancie une connexion à la bdd avec la fonction pdo()
database::pdo();
$userMan = new userManager(database::$bdd);
$prod = new product(database::$bdd);
$usr = new user(database::$bdd);
$pdo = new database();
$cart = new cart(database::$bdd);


$_SESSION['panier']['id_product'] = null;

//CATEGORY CONVERSION

function whatCategory($cat)
{
    $categorie = "";
    // si $cat est un entier
    if (is_int($cat)) {
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
    } /*elseif (preg_match("/(.{1,$longueur})\s./ms", $chaine, $match))
    {
        return $match [1] . "...";
    }*/ else {
        $str = substr($chaine, 0, $longueur - strlen("...") + 1);
        //return substr($str,0,strrpos($str,' '))."...";

        return substr($chaine, 0, $longueur) . "...";
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

    $usr->setNewUser($_POST);
}

//VERIFYUSER IN DB



if (isset($_POST['connexionemail']) && isset($_POST['connexionpass']) && !empty($_POST['connexionemail']) && !empty($_POST['connexionpass'])) {

    $check = $userMan->validateUser($_POST);

    if (!empty($check)) {
        foreach ($check as $row) {
            extract($row);
            if (password_verify($connexionpass, $pass_user)) {
                $usr->hydrate($check[0]);
                $_SESSION['user'] = $check[0];

                $messageUser = "<div class=\"alert alert-success shadow m-2\" role=\"alert\">
                        Bienvenue sur Medi@Store " . $firstname_user . " 
                    </div>";
            } else {
                $messageUser = "<div class=\"alert alert-danger shadow m-2\" role=\"alert\">
                        Mot de passe ou email incorrect !! réesayez ou incrivez vous :-)
                    </div>";

            }
        }
    } else {
        $messageUser = "<div class=\"alert alert-danger shadow m-2\" role=\"alert\">
                        Mot de passe ou email incorrect !! réesayez ou incrivez vous :-)
                    </div>";
    }
}


//AFFICHE PROFILE
if (isset($_GET['page']) && $_GET['page'] == "profile" && isset($_GET['guid'])) {
    $infosall = $usr->getUser($_GET['guid']);
}


//MOD PROFILE
if (isset($_POST['emailmod']) || isset($_POST['lastnamemod']) || isset($_POST['firstnamemod']) || isset($_POST['passmod']) || isset($_POST['adressmod']) || isset($_POST['postalmod'])) {
    if ($_POST['passmod'] == $infosall['pass_user']) {
        echo "hello";
    }
    $usr->setUser($_POST);

    $messageUser = "<div class=\"alert alert-primary shadow m-2\" role=\"alert\">
                        Votre profil à bien été modifié !
                    </div>";
    header("location:index.php?page=profile&guid=" . $_SESSION['user']['guid_user']);
} else {
    $messageUser = "";
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

//ADD TO CART
if (isset($_GET['addcart'])) {
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





















