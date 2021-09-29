<?php
if (isset($_SESSION['arrayError'])){
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 mt-2 liste-col">
        <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.nonplanifie' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>

        <div class="text-center mb-3"><h2 >Planifier un cours</h2></div>
            <div class="column">
                <div class="card">
                            <small class = "form-text text-left ml-5 text-danger">
                                <?= isset($_SESSION['erreurPlaning']) ? $_SESSION['erreurPlaning'] : '' ;?>
                            </small>
                <form method="post" action="">
                   <input type="hidden" name="controllers" value="responsable">
                    <input type="hidden" name="action" value="ajoutPlaning"> 
                        <div class="mt-2 mb-2">
                            <label for="" class="">Date du cours</label>
                            <input type="date" id="" class="fadeIn second  " name="date" placeholder="">
                            <small class = "form-text text-left ml-5 text-danger">
                                <?= isset($arrayError['date']) ? $arrayError['date'] : '' ;?>
                            </small> 
                        </div> 
                        <div class="  mb-2">
                            <label for="" class="">Début du cours</label>
                            <input type="time" id="" class="fadeIn second  " name="debut" placeholder="">
                            <small class = "form-text text-left ml-5 text-danger">
                                <?= isset($arrayError['debut']) ? $arrayError['debut'] : '' ;?>
                            </small>
                        </div>
                          
                        <div class="  ">
                            <label for="" class="">Fin du cours</label>
                            <input type="time" id="" class="fadeIn second" name="fin" placeholder="">
                            <small class = "form-text text-left ml-5 text-danger">
                                <?= isset($arrayError['fin']) ? $arrayError['fin'] : '' ;?>
                            </small>
                        </div>

                    <input type="submit" class="fadeIn fourth mt-5" value="Creer">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
unset($_SESSION['erreurPlaning']);
?>
<style>
 input[type="date"],
 input[type="time"],
 input[type="number"],
 .select 
{
    width:97%;
} 

label{
text-align:left;
display: block;
margin-left: 2% ;
}
.liste-col .fa {
    font-size: 32px;
    color: #152032;
    margin-left: 13px;
}
</style>
