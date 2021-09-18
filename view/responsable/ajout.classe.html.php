<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 mt-3 liste-col">
            <div class="text-center mb-3"><h2 >Ajouter une classe</h2></div>
                <div class="column">
                    <div class="card">
                    <form method="POST" action="<?=WEB_ROUTE?>">
                        <input type="hidden" name="controllers" value="security">
                        <input type="hidden" name="action" value="connexion">
                        <div class="form-group mt-3">
                            <input type="text" id="" class="fadeIn second" name="" placeholder="Entrer le nom de la classe">
                        </div>
                        <div class="mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="" id="">
                                    <option>Choisir la filière</option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                            <div class=" mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="" id="">
                                    <option>Choisir le niveau</option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                        <input type="submit" class="fadeIn fourth" value="Creer">
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
