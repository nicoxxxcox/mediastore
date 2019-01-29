<?php


include './templates/front/_nav.php';

echo '
<div class="container py-5">
    <div class="row">
        <div class="col-sm-6 mx-auto mt-5">
            <div class="btn btn-secondary"><a href="' . $_SERVER['HTTP_REFERER'] . '" class="text-light"><i class="fas fa-arrow-alt-circle-left"></i> Retour </a> </div>
            <form class="form-signin p-3 " method="post" action="index.php" >
            <!-- $infosall = $_SESSION["user"] -->
                <img class="mb-4 mx-auto d-block" src="assets/img/logo.svg" width="200">
                <h1 class="h3 mb-3 font-weight-normal">Mes informations</h1>
                <label for="inputEmail" class="">Adresse email</label>
                <input type="email" name="email_user"  class="form-control text-primary mb-2" placeholder="Adresse email"
                            autofocus="" value="' . $_SESSION['user']['email_user'] . '">
                <label for="inputEmail" class="">Nom</label>
                <input type="text" name="lastname_user"  class="form-control text-primary mb-2" placeholder="Nom"
                            value="' . $_SESSION['user']['lastname_user'] . '" >
                <label for="inputEmail" class="">Prénom</label>
                <input type="text" name="firstname_user" class="form-control text-primary mb-2" placeholder="Prénom"
                            value="' . $_SESSION['user']['firstname_user'] . '" >                    
                <label for="inputEmail" class="">Adresse</label>
                <input type="text" name="adress_user"  class="form-control text-primary mb-2" placeholder="Adresse"
                            value="' . $_SESSION['user']['adress_user'] . '" >
                <label for="inputEmail" class="">Code postal</label>
                <input type="text" name="postal_user"  class="form-control text-primary mb-2" placeholder="Code postal"
                            value="' . $_SESSION['user']['postal_user'] . '" >
                <input type="text" name="guid_user"  class="form-control text-primary mb-2" 
                           value="' . $_SESSION['user']['guid_user'] . '" hidden >
                <button class="btn btn-lg btn-primary btn-block" type="submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
';





