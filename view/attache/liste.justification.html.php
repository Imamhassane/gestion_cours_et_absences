<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
$annee_scolaire = find_annee_scolaire();

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
                    <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                        <!-- <input type="hidden" name="" value="">
                        <input type="hidden" name="" value="">
                        <div class="form-group ml-1">
                            <div class="form-group">
                                <label for="">Année scolaire</label>
                                <select class="form-control ml-2" name="annee" id="">
                                <?php foreach ($annee_scolaire as $annee):?>
                                    <option><?= $annee['annee_scolaire']?></option>;
                                <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="ok" class="btn  ml-3 ">OK</button> -->

                    </form>
                <div class="column">
                <div class="card">
                    <div class="d-inline">
                            <h2 class=" ">LA LISTE DES JUSTIFICATIONS</h2>
                    </div>
                    <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Nom</th>
                                            <th scope="col">Détails</th>
                                            <th scope="col">Etat</th>
                                           
                                    </tr>
                                </thead>
                                <tbody>

<?php foreach ($professeurs as $professeur):?>
                                    <tr>
                                        <td><?=$professeur['prenom']?></td>
                                        <td><?=$professeur['nom']?></td>
                                        <td><?=$professeur['grade']?></td>
                                        <td><?=$professeur['specialite']?></td>
                                        <td class="action">
                                            <a name="" id="" class="" href="<?= WEB_ROUTE . '?controllers=responsable&view=updateUser&id_user='.$professeur['id_user'] ?>" role="button"><i class="fa fa-edit"></i></a>
                                            <a name="" id="" class="text-danger" href="<?= WEB_ROUTE . '?controllers=responsable&view=deleteUser&id_user='.$professeur['id_user'] ?>" role="button"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        
                                    </tr>
<?php endforeach ?>

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
            
                                                          
            
       
    /*                 if($page>=2){   
                        echo "<a href='?controllers=responsable&view=liste.etudiant.classe&page=".($page-1)."'> <span aria-hidden='true'>&laquo;</span>                    </a>";   
                    }       
                            
                    for ($i=1; $i<=$total_pages; $i++) {   
                    if ($i == $page) {   
                        $pagLink .= "<a class = 'active' href='?controllers=responsable&view=liste.etudiant.classee="  
                                                            .$i."'>".$i." </a>";   
                    }               
                    else  {   
                        $pagLink .= "<a href='?controllers=responsable&view=liste.etudiant.classe&page=".$i."'>".$i." </a>";     
                    }   
                    };     
                    echo $pagLink;   
                    if($page<$total_pages){   
                        echo "<a href='?controllers=responsable&view=liste.etudiant.classe&page=".($page+1)."'><span aria-hidden='true'>&raquo;</span>                    </a>";   
                    }  */
                
                 
        
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

      
<script type="text/javascript">
// $( document ).ready(function() {
//     console.log( "ready!" );
//     ;$('.toast').toast("show")
// })

$(document).ready(function(){
        $("#message").show().fadeIn(3000).css("color","blue")
    });
</script>