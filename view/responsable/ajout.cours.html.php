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
            <div class="col-md-11 liste-col">
            <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.nonplanifie' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>

            <div class="text-center mb-3"><h2>Planifier un cours</h2></div>
              
                <form method="POST" action="<?=WEB_ROUTE?>" class="form-block">
                        <input type="hidden" name="controllers" value="responsable">
                        <input type="hidden" name="action" value="<?=isset($cours[0]['id_cours'])?'editCours':'ajoutCours'?>">
                        <input type="hidden" name="id_cours"      value="<?=isset($cours[0]['id_cours']) ? $cours[0]['id_cours'] : ""; ?>">        

                          <div class=" col-md-6 mb-4 mt-2">
                          <label for="" class="ml-5">semestre</label>
                                <select class=" select" name="semestre" id="">
                                <option><?=$cours[0]['semestre']?></option>
                                    <option>semestre 1</option>
                                    <option>semestre 2</option>
                                </select>
                                <small class = " form-text text-danger text-left ml-5">
                                        <?= isset($arrayError['semestre']) ? $arrayError['semestre'] : '' ;?>
                                </small>
                            </div>

                            <div class=" col-md-6 mb-4 mt-2">
                            <label for="" class="ml-5">professeur</label>
                                <select class=" select" name="id_user" id="">
                                <option value="<?=$cours[0]['id_user']?>"><?=$cours[0]['prenom'].' '.$cours[0]['nom'].'  '.$cours[0]['specialite']?></option>
                                <?php foreach ($professeurs as $professeur):?>
                                    <option value="<?= $professeur['id_user']?>"><?= $professeur['prenom'].' '.$professeur['nom'].' , '.$professeur['specialite']?></option>
                                <?php endforeach ?>
                                </select>
                                <small class = " form-text text-danger text-left ml-5">
                                        <?= isset($arrayError['id_user']) ? $arrayError['id_user'] : '' ;?>
                                </small>
                            </div>
                            <div class=" col-md-6 mb-4 mt-2">
                            <label for="" class="ml-5">module</label>
                                <select class=" select" name="id_module" id="" >
                                <option value="<?=$cours[0]['id_module']?>"><?=$cours[0]['libelle_module']?></option>   
                                <?php foreach ($modules as $module):?>
                                    <option value="<?= $module['id_module']?>"><?= $module['libelle_module']?></option>
                                <?php endforeach ?>
                             
                                </select>
                                <small class = " form-text text-danger text-left ml-5">
                                        <?= isset($arrayError['id_module']) ? $arrayError['id_module'] : '' ;?>
                                </small>
                            </div>
                            <div class=" col-md-6 mb-4 mt-2">
                                <label for="" class="ml-5">année scolaire</label>
                                <select class=" select" name="id_annee_scolaire" id="" >
                                    <option value="<?=$cours[0]['id_annee_scolaire']?>"><?=$cours[0]['annee_scolaire']?></option>
                                    <?php foreach ($annee_scolaires as $annee_scolaire):?>
                                        <option value="<?= $annee_scolaire['id_annee_scolaire']?>"><?= $annee_scolaire['annee_scolaire']?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class = " form-text text-danger text-left ml-5">
                                        <?= isset($arrayError['id_annee_scolaire']) ? $arrayError['id_annee_scolaire'] : '' ;?>
                                </small>
                            </div>
                            <div class=" col-md-6 mb-4 display">
                                    <div class="col-md-12 p-0 ml-2 ">
                                        <label for="" class="ml-5 mb-5">Choisir les classes</label>
                                    </div>
                                <?php if(isset($cours[0]['id_cours'])):?>
                                    <div class="row p-0  ">
                                        <input type="checkbox" id="" name="classe" value="<?= $cours[0]['id_classe']?>" checked>
                                        <label for=""><?= $cours[0]['nom_classe']?> </label>
                                    </div>
                                <?php endif ?>
                                <?php foreach ($classes as $classe):?>
                                <div class="row p-0 ml-2 ">
                                    <input type="checkbox" id="" name="classe" value="<?= $classe['id_classe']?>">
                                    <label for=""><?= $classe['nom_classe']?> </label>
                                </div>
                                <?php endforeach ?>
                                <small class = " form-text text-danger text-left ml-5">
                                        <?= isset($arrayError['classe']) ? $arrayError['classe'] : '' ;?>
                                </small>
                            </div>
                            <div class=" col-md-6 mb-4 "></div>
                            <div class=" col-md-6 mb-4 "> </div>
                        <input type="submit" class="fadeIn fourth ml-auto mr-auto mt-4" value="<?=isset($cours[0]['id_cours']) ? 'Modifier' : "Creer"; ?>">
                </form>
            </div>
        </div>
    </div>
    <style>
    input[type="checkbox"]{


    margin-top: 6px;
    margin-left: 50px;
    margin-right: 5px;

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
.liste-col .fa{
        font-size:32px;
        color:#152032;
    }
    .display{
        display: contents;
    }
</style>
