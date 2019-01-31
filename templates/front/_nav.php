<?php

if (!empty($_SESSION['user'])) {
    $nav = "<div class=\"useraccount mx-4 \"><a href=\"index.php?page=profile&guid=" . $_SESSION['user']['guid_user'] . "\"><i class=\"fas fa-user\"></i> " . $_SESSION['user']['firstname_user'] . "</a></div>
            <div class=\"useraccount mx-2 \"><a href=\"index.php?page=orders\"> <button class=\"btn btn-sm btn-primary my-2 my-sm-0\"><i class=\"fas fa-shopping-cart\"></i>  Panier</button></a></div>
            <form class=\"form-inline my-2 my-lg-0\" action='index.php' method='POST'>
                <input class=\"form-control mr-sm-2\" type=\"number\" name=\"deconnexion\" hidden value='1' >
                <button class=\"btn btn-sm btn-danger my-2 my-sm-0\" type=\"submit\">Deconnexion</button>                
            </form>";
} else {
    $nav = "<form class=\"form-inline my-2 mx-2 my-lg-0\" method='POST' action='index.php'>
                <small class=\"mx-2 font-weight-bold\">Connexion <br> ou <a href=\"?page=subscribe&reg=2\">s'enregistrer</a></small>

                <input class=\"form-control form-control-sm mr-sm-2\" type=\"text\" name=\"connexionemail\" placeholder=\"Email\" included >
                <input class=\"form-control form-control-sm mr-sm-2\" type=\"password\" name=\"connexionpass\" placeholder=\"Mot de passe\" included >
                <button class=\"btn btn-sm btn-success my-2 my-sm-0\" type=\"submit\">Ok</button>
            </form>";
}


?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning shadow">
        <a class="navbar-brand" href="?page=products&categorie=2">
            <img src="<?php echo PATH_RACINE_CONFIG ?>/assets/img/logo.svg" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=home"><i class="fas fa-home"></i> Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=products&categorie=1">CD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=products&categorie=2">DVD</a>
                </li>
            </ul>
            <?php
            echo $nav;
            ?>
        </div>
    </nav>
<?php

// ICI ON AFFICHE LE MESSAGE
if (isset($messageUser)) {
    echo "<div class='container ' > <div class='col '>" . $messageUser . "</div></div>";
}
?>