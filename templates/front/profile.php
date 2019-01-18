<?php


include './templates/front/_nav.php';

echo '
<div class="container py-5">
    <div class="row">
        <div class="col-sm-6 mx-auto mt-5">
            <div class="btn btn-secondary"><a href="' . $_SERVER['HTTP_REFERER'] . '" class="text-light"><i class="fas fa-arrow-alt-circle-left"></i> Retour </a> </div>
            <form class="form-signin p-3 " method="post" action="index.php" >
                <img class="mb-4 mx-auto d-block" src="assets/img/logo.svg" width="200">
                <h1 class="h3 mb-3 font-weight-normal">Mes informations</h1>
                <label for="inputEmail" class="">Adresse email</label>
                <input type="email" name="emailmod" id="inputEmail" class="form-control text-primary mb-2" placeholder="Adresse email"
                            autofocus="" value="' . $infosall['email_user'] . '">
                <label for="inputEmail" class="">Nom</label>
                <input type="text" name="lastnamemod" id="inputName" class="form-control text-primary mb-2" placeholder="Nom"
                            value="' . $infosall['lastname_user'] . '" >
                <label for="inputEmail" class="">Prénom</label>
                <input type="text" name="firstnamemod" id="inputName" class="form-control text-primary mb-2" placeholder="Prénom"
                            value="' . $infosall['firstname_user'] . '" >                    
                <label for="inputEmail" class="">Adresse</label>
                <input type="text" name="adressmod" id="inputAdress" class="form-control text-primary mb-2" placeholder="Adresse"
                            value="' . $infosall['adress_user'] . '" >
                <label for="inputEmail" class="">Code postal</label>
                <input type="text" name="postalmod" id="inputAdress" class="form-control text-primary mb-2" placeholder="Code postal"
                            value="' . $infosall['postal_user'] . '" >
                <input type="text" name="idmod" id="inputAdress" class="form-control text-primary mb-2" 
                           value="' . $infosall['id_user'] . '" hidden >
                <button class="btn btn-lg btn-primary btn-block" type="submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
';





