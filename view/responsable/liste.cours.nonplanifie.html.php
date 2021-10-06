<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );

?> 
<?php if ($_SESSION['message']==1) {


    echo'
    <div class="container-fluid p-0">
        <div  id = "message"  class ="alert alert-success text-center">Cours créée avec succès</div>
    </div>';
    }elseif($_SESSION['message']==2){
    
        echo'
        <div class="container-fluid p-0">
            <div  id = "message"  class ="alert alert-success text-center">Cours modifié avec succès</div>
        </div>';
    }
    unset($_SESSION['message']);
    ?>

<div class="container-fluid ">
    <div class="row cousplan">
        <div class="col-md-11 liste-cole mb-5 ">
                    <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                        <input type="hidden" name="controllers" value="responsable">
                        <input type="hidden" name="action" value="filterCoursNonplanifie">
                        <div class="form-group ml-2 top">
                            <div class="form-group">
                                <label for="">Année scolaire</label>
                                <select class="form-control ml-2" name="annee" id="" value="">
                                <?php foreach ($annee_scolaires as $annee):?>
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

                <!-- <div class="column">
                <div class="card"> -->
                    <div class="d-inline">
                            <h2 class=" ">LA LISTE DES COURS </h2>
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
                                        <th scope="col">Séance</th>
                                        <th scope="col">Cours</th>
                                        <th scope="col">Classes </th>
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
                                                        <a name="" id="" class="btn btn-primary float-right mr-2 disabled" href="<?= WEB_ROUTE . '?controllers=responsable&view=planing.cours&id_cours='.$cour['id_cours'] ?>" role="button">Séance</a>
                                                <?php else:?>
                                                        <a name="" id="" class="btn btn-primary  mr-2 float-right" href="<?= WEB_ROUTE . '?controllers=responsable&view=planing.cours&id_cours='.$cour['id_cours'] ?>" role="button">Séance</a>
                                                <?php endif?>
                                            </td>
                                            <td>
                                                <a name="" id="" class="btn btn-primary float-right mr-2 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.perid&id_classe='.$cour['id_classe']?>" role="button">Voir cours</a>
                                            </td>
                                            <td>
                                                <a name="" id="" class="btn btn-primary float-center mr-2 " href="<?= WEB_ROUTE . '?controllers=responsable&view=classe.concernees&id_cours='.$cour['id_cours']?>" role="button">Voir classes</a>
                                            </td>
                                            <td class="action">
                                                <a name="" id="" class="btn btn-primary float-right mr-2 " href="<?= WEB_ROUTE . '?controllers=responsable&view=updateCours&id_cours='.$cour['id_cours'] ?>" role="button">modifier <i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                                                  
                        </table>
                        <div class="pagination mt-2 mb-5">    
                            <?php  
                                
                                $total_pages = $total_records / $per_page_record;     
                                $pagLink = "";                                           
                                if($page>=2){   
                                    echo "<a href='?controllers=responsable&view=liste.cours.nonplanifie&page=".($page-1)."'> <span aria-hidden='true'>&laquo;</span></a>";   
                                }       
                                        
                                for ($i=1; $i<=$total_pages; $i++) {   
                                if ($i == $page) {   
                                    $pagLink .= "<a class = 'active' href='?controllers=responsable&view=liste.cours.nonplanifie&page="  
                                                                        .$i."'>".$i." </a>";   
                                }               
                                else  {   
                                    $pagLink .= "<a href='?controllers=responsable&view=liste.cours.nonplanifie&page=".$i."'>".$i." </a>";     
                                }   
                                };     
                                echo $pagLink;   
                                if($page<$total_pages){   
                                    echo "<a href='?controllers=responsable&view=liste.cours.nonplanifie&page=".($page+1)."'><span aria-hidden='true'>&raquo;</span></a>";   
                                }   
                        
                            ?>    
                        </div> 
        </div>
    </div>
</div>
<?php 
unset($_SESSION['erreurSuppression']);
?>
<script type="text/javascript">
$(document).ready(function(){
        $("#message").show().fadeIn(3000).css("color","blue")
    });
</script>
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
    width: 15px;
    height: 16px;
    font-size: 15px;
    margin-left: 4px;
    display: inline-block;

}
    .fa-edit{
        color:#fff;
    }
    .inline{ 
            display: inline-block;   
            margin: 20px 0px;   
            }   
            
            input, button{   
                height: 34px;   
            }   

        
        </style>     
<?php require ( ROUTE_DIR . 'view/inc/footer.html.php' )?>