<?php
require_once "./templates/back/_nav.php";
?>

    <div class="row">
        <div class="container py-5">


            <p class="h2">Liste des Commandes</p>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Commande id</th>
                    <th scope="col">Article</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Nom du client</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Date de commande</th>
                    <th scope="col">Statut commande</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><a href="#" style="">Mark</a></td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>15/06/2018</td>
                    <td>
                        <form action="">
                            <select id="inputState" class="form-control-sm" name="statutprod">
                                <option selected>En préparation</option>
                                <option>Prête</option>
                                <option>Envoyée</option>
                            </select>
                        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        </form>
                    </td>

                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@mdo</td>
                    <td>15/06/2018</td>
                    <td><form action="">
                            <select id="inputState" class="form-control-sm" name="statutprod">
                                <option selected>En préparation</option>
                                <option>Prête</option>
                                <option>Envoyée</option>
                            </select>
                            <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>@mdo</td>
                    <td>15/06/2018</td>
                    <td><form action="">
                            <select id="inputState" class="form-control-sm" name="statutprod">
                                <option selected>En préparation</option>
                                <option>Prête</option>
                                <option>Envoyée</option>
                            </select>
                            <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>



        </div>

    </div>
