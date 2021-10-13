<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
$annee_scolaire = find_annee_scolaire();

?>

<div class="container-fluid">
    <div class="row cousplan ml-2">
        <div class="col-md-11 liste-cole ">
        <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                        <input type="hidden" name="controllers" value="etudiant">
                        <input type="hidden" name="action" value="filterjustification">
                    
                        <div class="form-group ml-1 row">
                            <div class="form-group">
                                <label for="">Date de la justification </label>
                                <input type="date" name="date" class="form-control" value="<?=date_format(date_create(),'Y-m-d');?>"  >
                            </div>
                            <div class="form-group ml-3 mr-2">
                                <label class="ml-3 ">Etat de la justification</label>
                                <select class="form-control ml-2" name="etat" id="">
                                        <option value="non_traiter"> Non tratité </option>
                                        <option value="refusee"> Refusée </option>
                                        <option value="acceptee"> Acceptée </option>
                                </select>
                            </div>
                        </div>
                            <button type="submit" name="ok" class="btn  ml-4 ">OK</button>
                    </form>
                    <div class="text-center mb-3"><h2 ><?=isset($justifications[0])?'mes justifications':'Aucune absence n\'a été justifié '?></h2></div>
                <div class="column">
                <div class="card">
                    <table class="table" id="classe">
                                <thead>
                                    <tr class="text-center">
                                      <!--   <th scope="col">Prénom</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Matricule</th>    -->   
                                        <th scope="col">Date d'absence</th>
                                        <th scope="col">Date de justification</th>
                                        <th scope="col">Module</th>
                                        <th scope="col">Etat de la justification</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php foreach ($justifications as $justification):?>
                                    <tr class="text-center">
                                       <!--  <td><?=$justification['prenom']?></td>
                                        <td><?=$justification['nom']?></td>
                                        <td><?=$justification['matricule']?></td> -->
                                        <th><?=date_format(date_create($justification['date_absence']), 'd-m-Y')?></th>
                                        <th><?=date_format(date_create($justification['date_justification']), 'd-m-Y')?></th>
                                        <td><?=$justification['libelle_module']?></td>
                                        <td><?=$justification['etat']?></td>

                                    </tr>
<?php endforeach ?>
                            </tbody>
                            <small class = "form-text text-center ml-5 text-danger">
                                    <?= isset($_SESSION['erreurSuppression']) ? $_SESSION['erreurSuppression'] : '' ;?>
                                    <?php unset($_SESSION['erreurSuppression'])?>
                            </small>
                    </table>
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
    
@media (max-width:954px){
    .cousplan{
        width:130%
    }
}
        </style>     


<?php require ( ROUTE_DIR . 'view/inc/footer.html.php' )?>