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
            <div class="col-md-10 mt-3 liste-col">
            <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.classe' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>
            <div class="text-center mb-3"><h2 >Ajouter une classe</h2></div>
                <div class="column">
                    <div class="card">
                    <form method="POST" action="<?=WEB_ROUTE?>">
                        <input type="hidden" name="controllers" value="responsable">
                        <input type="hidden" name="action" value="<?=isset($classes[0]['id_classe']) ? 'editClasse' : 'ajoutClasse'?>">
                        <input type="hidden" name="id_classe"      value="<?=isset($classes[0]['id_classe']) ? $classes[0]['id_classe'] : ""; ?>">        

                        <div class="form-group mt-3 mb-4">
                            <label for="" class="ml-5 float-left">Nom de la classe</label>
                            <input type="text" id="" class="fadeIn second" name="nom_classe" value="<?=$classes[0]['nom_classe']?>" placeholder="">
                            <small class = "form-text text-danger float-left ml-5">
                                <?= isset($arrayError['nom_classe']) ? $arrayError['nom_classe'] : '' ;?>
                            </small>
                        </div>
                        <div class="mb-4 mt-2">
                            <label for="" class="ml-5 float-left">Filière</label>
                                <select class=" select" name="filiere" id="">
                                <option><?=$classes[0]['filiere']?></option>
                                    <option>devWeb</option>
                                    <option>design</option>
                                    <option>marketing</option>
                                </select>
                            <small class = "form-text text-danger float-left ml-5">
                                <?= isset($arrayError['filiere']) ? $arrayError['filiere'] : '' ;?>
                            </small>
                            </div>
                            <div class=" mb-4 mt-2">
                                <label for="" class="ml-5 float-left">Niveau</label>
                                <select class=" select" name="niveau" id=""  >
                                <option><?=$classes[0]['niveau']?></option>
                                    <option>L1</option>
                                    <option>L2</option>
                                    <option>L3</option>
                                    <option>M1</option>
                                    <option>M2</option>
                                </select>
                            <small class = "form-text text-danger float-left ml-5">
                                <?= isset($arrayError['niveau']) ? $arrayError['niveau'] : '' ;?>
                            </small>
                            </div>
                        <input type="submit" class="fadeIn fourth" value="Creer">
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
   .liste-col .fa{
    font-size: 32px;
    color: #152032;
    margin-left: 13px;

    }
    input[type=text], input[type=password], input[type=date], input[type=time], input[type=number], .select {
    background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    height: 60px;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    width: 95%;
    border: 2px solid #f6f6f6;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 5px 5px 5px 5px;
}
</style>