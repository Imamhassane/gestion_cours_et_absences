<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-10 mt-3 liste-col">
        <?php if(est_attache()):?>
                <a name="" id="" class="mr-auto mr-2 float-left mt-4 " href="<?= WEB_ROUTE . '?controllers=attache&view=liste.classe' ?>" role=""><i class="fa fa-arrow-circle-left"></i></a>
            <?php endif?>
        <div class="text-center mb-3"><h2 >LA LISTE DES absences de L1DESIGN</h2></div>
            <div class="column">
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Prenom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Matricule</th>
                            <th scope="col">Classe</th>
                            </tr>
                        </thead>
                        <tbody>
<?php foreach ($students as $student):?>
                                    <tr>
                                        <td><?=$student['prenom']?></td>
                                        <td><?=$student['nom']?></td>
                                        <td><?=$student['matricule']?></td>
                                        <td><?=$student['nom_classe']?></td>
                                        <td class="action">
<!--                                             <a name="" id="" class="btn btn-primary ml-auto " href="<?=WEB_ROUTE.'?controllers=attache&view=liste.absence.etudiant'?>"ole="button">Voir les absences </a>
 -->                                        </td>
                                        
                                    </tr>
<?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    