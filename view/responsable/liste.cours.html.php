 <?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );

?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-11 liste-cole">
        <?php if (est_responsable()):?>
            <a name="" id="" class=" mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.nonplanifie' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>
        <?php endif ?>
                <?php if (est_responsable()):?>
                    <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                        <input type="hidden" name="controllers" value="<?=est_attache()?'attache':'responsable'?>">
                        <input type="hidden" name="action" value="filterCours">
                        <div class="form-group ml-2 top">
                            <div class="form-group">
                                <label for="">Heure de début</label>
                                <select class="form-control ml-2" name="debut" id="" value="">
                                <?php foreach ($planings as $planing):?>
                                    <option ><?=$planing['debut']?></option>;
                                <?php endforeach?>   
                                </select>
                            </div>
                        </div>
                         <div class="form-group ml-4">
                                <label for="">Heure de fin</label>
                                <select class="form-control ml-2" name="fin" id="" value="">
                                <?php foreach ($planings as $planing):?>
                                    <option><?=$planing['fin']?></option>;
                                <?php endforeach?>   
                                </select>
                        </div>
                        
                            <button type="submit" name="ok" class="btn  ml-3 ok-btn">OK</button>
                    </form>
                <?php endif ?>
                <?php if(est_attache()):?>
                    <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                       <input type="hidden" name="controllers" value="attache">
                        <input type="hidden" name="action" value="filterCoursAttache">
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
                <?php endif ?>
                <div class="column">
                <div class="card">
                <div class="d-inline">
 
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
                                        <th><?=$all_cour['prenom'].' '.$all_cour['nom']?></th>
                                        <td><?=$all_cour['libelle_module']?></td>
                                        <td><?=$all_cour['nom_classe']?></td>
                                        <td><?=$all_cour['semestre']?></td>
                                        <td class="action">
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
            <div class="pagination mt-2 mb-5">    
            <?php  
                if (est_attache()) {
               
                    $total_pages = $total_records / $per_page_record;     
                    $pagLink = "";                                                           
                    if($page>=2){   
                        echo "<a href='?controllers=attache&view=liste.cours&page=".($page-1)."'> <span aria-hidden='true'>&laquo;</span>                    </a>";   
                    }       
                            
                    for ($i=1; $i<=$total_pages; $i++) {   
                    if ($i == $page) {   
                        $pagLink .= "<a class = 'active' href='?controllers=attache&view=liste.cours&page="  
                                                            .$i."'>".$i." </a>";   
                    }               
                    else  {   
                        $pagLink .= "<a href='?controllers=attache&view=liste.cours&page=".$i."'>".$i." </a>";     
                    }   
                    };     
                    echo $pagLink;   
                    if($page<$total_pages){   
                        echo "<a href='?controllers=attache&view=liste.cours&page=".($page+1)."'><span aria-hidden='true'>&raquo;</span>                    </a>";   
                    } 
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

   .liste-col .fa-arrow-circle-left{
        font-size:32px;
        color:#152032;
    }
</style>
<?php require ( ROUTE_DIR . 'view/inc/footer.html.php' )?>