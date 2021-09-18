<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 mt-2 liste-col">
        <div class="text-center mb-3"><h2 >Planifier un cours</h2></div>
            <div class="column">
                <div class="card">
                <form method="post" action="">
                   <!--  <input type="hidden" name="controllers" value="security">
                    <input type="hidden" name="action" value="connexion"> -->
                        <div class="mt-2 mb-2">
                        <label for="" class="">Date du cours</label>
                            <input type="date" id="" class="fadeIn second  " name="" placeholder="">
                        </div>
                        <div class="  mb-2">
                        <label for="" class="">Début du cours</label>
                            <input type="time" id="" class="fadeIn second  " name="" placeholder="">
                        </div>
                          
                        <div class="  ">
                        <label for="" class="">Fin du cours</label>
                            <input type="time" id="" class="fadeIn second" name="" placeholder="">
                        </div>
<!--                     <div class="form-group">
                        <label for="" class="">Affecté à Mr/Mme</label>
                            <select class="select " name="" id="">
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                    </div>  -->
                    <input type="submit" class="fadeIn fourth mt-5" value="Creer">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
</style>
