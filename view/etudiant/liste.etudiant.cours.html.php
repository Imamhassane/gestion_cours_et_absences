<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );

?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 liste-cole " style="margin-left:7%">

        <?php if (est_responsable()):?>
            <a name="" id="" class=" mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.nonplanifie' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>
        <?php endif ?>
        <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                        <input type="hidden" name="controllers" value="etudiant">
                        <input type="hidden" name="action" value="filterCoursEtudiant">
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
                                <label for="">Module</label>
                                <select class="form-control ml-2" name="module" id="" value="">
                                <?php foreach ($modules as $module):?>
                                    <option value="<?=$module['libelle_module']?>"><?=$module['libelle_module']?></option>;
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

                                    </tr>
                                </thead>
                                <tbody>
                            <?php if (est_etudiant()):?>
                                <?php foreach ($mycours as $mycour):?>
                                    <tr>
                                        <th><?=date_format(date_create($mycour['date_cours']), 'd-m-Y')?></th>
                                        <td><?=$mycour['debut']?></td>
                                        <td><?=$mycour['fin']?></td>    
                                        <th><?=$mycour['prenom'].' '.$mycour['nom']?></th>
                                        <td><?=$mycour['libelle_module']?></td>
                                        <td><?=$mycour['nom_classe']?></td>
                                        <td><?=$mycour['semestre']?></td>

                                    </tr>    
                                <?php endforeach ?>
                            <?php  endif ?>
                                </tbody>
                    </table>
                </div>
            </div>
            <div class="pagination mt-2 mb-5">    
            <?php  
            	if ($per_page_record == 0){
            	               $total_pages = $total_records / 1;     
            	}else{
            	               $total_pages = $total_records / $per_page_record;   
            	                 }

                $pagLink = ""; 
                                                          
                if($page>=2){   
                    echo "<a href='?controllers=etudiant&view=liste.etudiant.cours&page=".($page-1)."'> <span aria-hidden='true'>&laquo;</span>                    </a>";   
                }       
                        
                for ($i=1; $i<=$total_pages; $i++) {   
                if ($i == $page) {   
                    $pagLink .= "<a class = 'active' href='?controllers=etudiant&view=liste.etudiant.cours&page="  
                                                        .$i."'>".$i." </a>";   
                }               
                else  {   
                    $pagLink .= "<a href='?controllers=etudiant&view=liste.etudiant.cours&page=".$i."'>".$i." </a>";     
                }   
                };     
                echo $pagLink;   
                if($page<$total_pages){   
                    echo "<a href='?controllers=etudiant&view=liste.etudiant.cours&page=".($page+1)."'><span aria-hidden='true'>&raquo;</span>                    </a>";   
                } 
               
            ?>    
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
        padding: 7px 9px;
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
    @media (max-width:1050px){
    
	.row{
	       margin-left: 2%
	    }
    }
   .liste-col .fa-arrow-circle-left{
        font-size:32px;
        color:#152032;
    }
</style>
<?php require ( ROUTE_DIR . 'view/inc/footer.html.php' )?>
