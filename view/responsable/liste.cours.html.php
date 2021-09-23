 <?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
$annee_scolaire = find_annee_scolaire();

?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-11  liste-col">
        <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.nonplanifie' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>

                    <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="" value="">
                        <div class="form-group ml-1">
                            <!-- <div class="form-group">
                                <label for="">Année scolaire</label>
                                <select class="form-control ml-2" name="annee" id="" value="">
                                <?php foreach ($annee_scolaire as $annee):?>
                                    <option><?=$annee['annee_scolaire']?></option>;
                                <?php endforeach?>   
                                </select>
                            </div> -->
                        </div>
                      <!--   <button type="submit" name="" class="btn  ml-3 disabled">OK</button> -->
                      
                    </form>
                <div class="column">
                <div class="card">
                <div class="d-inline">
                        <a name="" id="" class="btn btn-primary ml-auto mr-2 float-right mt-4  " href="<?= WEB_ROUTE . '?controllers=responsable&view=ajout.cours' ?>" role="button">Ajouter +</a>
                        <a name="" id="" class="btn btn-primary ml-auto mr-2 float-right mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.nonplanifie' ?>" role="button">Voir les cours non planifiés</a>
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
