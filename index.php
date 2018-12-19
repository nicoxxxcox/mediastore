<?php
// on débute la session
session_start();

require_once __DIR__."/templates/_header.php";

if (isset($_SESSION["user"]) || isset($_SESSION["bookseller"])) {

} else { require_once __DIR__."templates/front/products.php?user=".$username; }






require_once __DIR__."/templates/_footer.php";