<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>
<?php if ($_SESSION['message']==4) {
echo'
<div class="container-fluid p-0">
    <div  id = "message"  class ="alert alert-success text-center">Absence(s) enregistrée(s) avec succès</div>
</div>';
}elseif($_SESSION['message']==5){

    echo'
    <div class="container-fluid p-0">
        <div  id = "message"  class ="alert alert-danger text-center">Aucune absence n\'a été enregistré</div>
    </div>';
}
unset($_SESSION['message']);
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-10 mt-3 liste-cole">
        <div class="text-center mb-3"><h2 >LA LISTE DE mes cours</h2></div>
            <div class="column">
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Début</th>
                                    <th scope="col">Fin</th>
                                    <th scope="col">Module</th>
                                    <th scope="col">Classe</th>
                                    <th scope="col">Semestre</th>
                                    <th scope="col">Etudiants de la classe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($coursProfesseur as $professeur):?>
                                <tr>
                                        <th><?=date_format(date_create($professeur['date_cours']), 'd-m-Y')?></th>
                                        <td><?=$professeur['debut']?></td>
                                        <td><?=$professeur['fin']?></td>    
                                        <td><?=$professeur['libelle_module']?></td>
                                        <td><?=$professeur['nom_classe']?></td>
                                        <td><?=$professeur['semestre']?></td>
                                        <td><a name="" id="" class="btn btn-primary" href="<?= WEB_ROUTE.'?controllers=attache&view=liste.etudiant.classe&id_planing='.$professeur['id_planing'] ?>" role="button">liste des étudiants</a></td>

                                    </tr>    
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pagination mt-2 mb-5">    
            <?php  
               $total_pages = $total_records / $per_page_record;     
                $pagLink = ""; 
                                                          
                if($page>=2){   
                    echo "<a href='?controllers=professeur&view=liste.cours.professeur&page=".($page-1)."'> <span aria-hidden='true'>&laquo;</span>                    </a>";   
                }       
                        
                for ($i=1; $i<=$total_pages; $i++) {   
                if ($i == $page) {   
                    $pagLink .= "<a class = 'active' href='?controllers=professeur&view=liste.cours.professeur&page="  
                                                        .$i."'>".$i." </a>";   
                }               
                else  {   
                    $pagLink .= "<a href='?controllers=professeur&view=liste.cours.professeur&page=".$i."'>".$i." </a>";     
                }   
                };     
                echo $pagLink;   
                if($page<$total_pages){   
                    echo "<a href='?controllers=professeur&view=liste.cours.professeur&page=".($page+1)."'><span aria-hidden='true'>&raquo;</span>                    </a>";   
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
        padding: 7px 9px;
        text-align: center;
        text-decoration: none;
        font-size: 13px;    
    }
</style>
    