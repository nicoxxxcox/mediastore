<?php


include "./templates/front/_nav.php";
?>

    <div class="container py-5">

        <div class="row">
            <div class="col-sm-6 mx-auto my-5 pb-5">
                <form class="form-signin p-3 " method="POST" action="functions.php">

                    <img class="mb-4 mx-auto d-block" src="../../assets/img/logo.svg" alt="" width="200" height="">
                    <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
                    <small>Tous les champs sont obligatoires</small>
                    <br>
                    <br>
                    <label for="inputEmail" class="">Adresse email</label>
                    <input type="email" name="emailsubs" id="inputEmail" class="form-control mb-2" placeholder="Adresse email"
                           included="" autofocus="">
                    <label for="inputEmail" class="">Nom</label>
                    <input type="text" name="lastnamesubs" id="inputName" class="form-control mb-2" placeholder="Nom"
                           included="" autofocus="">

                    <label for="inputEmail" class="">Prénom</label>
                    <input type="text" name="firstnamesubs" id="inputName" class="form-control mb-2" placeholder="Prénom"
                           included="" autofocus="">

                    <label for="inputPassword" class="">Mot de passe</label>
                    <input type="password" name="passsubs" id="inputPassword" class="form-control mb-2" placeholder="Mot de passe" included="">

                    <label for="inputEmail" class="">Adresse</label>
                    <input type="text" name="adresssubs" id="inputAdress" class="form-control mb-2" placeholder="Adresse"
                           included="" autofocus="">

                    <label for="inputEmail" class="">Code postal</label>
                    <input type="text" name="postalsubs" id="inputAdress" class="form-control mb-2" placeholder="Code postal"
                           included="" autofocus="">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">S'enregistrer</button>
                </form>

                <?php


                // DISPLAY SUBSCRIBE MESSAGE

                if(isset($_GET['reg'])){



                    if($_GET['reg'] == 1){


                        $messageUser = "<div class=\"alert alert-danger shadow m-2\" role=\"alert\">
                       Vous êtes maintenant enregistré !
                    </div>";



                    } elseif ($_GET['reg'] == 0){
                        $messageUser =   "<div class=\"alert alert-danger m-2\" role=\"alert\">
            Cet email est déjà enregistré
                    </div>";
                    }
                    echo $messageUser;
                }


                ?>


            </div>


        </div>
    </div>

<?php


?>