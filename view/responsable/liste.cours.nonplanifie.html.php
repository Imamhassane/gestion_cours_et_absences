<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
$annee_scolaire = find_annee_scolaire();
$classes = find_all_classe();
$modules = find_all_module();
$professeurs = find_all_professeur();
?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 liste-col">
                    <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                        <input type="hidden" name="controllers" value="responsable">
                        <input type="hidden" name="action" value="filterCoursNonplanifie">
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
                       <!--  <div class="form-group ml-4">
                                <label for="">Professeur</label>
                                <select class="form-control ml-2" name="professeur" id="" value="">
                                <?php foreach ($professeurs as $professeur):?>
                                    <option><?=$professeur['prenom'].' '.$professeur['nom']?></option>;
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
                            </div> -->
                            <button type="submit" name="ok" class="btn  ml-3 ">OK</button>

                    </form>

                <div class="column">
                <div class="card">
                    <div class="d-inline">
                            <h2 class=" ">LA LISTE DES COURS NON PLANIFIÉS</h2>
                            <a name="" id="" class="btn btn-primary ml-auto mr-2 float-right mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=ajout.cours' ?>" role="button">Ajouter +</a>
                    </div>
                    <table class="table">

                                <thead>
                                    <tr>
                                    
                                        <th scope="col">Professeur</th>
                                        <th scope="col">Module</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Heure total</th>
                                        <th scope="col">Heure restante</th>
                                        <th scope="col">Planfier</th>
                                        <th scope="col">Cours</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($cours as $cour):?>
                                    <tr>
                                        <th><?=$cour['prenom'].' '.$cour['nom']?> </th>
                                        <td><?=$cour['libelle_module']?></td>
                                        <td><?=$cour['nom_classe']?></td>
                                        <td><?=$cour['semestre']?></td>
                                        <td><?=$cour['heure_total']?></td>
                                        <td><?= $cour['heure_restante'] ?></td><td>
                                            <?php if ($cour['heure_restante'] == 0):?>
                                                <a name="" id="" class="btn btn-primary ml-auto mr-2 disabled" href="<?= WEB_ROUTE . '?controllers=responsable&view=planing.cours&id_cours='.$cour['id_cours'] ?>" role="button">Planifier</a>
                                            <?php else:?>
                                                <a name="" id="" class="btn btn-primary ml-auto mr-2 " href="<?= WEB_ROUTE . '?controllers=responsable&view=planing.cours&id_cours='.$cour['id_cours'] ?>" role="button">Planifier</a>
                                            <?php endif?>
                                        </td>

                                        <td><a name="" id="" class="btn btn-primary ml-auto mr-2 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.perid&id_cours='.$cour['id_cours']?>" role="button">Voir le cours</a></td>
                                        <td class="action">
                                            <a name="" id="" class="" href="<?= WEB_ROUTE . '?controllers=responsable&view=modifieCoursPlanifie&id_cours='.$cour['id_cours'] ?>" role="button"><i class="fa fa-edit"></i></a>
                                            <a name="" id="" class="text-danger" href="<?= WEB_ROUTE . '?controllers=responsable&view=deleteCoursPlanifie&id_cours='.$cour['id_cours'] ?>" role="button"><i class="fa fa-trash-o"></i></a>
                                        </td>                                    
                                    </tr>
                                <?php endforeach; ?>
                                  
                                  
                                </tbody>
                                <small class = "form-text text-left ml-5 text-danger">
                                    <?= isset($_SESSION['erreurSuppression']) ? $_SESSION['erreurSuppression'] : '' ;?>
                                </small>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?php 
unset($_SESSION['erreurSuppression']);
?>

<style>
    .btn{
        background-color: #152032;
        border: none;
        color: white;
        padding: 10px 15px;
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
</style>    

      
