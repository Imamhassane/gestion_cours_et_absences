<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-11  liste-col">
                    <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline  mt-4">
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="" value="">
                        <div class="form-group ml-1">
                            <div class="form-group">
                                <label for="">Année scolaire</label>
                                <select class="form-control ml-2" name="test" id="">
                                    <?php for($i = 2010; $i <= 2021 ;$i++) {
                                        echo'<option>'. $i.' / '.($i+1).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="" class="btn  ml-3 ">OK</button>
                        <a name="" id="" class="btn btn-primary ml-auto mr-2 " href="<?= WEB_ROUTE . '?controllers=responsable&view=ajout.professeur' ?>" role="button">Ajouter +</a>

                    </form>
   
                <div class="column">
                <div class="card">
                <h2 class=" mb-3">LA LISTE DES PROFESSEURS</h2>
                    <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Grade</th>
                                        <th scope="col">Spécialité</th>
                                        <th scope="col">Action</th>
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
                                            <a name="" id="" class="" href="#" role="button"><i class="fa fa-edit"></i></a>
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
   
</style>    

      
