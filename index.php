<?php
session_start();

DEFINE('FILEPATH', realpath(dirname(__FILE__)));


// On enregistre notre autoload.
function loadClass($classname)
{

    require FILEPATH . '/classes/' . $classname . '.class.php';
}

spl_autoload_register('loadClass');

include FILEPATH."/functions.php";
include FILEPATH . "/templates/_header.php";

if (isset($_GET["page"])) {
    require FILEPATH . "/templates/front/" . $_GET["page"] . ".php";
} else {
    require FILEPATH . "/templates/front/home.php";
}


require FILEPATH . "/templates/_footer.php";