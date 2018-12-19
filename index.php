<?php
// on débute la session
session_start();

$_SESSION['nico'] = "Nico";

require_once __DIR__."/templates/_header.php";

// on appele le modèle
require_once "./functions.php";




if (isset($_GET["product"])) {
require_once __DIR__."/templates/front/product.php";

}





if (isset($_GET["products"])) {
    require_once __DIR__."/templates/front/products.php";
}






require_once __DIR__."/templates/_footer.php";