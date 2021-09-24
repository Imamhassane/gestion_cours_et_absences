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


echo'
<div class="container-fluid p-0">
    <div  id = "message"  class ="alert alert-success text-center">Classe créée avec succès</div>
</div>';
}elseif($_SESSION['message']==2){

    echo'
    <div class="container-fluid p-0">
        <div  id = "message"  class ="alert alert-success text-center">Classe modifié avec succès</div>
    </div>';
}
unset($_SESSION['message']);
?>
        <div class="col-md-11  liste-col">
        <!--  <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                       <input type="hidden" name="controllers" value="responsable">
                        <input type="hidden" name="action" value="filterClasse">
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

                    </form> -->
            
                <div class="column">
                <div class="card">
                    <div class="d-inline">
                        <h2 class="">LA LISTE DES CLASSES</h2>
                        <a name="" id="" class="btn btn-primary ml-auto mr-2 float-right mt-4  " href="<?= WEB_ROUTE . '?controllers=responsable&view=ajout.classe' ?>" role="button">Ajouter +</a>
                    </div>
                    <table class="table" id="classe">
                                <thead>
                                    <tr class="text-left">
                                        <th scope="col">Nom de la classe</th>
                                        <th scope="col">Filière</th>
                                        <th scope="col">Niveau</th>
                                        <!-- <th scope="col">Voir les étudiants<th> -->
                                        <th scope="col">Lister des étudiants</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
<?php foreach ($classes as $classe):?>
                                    <tr class="text-left">
                                        <td><?=$classe['nom_classe']?></td>
                                        <td><?=$classe['filiere']?></td>
                                        <td><?=$classe['niveau']?></td>
                                        <td><a name="" id="" class="btn btn-primary  " href="#" role="button">Voir  les étudiants</a></td>
                                        <td class="action">
                                            <a name="" id="" class="" href="<?= WEB_ROUTE . '?controllers=responsable&view=updateClasse&id_classe='.$classe['id_classe'] ?>" role="button"><i class="fa fa-edit"></i></a>
                                            <a name="" id="" class="text-danger" href="<?= WEB_ROUTE . '?controllers=responsable&view=deleteClasse&id_classe='.$classe['id_classe'] ?>" role="button"><i class="fa fa-trash-o"></i></a>
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
                if($page>=2){   
                    echo "<a href='?controllers=responsable&view=liste.classe&page=".($page-1)."'> <span aria-hidden='true'>&laquo;</span>                    </a>";   
                }       
                        
                for ($i=1; $i<=$total_pages; $i++) {   
                if ($i == $page) {   
                    $pagLink .= "<a class = 'active' href='?controllers=responsable&view=liste.classe&page="  
                                                        .$i."'>".$i." </a>";   
                }               
                else  {   
                    $pagLink .= "<a href='?controllers=responsable&view=liste.classe&page=".$i."'>".$i." </a>";     
                }   
                };     
                echo $pagLink;   
                if($page<$total_pages){   
                    echo "<a href='?controllers=responsable&view=liste.classe&page=".($page+1)."'><span aria-hidden='true'>&raquo;</span>                    </a>";   
                }   
        
            ?>    
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
    .inline{   
                display: inline-block;   
                margin: 20px 0px;   
            }   
            
            input, button{   
                height: 34px;   
            }   
    
        .pagination {   
            display: inline-block;   
        }   
        .pagination a {   
            font-weight:bold;   
            font-size:18px;   
            color: black;   
            float: left;   
            padding: 8px 16px;   
            text-decoration: none;   
            border:1px solid black;   
        }   
        .pagination a.active {   
            background-color: #152032;   
            color: #fff;   
        }   
        .pagination a:hover:not(.active) {   
            background-color: #226AD9;   
            color: #fff;    
            border: 1px solid #226AD9; 
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
