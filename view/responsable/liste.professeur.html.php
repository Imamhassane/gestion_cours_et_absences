<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );

?>

<div class="container-fluid">
<div class="row pr">
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
}elseif($_SESSION['message']==3){
    
        echo'
        <div class="container-fluid p-0">
            <div  id = "message"  class ="alert alert-success text-center">Etudiant réinscrit avec succès</div>
        </div>';
    
}
        unset($_SESSION['message']);
    ?>
        <div class="col-md-11  liste-cole ">
            <?php if(est_attache()):?>
                <div class="row">
                    <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                    <input type="hidden" name="controllers" value="attache">
                        <input type="hidden" name="action" value="filterEtudiant">
                        <div class="form-group ml-4  row">
                            <div class="form-group">
                                <label for="">Année scolaire</label>
                                <select class="form-control ml-2" name="annee" id="">
                                <?php foreach ($annee_scolaire as $annee):?>
                                    <option value="<?=$annee['etat_annee_scolaire'] ?>"><?= $annee['annee_scolaire']?></option>;
                                <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group ml-3 mr-2">
                                <label for="">Classe</label>
                                <select class="form-control ml-2" name="classe" id="">
                                <?php foreach ($rooms as $room):?>
                                    <option value="<?=$room['nom_classe']?>"><?= $room['nom_classe']?></option>;
                                <?php endforeach;?>
                                </select>
                            </div>
                            </div>
                        <button type="submit" name="ok" class="btn  ml-4 ">OK</button>
                    </form>
                    <form method="POST" action="<?=WEB_ROUTE?>" class="d-flex mt-4 ml-5">
                        <input type="hidden" name="controllers" value="attache">
                        <input type="hidden" name="action" value="cherchematricule">

                        <input class="form-control me-2" type="search" name="matricule" placeholder="Saisir le matricule" aria-label="Search">
                            <button class="btn  btnn " name="search" type="submit">Search</button>
                    </form>
                </div>    
            <?php endif ?>
                <div class="column">
                <div class="card">
                    <div class="d-inline">
                            <h2 class=" "><?=est_responsable()?'LA LISTE DES PROFESSEURS':'LA LISTE DES ETUDIANTS'?></h2>
                        <?php if (est_responsable()):?>
                            <a name="" id="" class="btn btn-primary ml-auto mr-2 float-right mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=ajout.professeur' ?>" role="button">Ajouter +</a>
                        <?php endif ?>
                        <?php if(est_attache()):?>
                            <a name="" id="" class="btn btn-primary ml-auto mr-2 float-right mt-4 " href="<?= WEB_ROUTE . '?controllers=attache&view=inscrire.etudiant' ?>" role=""> Inscrire <i class='bx bx-user-plus' ></i> </a>
                        <?php endif?>
                        </div>
                    <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Nom</th>
                                        <?php if (est_responsable()):?>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Spécialité</th>
                                        <?php endif ?>
                                        <?php if (est_attache()):?>
                                                <th scope="col">Matricule</th>
                                                <th scope="col">Classe</th>
                                                <?php if (isset($_POST['search'])):?>
                                                    <th scope="col">Réinscrire</th>
                                                <?php endif ?>
                                        <?php endif ?>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

<?php if (est_responsable()):?>
<?php foreach ($professeurs as $professeur):?>
                                    <tr>
                                        <td><?=$professeur['prenom']?></td>
                                        <td><?=$professeur['nom']?></td>
                                        <td><?=$professeur['grade']?></td>
                                        <td><?=$professeur['specialite']?></td>
                                        <td class="action">
                                            <a name="" id="" class="" href="<?= WEB_ROUTE . '?controllers=responsable&view=updateUser&id_user='.$professeur['id_user'] ?>" role="button"><i class="fa fa-edit "></i></a>
                                            <a name="" id="" class="text-danger" href="<?= WEB_ROUTE . '?controllers=responsable&view=deleteUser&id_user='.$professeur['id_user'] ?>" role="button"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        
                                    </tr>
<?php endforeach ?>
<?php endif ?>
<?php if (est_attache()):?>
<?php foreach ($etudiants as $etudiant):?>
                                    <tr>
                                        <td><?=$etudiant['prenom']?></td>
                                        <td><?=$etudiant['nom']?></td>
                                        <td><?=$etudiant['matricule']?></td>
                                        <td><?=$etudiant['nom_classe']?></td>
                                        <?php if (isset($_POST['search'])):?>
                                            <td class="action">
                                                <a name="" id="" class="btn btn-primary ml-auto " href="<?=WEB_ROUTE.'?controllers=responsable&view=updateUser&id_user='.$etudiant['id_user']?>"ole="button">Réinscrire </a>
                                            </td>
                                        <?php endif ?>
                                        <td class="action">
                                            <a name="" id="" class="btn btn-primary ml-auto " href="<?=WEB_ROUTE.'?controllers=attache&view=liste.absence.etudiant&id_user='.$etudiant['id_user']?>"ole="button">Voir les absences </a>
                                        </td>
                                  
                                    </tr>
<?php endforeach ?>
<?php endif ?>
                            </tbody>
                            <small class = "form-text text-left ml-5 text-danger">
                                    <?= isset($_SESSION['erreurSuppression']) ? $_SESSION['erreurSuppression'] : '' ;?>
                                    <?php unset($_SESSION['erreurSuppression'])?>
                            </small>
                    </table> 
                </div>
            </div>
            <div class="pagination mt-2 mb-5">    
            <?php  
                $total_pages = $total_records / $per_page_record;     
                $pagLink = ""; 
            if (est_responsable()) {
                                                          
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
                    
            }elseif(est_attache()){ 

                   if($page>=2){   
                        echo "<a href='?controllers=attache&view=liste.etudiant&page=".($page-1)."'> <span aria-hidden='true'>&laquo;</span>                    </a>";   
                    }       
                            
                    for ($i=1; $i<=$total_pages; $i++) {   
                    if ($i == $page) {   
                        $pagLink .= "<a class = 'active' href='?controllers=attache&view=liste.etudiant&page="  
                                                            .$i."'>".$i." </a>";   
                    }               
                    else  {   
                        $pagLink .= "<a href='?controllers=attache&view=liste.etudiant&page=".$i."'>".$i." </a>";     
                    }   
                    };     
                    echo $pagLink;   
                    if($page<$total_pages){   
                        echo "<a href='?controllers=attache&view=liste.etudiant&page=".($page+1)."'><span aria-hidden='true'>&raquo;</span>                    </a>";   
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
        margin-top: 2px;
    }
 .action .fa{
    width: 22px;
    height: 26px;
    font-size: 20px;
    display: inline-block;

}
.liste-cole{
    margin-left: 5%
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

      
<script type="text/javascript">
// $( document ).ready(function() {
//     console.log( "ready!" );
//     ;$('.toast').toast("show")
// })

$(document).ready(function(){
        $("#message").show().fadeIn(3000).css("color","blue")
    });
</script>
<?php
require ( ROUTE_DIR . 'view/inc/footerCharjs.html.php' );
?>
