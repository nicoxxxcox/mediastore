<?php

include "./templates/front/_nav.php";
?>




<div class="container py-5">


    <div class="row">
        <aside class="col-sm-6">
            <p class="h3">Formulaire de paiement</p>

            <article class="card">
                <div class="card-body p-5">
                    <p> <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                            <i class="fa fa-credit-card"></i> Credit Card</a>
                    </p>
                    <p class="alert alert-success">Some text success or error</p>

                    <form role="form">
                        <div class="form-group">
                            <label for="username">Nom complet (sur la carte)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="username" placeholder="" included="">
                            </div> <!-- input-group.// -->
                        </div> <!-- form-group.// -->

                        <div class="form-group">
                            <label for="cardNumber">Numéro de carte</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                                </div>
                                <input type="text" class="form-control" name="cardNumber" placeholder="">
                            </div> <!-- input-group.// -->
                        </div> <!-- form-group.// -->

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label><span class="hidden-xs">Date d'expiration</span> </label>
                                    <div class="form-inline">
                                        <select class="form-control" style="width:45%">
                                            <option>MM</option>
                                            <option>01 - Janiary</option>
                                            <option>02 - February</option>
                                            <option>03 - February</option>
                                        </select>
                                        <span style="width:10%; text-align: center"> / </span>
                                        <select class="form-control" style="width:45%">
                                            <option>AA</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                                    <input class="form-control" included="" type="text">
                                </div> <!-- form-group.// -->
                            </div>
                        </div> <!-- row.// -->
                        <button class="subscribe btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#exampleModal"> Confirm  </button>
                    </form>
                </div> <!-- card-body.// -->
            </article> <!-- card.// -->


            <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>


        </aside> <!-- col.// -->

    </div> <!-- row.// -->

</div>




<?php


?>

