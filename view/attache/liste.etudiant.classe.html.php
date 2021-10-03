<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-10  liste-col">
             <?php if(est_attache() || est_responsable()):?>
                <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=attache&view=liste.classe' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>
            <?php endif?>
            <?php if(est_professeur()):?>
                <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=professeur&view=liste.cours.professeur' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>
            <?php endif?>

            <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-2">
                       <input type="hidden" name="controllers" value="attache">
                        <input type="hidden" name="action" value="filterEtudiantclasse">
                        <div class="form-group ml-2">
                            <div class="form-group">
                                <label for="">Année scolaire</label>
                                <select class="form-control ml-2" name="annee" id="" value="">
                                <?php foreach ($annee_scolaire as $annee):?>
                                    <option value="<?=$annee['etat_annee_scolaire']?>"><?=$annee['annee_scolaire']?></option>;
                                <?php endforeach?>   
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="ok" class="btn  ml-3 ">OK</button>
                </form>
        <div class="text-center mb-3"><h2 ><?=isset($students[0])?'LES etudiants DE la classe '.$students[0]['nom_classe']:'Cette classe n\'a pas d\'étudiant'?></h2></div>
            <div class="column">
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Prenom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Matricule</th>
                            <th scope="col">Classe</th>
                            <?php if(est_attache()):?>
                                <th scope="col">Action</th>
                            <?php endif ?>
                            <?php if(est_professeur()):?>
                                <th scope="col">Marquer absent (e)</th>
                            <?php endif ?>
                            </tr>
                        </thead>
                        <tbody> 
<?php foreach ($students as $student):?>
                                    <tr>
                                        <td><?=$student['prenom']?></td>
                                        <td><?=$student['nom']?></td>
                                        <td><?=$student['matricule']?></td>
                                        <td><?=$student['nom_classe']?></td>
                                        <?php if(est_attache()):?>
                                        <td class="action">
                                            <a name="" id="" class="btn btn-primary ml-auto " href="<?=WEB_ROUTE.'?controllers=attache&view=liste.absence.etudiant&id_user='.$student['id_user']?>"ole="button">Voir les absences </a>
                                        </td> 
                                        <?php endif ?>
                                        <?php if(est_professeur()):?>
                                        <td class="action">
                                            <form method="post" action="<?=WEB_ROUTE?>">
                                                <input type="hidden" name="controllers" value="professeur">
                                                <input type="hidden" name="action" value="marquerAbsent">
                                                    <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="absent[]" id="" value="<?=$student['id_user']?>" >
                                                        Absent
                                                    </label>
                                                    </div>
                                        </td> 
                                        <?php endif ?>
                                    </tr>
<?php endforeach ?>

                        </tbody>
                    </table>
                </div>
                <?php if(est_professeur()):?>
                    <input type="submit" class="fadeIn fourth ml-auto mr-auto mt-4" value="Valider">
                <?php endif ?>
                </form>

            </div>
        </div>
    </div>
</div>
<style>
      .btn{
        background-color: #152032;
        border: none;
        color: white;
        padding: 7px 9px;
        text-align: center;
        text-decoration: none;
        font-size: 13px;    
    }
</style>
    