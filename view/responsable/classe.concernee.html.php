<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
$annee_scolaire = find_annee_scolaire();

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 liste-cole">
                <div class="column">
                <div class="card">
                    <div class="d-inline">
                        <h2 class="">LA LISTE DES CLASSES</h2>
                        </div>
                    <table class="table" id="classe">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Nom </th>
                                        <th scope="col">Filière</th>
                                        <th scope="col">Niveau</th>
                                        <th scope="col">Module</th>
                                        <th scope="col">Professeur</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php foreach ($coursPartage as $partage): ?>
                                    <tr class="text-center">
                                        <td><?=$partage['nom_classe']?></td>
                                        <td><?=$partage['filiere']?></td>
                                        <td><?=$partage['niveau']?></td>
                                        <td><?=$partage['libelle_module']?></td>
                                        <td><?=$partage['prenom'].' '.$partage['nom']?></td>
                                    </tr>
<?php endforeach ?>
                            </tbody>
                    </table>
                </div>
            </div>
   
 <!--            <div class="pagination mt-2 mb-5">    
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
      </div>  -->
            
        </div>
    </div>
</div>

  

