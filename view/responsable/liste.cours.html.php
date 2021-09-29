 <?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );

?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 liste-col">
        <?php if (est_responsable()):?>
            <a name="" id="" class=" mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.nonplanifie' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>
        <?php endif ?>
        <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                        <input type="hidden" name="controllers" value="attache">
                        <input type="hidden" name="action" value="filterCours">
                        <div class="form-group ml-2 top">
                            <div class="form-group">
                                <label for="">Année scolaire</label>
                                <select class="form-control ml-2" name="annee" id="" value="">
                                <?php foreach ($annee_scolaire as $annee):?>
                                    <option value="<?=$annee['etat_annee_scolaire']?>"><?=$annee['annee_scolaire']?></option>;
                                <?php endforeach?>   
                                </select>
                            </div>
                        </div>
                         <div class="form-group ml-4">
                                <label for="">Professeur</label>
                                <select class="form-control ml-2" name="professeur" id="" value="">
                                <?php foreach ($professeurs as $professeur):?>
                                    <option><?=$professeur['prenom']?></option>;
                                <?php endforeach?>   
                                </select>
                            </div>
                         <div class="form-group ml-4">
                                <label for="">Module</label>
                                <select class="form-control ml-2" name="module" id="" value="">
                                <?php foreach ($modules as $module):?>
                                    <option><?=$module['libelle_module']?></option>;
                                <?php endforeach?>   
                                </select>
                            </div>
                            <div class="form-group ml-4">
                                <label for="">Classe</label>
                                <select class="form-control ml-2" name="classe" id="" value="">
                                <?php foreach ($classes as $classe):?>
                                    <option><?=$classe['nom_classe']?></option>
                                <?php endforeach?>   
                                </select>
                            </div>
                            <button type="submit" name="ok" class="btn  ml-3 ok-btn">OK</button>
                    </form> 
                <div class="column">
                <div class="card">
                <div class="d-inline">
                    <?php if (est_responsable()):?>
                        <a name="" id="" class="btn btn-primary ml-auto mr-2 float-right mt-4  " href="<?= WEB_ROUTE . '?controllers=responsable&view=ajout.cours' ?>" role="button">Ajouter +</a>
                        <a name="" id="" class="btn btn-primary ml-auto mr-2 float-right mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.nonplanifie' ?>" role="button">Voir les cours non planifiés</a>
                    <?php endif ?>   
                        <h2 class=" mb-3">LA LISTE DES COURS </h2>  
                </div>
               
                    <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Début</th>
                                    <th scope="col">Fin</th>
                                    <th scope="col">Professeur</th>
                                    <th scope="col">Module</th>
                                    <th scope="col">Classe</th>
                                    <th scope="col">Semestre</th>
                                    <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                            <?php if (est_responsable()):?>
                                <?php foreach ($all_cours as $all_cour):?>
                                    <tr>
                                        <th><?=date_format(date_create($all_cour['date_cours']), 'd-m-Y')?></th>
                                        <td><?=$all_cour['debut']?></td>
                                        <td><?=$all_cour['fin']?></td>
                                        <th><?=$all_cour['prenom'].' '.$all_cours['nom']?></th>
                                        <td><?=$all_cour['libelle_module']?></td>
                                        <td><?=$all_cour['nom_classe']?></td>
                                        <td><?=$all_cour['semestre']?></td>
                                        <td class="action">
                                            <a name="" id="" class="" href="#" role="button"><i class="fa fa-edit"></i></a>
                                            <a name="" id="" class="text-danger" href="<?= WEB_ROUTE . '?controllers=responsable&view=deleteCours&id_planing='.$all_cour['id_planing'] ?>" role="button"><i class="fa fa-trash-o"></i></a>
                                        </td> 
                                    </tr>    
                                <?php endforeach ?>
                            <?php  endif ?>


                            <?php if (est_attache()):?>
                                <?php foreach ($coursAttaches as $coursAttache):?>
                                    <tr>
                                        <th><?=date_format(date_create($coursAttache['date_cours']), 'd-m-Y')?></th>
                                        <td><?=$coursAttache['debut']?></td>
                                        <td><?=$coursAttache['fin']?></td>
                                        <th><?=$coursAttache['prenom'].' '.$coursAttache['nom']?></th>
                                        <td><?=$coursAttache['libelle_module']?></td>
                                        <td><?=$coursAttache['nom_classe']?></td>
                                        <td><?=$coursAttache['semestre']?></td>
                                        <td class="action">
                                        <a name="" id="" class="btn btn-primary ml-auto " href="<?=WEB_ROUTE.'?controllers=attache&view=liste.absence.cours&id_cours='.$coursAttache['id_cours']?>"ole="button">Voir les absences </a>
                                        </td> 
                                    </tr>    
                                <?php endforeach ?>
                            <?php  endif ?>
                                </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn{
        background-color: #152032;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        font-size: 13px;    
    }
    .action .fa{
    width: 22px;
    height: 26px;
    font-size: 20px;
    display: inline-block;

}
    .fa-edit{
        color:#152032;
        margin-top: 5px;
    }

   .liste-col .fa-arrow-circle-left{
        font-size:32px;
        color:#152032;
    }
</style>
