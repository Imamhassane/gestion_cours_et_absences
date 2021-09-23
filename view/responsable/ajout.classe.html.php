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
            <div class="col-md-11 mt-3 liste-col">
            <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.classe' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>
            <div class="text-center mb-3"><h2 >Ajouter une classe</h2></div>
                <div class="column">
                    <div class="card">
                    <form method="POST" action="<?=WEB_ROUTE?>">
                        <input type="hidden" name="controllers" value="responsable">
                        <input type="hidden" name="action" value="<?=isset($classes[0]['id_classe']) ? 'editClasse' : 'ajoutClasse'?>">
                        <input type="hidden" name="id_classe"      value="<?=isset($classes[0]['id_classe']) ? $classes[0]['id_classe'] : ""; ?>">        

                        <div class="form-group mt-3 ">
                            <input type="text" id="" class="fadeIn second" name="nom_classe" value="<?=$classes[0]['nom_classe']?>" placeholder="Entrer le nom de la classe">
                            <small class = " form-text text-danger ">
                                <?= isset($arrayError['nom_classe']) ? $arrayError['nom_classe'] : '' ;?>
                            </small>
                        </div>
                        <div class="mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="filiere" id="">
                                <option><?=$classes[0]['filiere']?></option>
                                    <option>Developpement web</option>
                                    <option>Design numérique</option>
                                    <option>Marketing et communication</option>
                                </select>
                            </div>
                            <div class=" mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="niveau" id=""  >
                                <option><?=$classes[0]['niveau']?></option>
                                    <option>Licence 1</option>
                                    <option>Licence 2</option>
                                    <option>Licence 3</option>
                                    <option>Master 1</option>
                                    <option>Master 2</option>
                                </select>
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
        font-size:32px;
        color:#152032;
    }
</style>