<?php
require_once "../_header.php";

require_once "./_nav.php";
?>


<div class="row">
    <div class="container py-5">

        <p class="h3 mb-5">Fiche produit</p>

        <form>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="nameprod">Nom du produit</label>
                    <input type="text" class="form-control" name="nameprod" id="inputEmail4"
                           placeholder="Ex : La nuit de morts vivants">
                </div>
                <div class="form-group col-md-4">
                    <label for="idprod">Id du produit</label>
                    <input type="text" class="form-control" name="idprod" id="inputPassword4" placeholder="Id" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="authorprod">Auteur</label>
                    <input type="text" class="form-control" name="authorprod" id="inputEmail4" placeholder="Auteur">
                </div>
                <div class="form-group col-md-6">
                    <label for="editorprod">Editeur</label>
                    <input type="text" class="form-control" name="editorprod" id="inputPassword4" placeholder="Editeur">
                </div>
            </div>
            <div class="form-group">
                <label for="descprod">Description</label>
                <textarea name="descprod" class="form-control" id="" cols="30" rows="1"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="catprod">Catégorie</label>
                    <select id="inputState" class="form-control" name="catprod">
                        <option selected>CD</option>
                        <option>DVD</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="quantprod">Quantité en stock</label>
                    <input type="text" class="form-control" name="quantprod" id="inputEmail4" placeholder="Ex : 50">
                </div>

                <div class="form-group col-md-4">
                    <label for="dateprod">Date d'ajout du produit</label>
                    <input type="text" class="form-control" name="dateprod" id="inputPassword4" placeholder="Id"
                           disabled>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><?php echo "Mise à jour des infos" ?></button>
        </form>

        <form action="">
            <input type="text" name="deleteprod" id="" hidden >
            <button type="button" class="btn btn-outline-danger btn-block my-3">Supprimer ce produit</button>
        </form>
    </div>

</div>


<?php
require_once "../_footer.php";
?>
