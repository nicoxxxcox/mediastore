<?php
include "./templates/front/_nav.php";

// On génère le sous-total
if (!isset($subtotal)) {
    $subtotal = 0;
}
?>

<div class="row">
    <div class="container py-5">
        <p class="h2">Mon panier</p>
        <table class="table table-striped mt-5" >
            <thead>
            <tr>
                <th class="text-center" scope="col">id</th>
                <th class="text-center" scope="col">Article</th>
                <th class="text-center" scope="col">Auteur</th>
                <th class="text-center" scope="col">Catégorie</th>
                <th class="text-center">prix</th>
                <th class="text-center" scope="col">En stock</th>
                <th class="text-center" scope="col">Livraison prévue</th>
                <th class="text-center">Quantité</th>
                <th class="text-center">TOTAL</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (empty($_SESSION['panier'])) {
                // Si le panier ($_SESSION) est vide on affiche un tableau vide à ue seule ligne
                echo '
                    <tr>
                        <td class="text-center" > - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center" >
                            <form action="">
                            <div class="input-group">
                                <input type="number" name="quantite" class="form-control" value=" - " id="">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                </div>
                            
                            </div>                              
                            </form>
                        </td>
                        <td class="text-center"> -  €</td>
                    </tr>';
            }

            // Si le panier n'es pas vide, on l'affiche !
            foreach ($_SESSION['panier'] as $id => $value) {

                // On récupère les infos pour chaques index
                $cartAll = $cart->getInfos($id);
                // On récupère nos lignes d'informations dans une boucle
                while ($c = $cartAll->fetch()) {
                    echo '
                        <tr>
                            <td class="text-center" >' . $id . '</td>
                            <td class="text-center">
                                <a href="?page=product&categorie=' . $c['categorie_product'] . '&product=' . $id . '">' . tronque($c['name_product'], 15) . '</a>
                            </td>
                            <td class="text-center">' . tronque($c['author_product'], 30) . '</td>
                            <td class="text-center">' . whatCategory($c['categorie_product']) . '</td>
                            <td class="text-center">' . $c['price_product'] . ' €</td>
                            <td class="text-center">' . $c['state_product'] . '</td>
                            <td class="text-center">??</td>
                            <td class="text-center" style="table-layout: fixed;width: 10%;">
                            <form action="">
                            <div class="input-group ">
                                <input type="text"  name="quantite" class="form-control text-center " value="' . $value . '" >
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                </div>
                            
                            </div>                              
                            </form>
                            
                            </td>
                            <td class="text-center">' . $c['price_product'] * $value . ' €</td>
                        </tr>';

                    // On incrémente $subtotal pour chaques lignes
                    $subtotal += ($c["price_product"] * $value);
                }
            }

            ?>
            </tbody>
        </table>

        <div class="card mb-5 text-center bg-warning">
            <div class="card-body">
               <h4 class="font-weight-bold"> Total de votre commande : <?php echo $subtotal ?> €</h4>
            </div>
        </div>

        <div class="btn btn-primary "><a href="index.php?page=payment" class="text-light"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Payer et passer la
                commande</a></div>


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
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
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
            </tbody>
        </table>


    </div>

</div>
