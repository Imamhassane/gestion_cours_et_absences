<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
$annee_scolaire = find_annee_scolaire();

?>

<div class="container-fluid">
    <div class="row ">
        <div class="col-md-10 liste-col">
            <a name="" id="" class="mr-auto mr-2 float-left mt-2 " href="<?= WEB_ROUTE . '?controllers=attache&view=liste.justification'?>" role=""><i class="fa fa-arrow-circle-left"></i></a>
            <div class="row"> <img class="rounded  ml-auto mr-auto mt-2" src="<?=$justify[0]['fiche_justification']?>"></div>       
            <div class="row"><label class="float-left mt-4 ml-5 mb-1"><strong>Date d'absence :</strong> <?=date_format(date_create($justify[0]['date_absence']), 'd-m-Y')?></label></div>
            <div class="row"><label class="float-left mt-3 ml-5 mb-1"><strong>Date de justification :</strong> <?=date_format(date_create($justify[0]['date_justification']), 'd-m-Y')?></label></div>
            <div class="row"><label class="float-left mt-3 ml-5 mb-1"><strong>Module :</strong> <?=$justify[0]['libelle_module']?></label></div>
            <div class="row"><label class="float-left mt-3 ml-5 mb-1"><strong>Motif : </strong><?=$justify[0]['motif']?></label></div>
            <a name="" id="" class="btn btn-danger btn float-left mt-4 ml-5 mb-4 " href="<?= WEB_ROUTE . '?controllers=attache&view=refuserJustification&id_justification='.$justify[0]['id_justification'] ?>" role="button">Refuser <i class="fa fa-times-circle"></i></a>
            <a name="" id="" class="btn btn-success btn float-left mt-4 ml-5 mb-4 " href="<?= WEB_ROUTE . '?controllers=attache&view=accepterJustification&id_justification='.$justify[0]['id_justification'] ?>" role="button">Accepter <i class="fa fa-check"></i></a>
            
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
.btn-success,.btn-danger{
    color:#fff;
    border: none;
}
.btn-success:hover{
    background-color: green;
}
.btn-danger:hover{
    background-color: red   ;
}

</style>
<?php require ( ROUTE_DIR . 'view/inc/footer.html.php' )?>