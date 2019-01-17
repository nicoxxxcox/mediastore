<?php
session_start();

// On enregistre notre autoload.
function loadClass($classname){
    require __DIR__ . '/classes/' . $classname.'.class.php';
}
spl_autoload_register('loadClass');

include __DIR__ . "/functions.php";
include __DIR__ . "/templates/_header.php";

if (isset($_GET["page"])) {
    require __DIR__ . "/templates/front/" . $_GET["page"] . ".php";
} else {
    require __DIR__ . "/templates/front/home.php";
}


require __DIR__ . "/templates/_footer.php";