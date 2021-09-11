<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>
<div class="area"></div><nav class="main-menu">
            <ul>
                <li>
                    <a href="#">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">
                            UI Components
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Forms
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="#">
                       <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Pages
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart-o fa-2x"></i>
                        <span class="nav-text">
                            Graphs and Statistics
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-font fa-2x"></i>
                        <span class="nav-text">
                            Typography and Icons
                        </span>
                    </a>
                </li>

                <li>
                   <a href="#">
                   <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Liste des classes
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                   <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Liste des cours
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                   <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Liste des etudiants
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                       <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Liste des professeurs
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <span class="nav-text">
                            Maps
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                   <a href="<?=WEB_ROUTE.'?controllers=security&view=deconnexion'?>">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>