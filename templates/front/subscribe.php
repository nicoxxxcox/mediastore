<?php

require_once "../_header.php";

require_once "./_nav.php";

?>

    <div class="container">

        <div class="row">
            <div class="col-sm-6 mx-auto mt-5">
                <form class="form-signin p-3 " data-bitwarden-watching="1">

                    <img class="mb-4 mx-auto d-block" src="../../assets/img/logo.svg" alt="" width="200" height="">
                    <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
                    <label for="inputEmail" class="sr-only">Adresse email</label>
                    <input type="email" name="emailsubs" id="inputEmail" class="form-control mb-2" placeholder="Adresse email"
                           required="" autofocus="">
                    <label for="inputEmail" class="sr-only">Nom</label>
                    <input type="text" name="lastnamesubs" id="inputName" class="form-control mb-2" placeholder="Nom"
                           required="" autofocus="">

                    <label for="inputEmail" class="sr-only">Prénom</label>
                    <input type="text" name="firstnamesubs" id="inputName" class="form-control mb-2" placeholder="Prénom"
                           required="" autofocus="">

                    <label for="inputPassword" class="sr-only">Mot de passe</label>
                    <input type="password" name="passsubs" id="inputPassword" class="form-control mb-2" placeholder="Mot de passe" required="">

                    <label for="inputEmail" class="sr-only">Adresse</label>
                    <input type="text" name="adresssubs" id="inputAdress" class="form-control mb-2" placeholder="Adresse"
                           required="" autofocus="">

                    <label for="inputEmail" class="sr-only">Code postal</label>
                    <input type="text" name="adresssubs" id="inputAdress" class="form-control mb-2" placeholder="Code postal"
                           required="" autofocus="">


                    <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>

                    <div class="alert alert-primary m-2" role="alert">
                        A simple primary alert—check it out!
                    </div>


                </form>


            </div>


        </div>
    </div>

<?php

require_once "../_footer.php";
?>