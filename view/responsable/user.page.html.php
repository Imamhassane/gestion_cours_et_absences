<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
$annee_scolaire = find_annee_scolaire();

?>

<div class="container-fluid">
    <div class="row ">
        <div class="col-md-10 liste-col">
        <div class="row"> <img class="rounded  ml-auto mr-auto mt-2" src="<?=$_SESSION['userConnect'][0]['avatar']?>"></div>       
              <div class="row"><label class="float-left mt-4 ml-5 mb-1">Nom : <?=$_SESSION['userConnect'][0]['nom']?></label></div>
              <div class="row"><label class="float-left mt-3 ml-5 mb-1">Prenom : <?=$_SESSION['userConnect'][0]['prenom']?></label></div>
              <div class="row"><label class="float-left mt-3 ml-5 mb-1">Login : <?=$_SESSION['userConnect'][0]['login']?></label></div>
              <div class="row"><label class="float-left mt-3 ml-5 mb-1">Role : <?=$_SESSION['userConnect'][0]['nom_role']?></label></div>
                <a name="" id="" class="btn btn-primary btn float-left mt-4 ml-5 mb-4 " href="<?= WEB_ROUTE . '?controllers=responsable&view=updateUser&id_user='.$_SESSION['userConnect'][0]['id_user'] ?>" role="button">Modifier <i class="fa fa-edit"></i></a>
              
            
        </div>
    </div>
</div>
<style>

img {
    height: 248px;
    width: 259px;
}
.float-left{
    margin-left:19px
}
.btn-primary{
    background-color:#152032;
    color:#fff;
    text-decoration: none;
    border: none;
}

</style>
