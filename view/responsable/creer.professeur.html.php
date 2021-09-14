<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 mt-5 liste-col">
        <div class="text-center mb-3"><h2 >Ajouter un professeur</h2></div>
            <div class="column">
                <div class="card">
                <form method="POST" action="<?=WEB_ROUTE?>">
                    <input type="hidden" name="controllers" value="security">
                    <input type="hidden" name="action" value="connexion">
                    <div class="row mt-4">
                        <div class=" col-md-6">
                            <label for="">Nom</label>
                            <input type="text" id="" class="fadeIn second  ml-3" name="" placeholder="">
                        </div>
                        <div class=" col-md-6">
                            <label for="">Prénom</label>
                            <input type="text" id="" class="fadeIn second pre" name="" placeholder="">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class=" col-md-6">
                            <label for="">Grade</label>
                            <input type="text" id="" class="fadeIn second  ml-3" name="" placeholder="">
                        </div>
                        <div class=" col-md-6">
                            <label for="">Spécialité</label>
                            <input type="text" id="" class="fadeIn second" name="" placeholder="">
                        </div>
                    </div>
                    <input type="submit" class="fadeIn fourth mt-5" value="Creer">
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
 input[type="text"]

{
    width:98%;
} 

label{
text-align:left;
display: block;
margin-left: 3% ;
}
.grade{
    margin-top: 2%;
    margin-left: 1% ;

}
</style>
