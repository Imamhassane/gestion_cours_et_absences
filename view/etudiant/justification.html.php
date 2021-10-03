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
        <div class="row p-0">
            <div class="col-md-10 liste-col">
                <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=attache&view=liste.absence.etudiant&id_user='.$_SESSION['userConnect'][0]['id_user'] ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>

            <div class="text-center mb-3"><h2>Justifier votre absence</h2></div>
              
                <form method="POST" action="<?=WEB_ROUTE?>" enctype="multipart/form-data" class="form-inline">
                        <input type="hidden" name="controllers" value="etudiant">
                        <input type="hidden" name="action" value="justifierabsence">

                        <div class=" col-md-12 ml-auto mr-auto mb-4 mt-2">
                          <label for="" class="ml-1 mb-3">Motif de l'absence</label>
                            <div class="form-group">
                                <textarea id="my-textarea" rows="10" cols="60" class="form-control textarea" name="motif" rows="3"></textarea>
                            </div>
                                <small class = " form-text text-danger text-left ">
                                        <?= isset($arrayError['motif']) ? $arrayError['motif'] : '' ;?>
                                </small>
                        </div>
                        <div class=" col-md-12 ml-auto mr-auto mb-4 mt-2">
                          <label for="" class="ml-1 mb-1">Piéce jointe</label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="fiche">
                            </div>
                        </div>
                         
                        <input type="submit" class="fadeIn fourth ml-auto mr-auto mt-4" value="Justifier">
                </form>
            </div>

        </div>
    </div>
    <style>
    input[type="file"]{
   border:none;

    }
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
