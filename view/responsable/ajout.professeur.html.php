<?php

if (isset($_SESSION['arrayError'])){
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
$modules = find_all_module();
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11  liste-col">
            <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.professeur' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>

            <div class="text-center mb-3"><h2 >Ajouter un professeur</h2></div>
           
                <form method="POST" action="<?=WEB_ROUTE?>"enctype="multipart/form-data" >
                    <div class="form-inline">
                        <input type="hidden" name="controllers" value="responsable" >
                        <input type="hidden" name="action" value="<?=isset($users[0]['id_user']) ? 'editProf':'ajoutProf'?>">
                        <input type="hidden" name="id_user"      value="<?=isset($users[0]['id_user']) ? $users[0]['id_user'] : ""; ?>">        
                      
                            <div class=" mb-2 col-md-6">
                                <label for="" class = "ml-5">nom</label>  
                                <input type="text" name="nom" placeholder="" value="<?=$users[0]['nom']?>">
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['nom']) ? $arrayError['nom'] : '' ;?>
                                </small>
                            </div>
                            <div class=" mb-2 col-md-6 ">
                            <label for="" class = "ml-5">prenom</label>
                                <input type="text" name="prenom"   placeholder="" value="<?=$users[0]['prenom']?>">
                                <small class = "form-text text-left ml-5 text-danger">
                                    <?= isset($arrayError['prenom']) ? $arrayError['prenom'] : '' ;?>
                                </small> 
                            </div>
                          
                            <div class=" mb-2 col-md-6 mt-4">
                                <label for="" class = "ml-5">password</label>
                                <input type="password" name="password" id="myInput"   placeholder="Password" value="<?=$users[0]['password']?>">
                                <small class = "ml-5 text-left form-text ">
                                    <input type="checkbox" onclick="myFunction()" class="ml-3 mr-1 mt-1">Afficher le Password
                                </small>
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['password']) ? $arrayError['password'] : '' ;?>
                                </small>
                            </div> 


                        <?php if(!isset($users[0]['id_user']) ):?> 
                            <div class=" mb-2 col-md-6 ">
                            <label for="" class = "ml-5">Confirmer le password</label>
                                <input type="password" name="password_confirm"   placeholder="" value="">
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['password_confirm']) ? $arrayError['password_confirm'] : '' ;?>
                                </small>
                            </div>  
                        <?php endif ?>
                            <div class=" mb-2 col-md-6">
                                <label for="" class="ml-5">login</label>
                                <input type="text" name="login" placeholder="" value="<?=isset($_SESSION['restor'])?$_SESSION['restor']['login']:''?><?=$users[0]['login']?>">
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['login']) ? $arrayError['login'] : '' ;?>
                                </small>
                            </div> 
                            <div class="col-md-6 mb-3 mt-2">
                                <label for="" class = "ml-5 ">spécialité</label>
                                <select class=" select" name="specialite" id="" >
                                <option><?=$users[0]['specialite']?></option>
                                <?php foreach ($modules as $module):?>
                                    <option><?=$module['libelle_module']?></option>;
                                <?php endforeach?>  
                                </select>
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['specialite']) ? $arrayError['specialite'] : '' ;?>
                                </small>
                            </div>                   
                            <div class=" col-md-6 mb-4 mt-2">
                                <label for="" class = "ml-5">grade</label>
                                <select class=" select" name="grade" id="" >
                                    <option><?=$users[0]['grade']?></option>
                                    <option>Licence</option>
                                    <option>Master</option>
                                    <option>Doctorat</option>

                                </select>
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['grade']) ? $arrayError['grade'] : '' ;?>
                                </small>
                            </div>
                            <?php if(!isset($users[0]['id_user']) ):?> 

                            <div class=" mb-2 col-md-4 ml-3">
                            <label for="" class = "ml-5">avatar</label>

                                <input type="file" name="avatar"   placeholder="" value="<?=isset($_SESSION['restor'])?$_SESSION['restor']['avatar']:''?>">
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['avatar']) ? $arrayError['avatar'] : '' ;?>
                                </small>
                            </div>
                            <?php endif ?>

                    </div> 
                        <input type="submit" class="fadeIn fourth ml-auto mr-auto mt-4" value="<?=isset($users[0]['id_user']) ? 'Modifier' :'Creer'?>">
                </form>   
            </div>
        </div>
    </div>
<?php
unset($_SESSION['restor']);
?>
<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<style>
   .liste-col .fa{
        font-size:32px;
        color:#152032;
    }
    .form-inline label {
    display: flex;
    align-items: center;
    margin-bottom: 0;
    justify-content: left;

}
</style>