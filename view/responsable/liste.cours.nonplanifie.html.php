<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-11  liste-col">
                    <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="" value="">
                        <div class="form-group ml-1">
                            <div class="form-group">
                                <label for="">Année scolaire</label>
                                <select class="form-control ml-2" name="test" id="">
                                <?php foreach ($cours as $cour):?>
                                    <option><? //$cour['annee_scolaire']?></option>;
                                <?php endforeach;?>   
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="" class="btn  ml-3 ">OK</button>
                        <a name="" id="" class="btn btn-primary ml-auto mr-2 " href="<?= WEB_ROUTE . '?controllers=responsable&view=ajout.cours' ?>" role="button">Ajouter +</a>

                    </form>
   
                <div class="column">
                <div class="card">
                <h2 class=" mb-3">LA LISTE DES COURS NON PLANIFIÉS</h2>
                    <table class="table">
                                <thead>
                                    <tr>
                                    
                                        <th scope="col">Professeur</th>
                                        <th scope="col">Module</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Durée</th>
                                        <th scope="col">Planfier</th>
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
                                        <td><?=$cour['duree']?></td>
                                        <td><a name="" id="" class="btn btn-primary ml-auto mr-2 " href="<?= WEB_ROUTE . '?controllers=responsable&view=planing.cours&id_cours='.$cour['id_cours'] ?>" role="button">Planifier</a></td>
                                        <td class="action">
                                            <a name="" id="" class="" href="<?= WEB_ROUTE . '?controllers=responsable&view=modifieCoursPlanifie&id_cours='.$cour['id_cours'] ?>" role="button"><i class="fa fa-edit"></i></a>
                                            <a name="" id="" class="text-danger" href="<?= WEB_ROUTE . '?controllers=responsable&view=deleteCoursPlanifie&id_cours='.$cour['id_cours'] ?>" role="button"><i class="fa fa-trash-o"></i></a>
                                        </td>                                    
                                    </tr>
                                <?php endforeach; ?>
                                  
                                  
                                </tbody>
                                <small class = "form-text text-left ml-5 text-danger">
                                    <?= isset($_SESSION['erreurSuppression']) ? $_SESSION['erreurSuppression'] : '' ;?>
                                    <?php unset($_SESSION['erreurSuppression'])?>
                            </small>
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
        padding: 5px 15px;
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

      
