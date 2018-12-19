<nav class="navbar navbar-expand-lg navbar-dark bg-warning">

        <a class="navbar-brand" href="#"><img src="../../assets/img/logo.svg" width="150" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">CD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">DVD</a>
                </li>
            </ul>


            <div class="useraccount mx-4 "><a href="#"><i class="fas fa-user"></i> <?php echo "Utilisateur"?></a></div>
            <div class="useraccount mx-2 "><a href="#"> <button class="btn btn-sm btn-primary my-2 my-sm-0"><i class="fas fa-shopping-cart"></i>  Panier</button></a></div>
            <form class="form-inline my-2 my-lg-0">

                <input class="form-control mr-sm-2" type="text" name="deconnexion" hidden >
                <button class="btn btn-sm btn-danger my-2 my-sm-0" type="submit">Deconnexion</button>
            </form>

            <form class="form-inline my-2 mx-2 my-lg-0">
                <small class="mx-2 font-weight-bold">Connexion <br> ou <a href="#">s'enregistrer</a></small>

                <input class="form-control form-control-sm mr-sm-2" type="text" name="connexionemail" placeholder="Email" >
                <input class="form-control form-control-sm mr-sm-2" type="text" name="connexionpass" placeholder="Mot de passe" >
                <button class="btn btn-sm btn-success my-2 my-sm-0" type="submit">Ok</button>
            </form>
        </div>






</nav>