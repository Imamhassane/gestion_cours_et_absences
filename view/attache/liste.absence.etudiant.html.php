<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );

?>

<div class="container-fluid">
<div class="row">
    <?php
if ($_SESSION['message']==1) {

if(est_responsable()){
    echo'
    <div class="container-fluid p-0">
        <div  id = "message"  class ="alert alert-success text-center">Professeur créée avec succès</div>
    </div>';
}elseif(est_attache()){
    echo'
    <div class="container-fluid p-0">
        <div  id = "message"  class ="alert alert-success text-center">Etudiant inscrit avec succès</div>
    </div>';
}
    
    }elseif($_SESSION['message']==2){
    
        if(est_responsable()){
            echo'
            <div class="container-fluid p-0">
                <div  id = "message"  class ="alert alert-success text-center">Professeur modifié avec succès</div>
            </div>';
        }elseif(est_attache()){
            echo'
            <div class="container-fluid p-0">
                <div  id = "message"  class ="alert alert-success text-center">Etudiant modifié avec succès</div>
            </div>';
        }
    }
    unset($_SESSION['message']);
    ?>
        <div class="col-md-10 liste-col">
        <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=attache&view=liste.etudiant' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>

                    <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-5">
                        <input type="hidden" name="controllers" value="attache">
                        <input type="hidden" name="action" value="filterAbsence">
                        <div class="form-group ml-1">
                            <div class="form-group">
                                <label for="">Année scolaire</label>
                                <select class="form-control ml-2" name="annee" id="">
                                <?php foreach ($annee_scolaires as $annee):?>
                                    <option value="<?=$annee['id_annee_scolaire']?>"><?=$annee['annee_scolaire']?></option>;
                                <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group ml-3">
                                <label for="">Semestre</label>
                                <select class="form-control ml-2" name="semestre" id="">
                                    <option value="semestre 1">Semestre 1</option>
                                    <option value="semestre 2">Semestre 2</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="ok" class="btn  ml-3 ok-btn">OK</button>
                    </form>
                <div class="column">
                <div class="card">
                    <div class="d-inline">
                            <h2 class=" "> <?=isset($absences[0])?'LES ABSENCES DE '.$absences[0]['prenom'].' '.$absences[0]['nom']:'Cet étudiant n\'a pas d\'absence'?></h2>
                       
                        </div>
                    <table class="table">
                                <thead>
                                    <tr>
                                        <th >Prénom</th>
                                        <th >Nom</th>
                                        <th >Matricule</th>
                                        <th >Cours</th>
                                        <th >Heure de début </th>
                                        <th >Heure de fin </th>
                                        <th >Durée</th>
                                        <th >Semestre</th>


                                    </tr>
                                </thead>
                                <tbody>


<?php foreach ($absences as  $absence):?>
                                    <tr>
                                        <td><?=$absence['prenom']?></td>
                                        <td><?=$absence['nom']?></td>
                                        <td><?=$absence['matricule']?></td>
                                        <td><?=$absence['libelle_module']?></td>
                                        <td><?=$absence['debut']?></td>
                                        <td><?=$absence['fin']?></td>
                                        <td><?=($absence['fin'] - $absence['debut'])?></td>
                                        <td><?=$absence['semestre']?></td>
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

 