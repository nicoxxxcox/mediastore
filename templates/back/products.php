<?php
require_once "./templates/back/_nav.php";
?>

<div class="row">
    <div class="container py-5 my-5">

        <p class="h3 text-right">bonjour <?php echo "Name" ?></p>
        <p class="h2">Liste des Produits</p>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Article id</th>
                <th scope="col">Article</th>
                <th scope="col">Auteur</th>
                <th scope="col">Stock</th>
                <th scope="col">Date d'ajout</th>
                <th scope="col">Editer</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td><a href="#" style="">Mark</a></td>
                <td>Otto</td>
                <td>200</td>
                <td>12/08/2018</td>
                <td><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></td>

            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>20</td>
                <td>15/09/2018</td>
                <td><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>450</td>
                <td>09/08/2018</td>
                <td><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-outline-danger btn-block">Supprimer tous les articles hors stock</button>

    </div>

</div>
