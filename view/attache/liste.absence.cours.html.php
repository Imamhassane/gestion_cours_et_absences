<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-10 mt-3 liste-col">
        <?php if(est_attache()):?>
                <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=attache&view=liste.cours' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>
            <?php endif?>
        <div class="text-center mb-3"><h2 >LA LISTE DES PROFESSEURS</h2></div>
            <div class="column">
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                            <th >Prenom</th>
                            <th >Nom</th>
                            <th >Matricule</th>
                            <th >Module</th>
                            <th >Debut</th>
                            <th >Fin</th>
                            <th >Durée</th>

                            </tr>
                        </thead>
                        <tbody>
<?php foreach ($absences as  $absence):?>
                                    <tr>
                                        <td><?=$absence['prenom']?></td>
                                        <td><?=$absence['nom']?></td>
                                        <td><?=$absence['matricule']?></td>
                                        <td><?=$absence['libelle_module']?></td>
                                        <td><?=$absence['debut']?></td>
                                        <td><?=$absence['fin']?></td>
                                        <td><?=($absence['fin'] - $absence['debut'])?></td>
                                        
                                    </tr>
<?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    