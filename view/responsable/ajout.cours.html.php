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
            <div class="text-center mb-3"><h2 >Ajouter un cours</h2></div>
              
                <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline">
                        <input type="hidden" name="controllers" value="responsable">
                        <input type="hidden" name="action" value="ajoutCours">
                        <!-- <input type="hidden" name="action" value="<?=isset($question['id']) ? 'edit': 'question' ?>">
                        <input type="hidden" name="id_cours"     value="<?=isset($question['id']) ? $question['id'] : ""; ?>">    -->
                            <div class=" col-md-6 mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="semestre" id="">
                                    <option>semestre 1</option>
                                    <option>semestre 2</option>
                                </select>
                            </div>
                            <div class=" mb-2 col-md-6 ">
                                <input type="number" name="duree" placeholder="Durée">
                                <small class = "text-left ml-5 form-text text-danger ">
                                    <?= isset($arrayError['duree']) ? $arrayError['duree'] : '' ;?>
                                </small>
                            </div>
                            <div class=" col-md-6 mb-4 mt-2">
                                <select class=" select" name="id_user" id="">
                                <?php foreach ($professeurs as $professeur):?>
                                    <option value="<?= $professeur['id_user']?>"><?= $professeur['prenom'].' '.$professeur['nom'].' , '.$professeur['specialite']?></option>
                                <?php endforeach ?>
                                   
                                </select>
                            </div>
                            <div class=" col-md-6 mb-4 mt-2">
                                <select class=" select" name="id_module" id="" >
                                <?php foreach ($modules as $module):?>
                                    <option value="<?= $module['id_module']?>"><?= $module['libelle_module']?></option>
                                <?php endforeach ?>
                                </select>
                            </div>
                            <div class=" col-md-6 mb-4 mt-2">
                                <select class=" select" name="id_annee_scolaire" id="" >
                                <?php foreach ($annee_scolaires as $annee_scolaire):?>
                                    <option value="<?= $annee_scolaire['id_annee_scolaire']?>"><?= $annee_scolaire['annee_scolaire']?></option>
                                <?php endforeach ?>
                                </select>
                            </div>
                            <div class=" col-md-6 mb-4 ">
                            <label for="" class="ml-5 mb-3">Choisir les classes</label>
                                <?php foreach ($classes as $classe):?>
                                <div class="row p-0 ml-2 ">
                                    <input type="checkbox" id="" name="classe" value="<?= $classe['id_classe']?>">
                                    <label for=""><?= $classe['nom_classe']?> </label>
                                </div>
                                <?php endforeach ?>
                                <small class = " form-text text-danger text-left">
                                        <?= isset($arrayError['classe']) ? $arrayError['classe'] : '' ;?>
                                </small>
                            </div>
                            
                        <input type="submit" class="fadeIn fourth ml-auto mr-auto mt-4" value="Creer">
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
</style>
    