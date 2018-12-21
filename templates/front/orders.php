<?php
require_once "./templates/front/_nav.php";
?>

<div class="row">
        <div class="container py-5">


            <p class="h2">Mon panier</p>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Produit id</th>
                    <th scope="col">Article</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Catégorie</th>
                    <th>prix</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Livraison prévue</th>
                    <th>Quantité</th>
                    <th>TOTAL</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><a href="#" style="">Mark</a></td>
                    <td>Otto</td>
                    <td>CD</td>
                    <td>25 €</td>
                    <td>150</td>
                    <td>15/06/2018</td>
                    <td><form action="">
                            <input type="number" name="quantite" @ id="">
                            <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        </form></td>
                    <td>200 €</td>



                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>DVD</td>
                    <td>25 €</td>
                    <td>20</td>
                    <td>15/06/2018</td>
                    <td><form action="">
                            <input type="number" name="quantite" @ id="">
                            <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        </form></td>
                    <td>450 €</td>

                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>CD</td>
                    <td>25 €</td>
                    <td>50</td>
                    <td>15/06/2018</td>
                    <td><form action="">
                            <input type="number" name="quantite" @ id="">
                            <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        </form></td>
                    <td>150 €</td>

                </tr>
                </tbody>
            </table>

            <div class="btn btn-primary "><a href="index.php?page=payment" class="text-light">Payer et passer la commande</a></div>


            <p class="h2 mt-5">Mes commandes</p>

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
