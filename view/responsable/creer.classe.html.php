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
                    <div class="form-group">
                        <input type="text" id="" class="fadeIn second" name="" placeholder="Entrer le nom de la classe">

                    </div>
                    <div class="form-group">
                        <input type="text" id="" class="fadeIn third" name="" placeholder="Entrer la filière">
                    </div>
                    <div class="form-group">
                        <input type="text" id="" class="fadeIn third" name="" placeholder="Entre le niveau">
                    </div>
                    <input type="submit" class="fadeIn fourth" value="Creer">
            </form>
                </div>
            </div>
        </div>
    </div>
</div>

    