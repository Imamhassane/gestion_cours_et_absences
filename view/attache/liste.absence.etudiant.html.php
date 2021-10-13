<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );

?>
<?php 
if ($_SESSION['message']==1) {
echo'
<div class="container-fluid p-0">
    <div  id = "message"  class ="alert alert-success text-center">Absence justifiée avec succès</div>
</div>';
}if ($_SESSION['message']==2) {
    echo'
    <div class="container-fluid p-0">
        <div  id = "message"  class ="alert alert-danger text-center">Erreur ! Absence déjà justifiée </div>
    </div>';
    }
unset($_SESSION['message']);
?>
<div class="container-fluid">
<div class="row ml-2">
        <div class="col-md-11 liste-cole">
            <?php if(est_attache()):?>
                <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=attache&view=liste.etudiant' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>
            <?php endif ?>
           
                    
                    <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-2 ml-2">
                        <input type="hidden" name="controllers" value="attache">
                        <input type="hidden" name="action" value="filterAbsence">
                        <div class="form-group ml-1 row">
                            <div class="form-group">
                                <label for="">Année scolaire</label>
                                <select class="form-control ml-2" name="annee" id="">
                                <?php foreach ($annee_scolaires as $annee):?>
                                    <option value="<?=$annee['etat_annee_scolaire']?>"><?=$annee['annee_scolaire']?></option>;
                                <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group ml-3 mr-2">
                                <label for="">Semestre</label>
                                <select class="form-control ml-2" name="semestre" id="">
                                    <option value="semestre 1">Semestre 1</option>
                                    <option value="semestre 2">Semestre 2</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="ok" class="btn  ml-4 ok-btn">OK</button>
                    </form>
                <div class="column">
                <div class="card">
                    <div class="d-inline">
                        
                        <?php if (est_attache()):?>
                            <h2 class=" "> <?=isset($absences[0])?'LES ABSENCES DE '.$absences[0]['prenom'].' '.$absences[0]['nom']:'Cet étudiant n\'a pas d\'absence'?></h2>
                        <?php endif ?>

                        <?php if (est_etudiant()):?>
                            <h2 class="ml-5 "><?='Prénom & nom : '.$absences[0]['prenom'].' '.$absences[0]['nom'].' / Matricule : '.$absences[0]['matricule']?> </h2>
                        <?php endif ?>
                        
                        <?php if ($nombreAbsence[0]["duree"]!=0):?>
                            <div class="float-right mt-4 mr-3">
                                <h6 class=" mt-3"><strong><?=est_etudiant()? 'Vous avez '.$nombreAbsence[0]["duree"]:'Cet étudiant a '.$nombreAbsence[0]["duree"]?> heures d'absences</strong> <h6>
                            </div>
                        <?php endif ?>

                    </div>  
                    <table class="table">
                                <thead>
                                    <tr>
                        
                                        <th >Cours</th>
                                        <th >Date d'absence</th>
                                        <th >Début </th>
                                        <th >Fin </th>
                                        <th >Semestre</th>
                                        <?php if (est_etudiant()):?>
                                            <th >Action</th>
                                        <?php endif ?>
                                    </tr>
                                </thead>
                                <tbody>


<?php foreach ($absences as  $absence):?>
                                    <tr>
                                        <td><?=$absence['libelle_module']?></td>
                                        <td><?=$absence['date_absence']?></td>
                                        <td><?=$absence['debut']?></td>
                                        <td><?=$absence['fin']?></td>
                                        <td><?=$absence['semestre']?></td>
                                        <?php if (est_etudiant()):?>
                                            <?php if ($absence['etat_absence']=='justifiee'):?>
                                                <td><a name="" id="" class="btn btn-primary ml-auto disabled" href="<?=WEB_ROUTE.'?controllers=etudiant&view=justification&id_absence='.$absence['id_absence']?>"ole="button"> Justifier <i class='bx bx-edit-alt ' ></i></a></td>
                                            <?php else: ?>
                                                <td><a name="" id="" class="btn btn-primary ml-auto " href="<?=WEB_ROUTE.'?controllers=etudiant&view=justification&id_absence='.$absence['id_absence']?>"ole="button"> Justifier <i class='bx bx-edit-alt ' ></i></a></td>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </tr>
<?php endforeach ?>

                            </tbody>

                    </table> 
                </div>
            </div>
            <div class="pagination mt-2 mb-5">    
            <?php  
             /*    $total_pages = $total_records / $per_page_record;     
                $pagLink = ""; 
                                                          
                if($page>=2){   
                    echo "<a href='?controllers=responsable&view=liste.professeur&page=".($page-1)."'> <span aria-hidden='true'>&laquo;</span>                    </a>";   
                }       
                        
                for ($i=1; $i<=$total_pages; $i++) {   
                if ($i == $page) {   
                    $pagLink .= "<a class = 'active' href='?controllers=responsable&view=liste.professeur&page="  
                                                        .$i."'>".$i." </a>";   
                }               
                else  {   
                    $pagLink .= "<a href='?controllers=responsable&view=liste.professeur&page=".$i."'>".$i." </a>";     
                }   
                };     
                echo $pagLink;   
                if($page<$total_pages){   
                    echo "<a href='?controllers=responsable&view=liste.professeur&page=".($page+1)."'><span aria-hidden='true'>&raquo;</span>                    </a>";   
                } 
               */
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
    .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
      

</style>    

<?php require ( ROUTE_DIR . 'view/inc/footer.html.php' )?>