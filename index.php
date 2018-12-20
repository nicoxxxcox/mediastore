<?php
// on débute la session
session_start();


require_once __DIR__."/templates/_header.php";

// on appele le modèle
require_once "./functions.php";






if (isset($_GET["product"])) {
require __DIR__."/templates/front/product.php";
}
elseif (isset($_GET["products"])){
    require __DIR__."/templates/front/products.php";
}
elseif (isset($_GET["home"])){
    require __DIR__."/templates/front/products.php";
}
elseif (isset($_GET["subscribe"])){
    require __DIR__."/templates/front/subscribe.php";
}
else { require __DIR__."/templates/front/products.php"; }








require_once __DIR__."/templates/_footer.php";