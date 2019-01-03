<?php
session_start();
require "./functions.php";
require __DIR__ . "/templates/_header.php";



/*
if (isset($_GET["page"]) && $_GET['page'] == "product") {
    require __DIR__ . "/templates/front/product.php";
} elseif (isset($_GET["page"]) && $_GET['page'] == "products") {
    require __DIR__ . "/templates/front/products.php";
} elseif (isset($_GET["page"]) && $_GET['page'] == "home") {
    require __DIR__ . "/templates/front/home.php";
} elseif (isset($_GET["page"]) && $_GET['page'] == "subscribe") {
    require __DIR__ . "/templates/front/subscribe.php";
} elseif (isset($_GET["page"]) && $_GET['page'] == "orders") {
    require __DIR__ . "/templates/front/orders.php";
} elseif (isset($_GET["page"]) && $_GET['page'] == "profile") {
    require __DIR__ . "/templates/front/profile.php";
} elseif (isset($_GET["page"]) && $_GET['page'] == "payment") {
    require __DIR__ . "/templates/front/payment.php";
} elseif (isset($_GET["page"]) && $_GET['page'] == "search") {
    require __DIR__ . "/templates/front/search.php";
} elseif (isset($_GET["page"]) && $_GET['page'] == "login") {
    require __DIR__ . "/templates/back/login.php";
} elseif (isset($_GET["page"]) && $_GET['page'] == "adproducts") {
    require __DIR__ . "/templates/back/products.php";
} elseif (isset($_GET["page"]) && $_GET['page'] == "adproduct") {
    require __DIR__ . "/templates/back/product.php";
} elseif (isset($_GET["page"]) && $_GET['page'] == "adorders") {
    require __DIR__ . "/templates/back/orders.php";
} else {
    require __DIR__ . "/templates/front/home.php";
}*/
if (isset($_GET["page"])) {
    require __DIR__ . "/templates/front/" . $_GET["page"] . ".php";
} else {
    require __DIR__ . "/templates/front/home.php";
}






require __DIR__ . "/templates/_footer.php";