<?php
session_start();

//Config REALPATH
define('PATH_RACINE_CONFIG', "http://".$_SERVER["HTTP_HOST"].'/mediastore');

// Config Messages
DEFINE('MESSAGE_WELCOME','Bienvenue sur Medi@Store !');
DEFINE('MESSAGE_ERRLOG','Mot de passe ou email incorrect !! réesayez ou incrivez vous :-)');
DEFINE('MESSAGE_USER_MOD_SUCCESS','Votre profil à bien été modifié !');


include "inc/config.php";

// On enregistre notre autoload.
function loadClass($classname){
    require __DIR__ . '/classes/' . $classname.'.class.php';
}
spl_autoload_register('loadClass');

// On inclu les fonctions
include __DIR__ . "/functions.php";

// On inclu le head
include __DIR__ . "/templates/_header.php";

// Ici le routeur
if (isset($_GET["page"])) {
    require __DIR__ . "/templates/front/" . $_GET["page"] . ".php";
} else {
    require __DIR__ . "/templates/front/home.php";
}

// On inclu le footer
require __DIR__ . "/templates/_footer.php";