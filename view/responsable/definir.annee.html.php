<?php
if (isset($_SESSION['arrayError'])){
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
?>
<?php if ($_SESSION['message']==1) {


echo'
<div class="container-fluid p-0">
    <div  id = "message"  class ="alert alert-success text-center text-success">Cours créée avec succès</div>
</div>';
}
unset($_SESSION['message']);
?>
      

    <div class="container-fluid">
        <div class="row p-0">
            <div class="col-md-10 liste-col">
                <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.nonplanifie' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>

            <div class="text-center mb-3"><h2>Définir une nouvelle année scolaire</h2></div>
              
                <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline">
                        <input type="hidden" name="controllers" value="responsable">
                        <input type="hidden" name="action" value="nouvelleannee">

                        <div class=" col-md-12 ml-auto mr-auto mb-4 mt-2">
                          <label for="" class="ml-1 mb-3">Entrer l'année scolaire</label>
                            <div class="form-group">
                                <input type='text'  class="form-control " name="annee" placeholder="format(2020-2021)">
                            </div>
                                <small class = " form-text text-danger text-left ml-3">
                                        <?=isset($arrayError['annee']) ? $arrayError['annee'] : '' ;?>
                                </small>
                        </div>

                         
                        <input type="submit" class="fadeIn fourth ml-auto mr-auto mt-4" value="Définir">
                </form>
            </div>

        </div>
    </div>
    <style>
        
    .form-inline label {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: left;
    margin-bottom: 0;
}
.liste-col .fa {
    font-size: 32px;
    color: #152032;
    margin-left: 13px;
}
    .display{
        display: contents;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
        $("#message").show().fadeIn(3000).css("color","blue")
    });
</script>
<?php require ( ROUTE_DIR . 'view/inc/footer.html.php' )?>