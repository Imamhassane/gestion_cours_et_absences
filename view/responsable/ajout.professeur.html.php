<?php
if (isset($_SESSION['arrayError'])){
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11  liste-col">
            <div class="text-center mb-3"><h2 >Ajouter un professeur</h2></div>
                <form method="POST" action="<?=WEB_ROUTE?>"enctype="multipart/form-data" >
                    <div class="form-inline">
                        <input type="hidden" name="controllers" value="responsable" >
                        <input type="hidden" name="action" value="<?=isset($datas[0]['id_user']) ? 'editProf':'ajoutProf'?>">
                        <input type="hidden" name="id_user"      value="<?=isset($datas[0]['id_user']) ? $datas['id_user'] : ""; ?>">        

                            <div class=" mb-2 col-md-6">
                                <input type="text" name="nom" placeholder="Nom" value="<?=$datas[0]['nom']?>">
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['nom']) ? $arrayError['nom'] : '' ;?>
                                </small>
                            </div>
                            <div class=" mb-2 col-md-6 ">
                                <input type="text" name="prenom"   placeholder="Prénom" value="<?=$datas[0]['prenom'] ?>">
                                <small class = "form-text text-left ml-5 text-danger">
                                    <?= isset($arrayError['prenom']) ? $arrayError['prenom'] : '' ;?>
                                </small> 
                            </div>
                          
                            <div class=" mb-2 col-md-6 ">
                                <input type="password" name="password"   placeholder="Password" value="<?=$datas[0]['password'] ?>">
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['password']) ? $arrayError['password'] : '' ;?>
                                </small>
                            </div> 
                                           
                            <div class=" mb-2 col-md-6 ">
                                <input type="password" name="password_confirm"   placeholder="Confirmer le password">
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['password_confirm']) ? $arrayError['password_confirm'] : '' ;?>
                                </small>
                            </div>  
                            <div class=" mb-2 col-md-6">
                                <input type="text" name="login" placeholder="Login" value="<?=$datas[0]['login'] ?>">
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['login']) ? $arrayError['login'] : '' ;?>
                                </small>
                            </div> 
                            <div class="col-md-6 mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="specialite" id="" value="<?=$datas[0]['specialite'] ?>">
                                    <option>Histoire</option>
                                    <option></option>
                                </select>
                            </div>                   
                            <div class=" col-md-6 mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="grade" id="" value="<?=$datas[0]['grade'] ?>">
                                    <option>master</option>
                                    <option></option>
                                </select>
                            </div>
                            <div class=" mb-2 col-md-4 ml-3">
                                <input type="file" name="avatar"   placeholder="" value="<?=$datas[0]['avatar'] ?>">
                                <small class = "ml-5 text-left form-text text-danger ">
                                    <?= isset($arrayError['avatar']) ? $arrayError['avatar'] : '' ;?>
                                </small>
                            </div>
                    </div> 
                        <input type="submit" class="fadeIn fourth ml-auto mr-auto mt-4" value="<?=isset($datas[0]['id_user']) ? 'Modifier' :'Creer'?>">
                </form>   
            </div>
        </div>
    </div>

    