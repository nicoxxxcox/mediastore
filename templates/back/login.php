<?php

require_once "../_header.php";
?>

    <div class="container">

        <div class="row">
            <div class="col-sm-6 mx-auto mt-5">
                <form class="form-signin p-3 " data-bitwarden-watching="1">

                    <img class="mb-4 mx-auto d-block" src="../../assets/img/logo.svg" alt="" width="200" height="">
                    <h1 class="h3 mb-3 font-weight-normal">Connectez vous </h1>
                    <label for="inputEmail" class="sr-only">Adresse email</label>
                    <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Adresse email" required=""
                           autofocus="">
                    <label for="inputPassword" class="sr-only">Mot de passe</label>
                    <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Mot de passe" required="">

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>

                    <div class="alert alert-primary m-2" role="alert">
                        A simple primary alert—check it out!
                    </div>

            </div>

            </form>



        </div>


    </div>

<?php

require_once "../_footer.php";
?>