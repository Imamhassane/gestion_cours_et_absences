<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>

<div class="area"></div>
<nav class="main-menu ">
<img class="rounded-circle mt-2" src="<?=$_SESSION['userConnect'][0]['avatar']?>">
            <strong><p><?=$_SESSION['userConnect'][0]['prenom'].' '.$_SESSION['userConnect'][0]['nom']?></p></strong>

            <ul class="mt-5">
          
                <li class="">
                   <a href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.professeur' ?>">
                   <i class="fa fa-users fa-2x"></i>                                        
                        <span class="nav-text">
                            Liste des professeurs
                        </span>
                    </a>
                </li>
                <li class="mt-3">
                   <a href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.classe' ?>">
                   <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Liste des classes
                        </span>
                    </a>
                </li>                
                <li class="mt-3">
                   <a href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.nonplanifie' ?>">
                   <i class="fa fa-calendar fa-2x"></i>
                        <span class="nav-text">
                            Liste des cours
                        </span>
                    </a>
                </li>




                <li class="mt-3">
                    <a href="<?= WEB_ROUTE . '?controllers=responsable&view=tableau.bord' ?>">
                        <i class="fa fa-bar-chart-o fa-2x"></i>
                        <span class="nav-text">
                            Tableau de bord
                        </span>
                    </a>
                </li>
            

            </ul>

            <ul class="logout">
                <li>
                   <a href="<?=WEB_ROUTE.'?controllers=security&view=deconnexion'?>">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Se deconnecter
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>






