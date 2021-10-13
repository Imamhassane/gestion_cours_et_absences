<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
?>
<div class="container dashboard  p-0 mt-2">
<div class="text-xs head mb-4 font-weight-bold text-info fonte text-uppercase mb-1">Année scolaire : <?=$annee_scolaire[0]['annee_scolaire']?></div>
    <div class="row p-0">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary fonte text-uppercase mb-1">
                                                Total étudiant</div>
                                            <div class="h5 mb-0 font text-gray-800"> <?=$total_etudiants[0]['users']?> étudiants </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success fonte text-uppercase mb-1">
                                                Total classe</div>
                                            <div class="h5 mb-0 font text-gray-800"><?=$nbrclasse?> classes</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info fonte text-uppercase mb-1">
                                                Total professeur</div>
                                            <div class="h5 mb-0 font text-gray-800"><?=$nbrprof?> professeurs </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 ">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-warning">Les étudiants ayant dépassés 25H d'absences</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body pb-5">
                                <?php if($absentSup25h!=0):?>
                                    <?php foreach ($absentSup25h as $absent):?>
                                        <div class="h5 mb-0 font text-gray-800"> <strong><?=$absent['prenom']?></strong>  <strong><?=$absent['nom']?></strong> / Mat : <strong><?=$absent['matricule']?></strong> / Durée : <strong><?=$absent['duree']?></strong> / Classe : <strong><?=$absent['nom_classe']?></strong></div>
                                    <?php endforeach?>
<?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 ">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-danger">Les étudiants les plus absentéistes </h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body pb-5">
                                    <!-- <?php foreach ($absentSup25h as $absent):?>
                                        <div class="h5 mb-0 font text-gray-800"> <strong><?=$absent['prenom']?></strong>  <strong><?=$absent['nom']?></strong> Mat : <strong><?=$absent['matricule']?></strong> Durée : <strong><?=$absent['duree']?></strong> Classe : <strong><?=$absent['nom_classe']?></strong></div>
                                    <?php endforeach?> -->

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <!-- Pie Chart -->
                         
                        <div class="col-xl-6 col-lg-6 ">
                            <div class="card shadow mb-4 ">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Nombre de cours par professeur</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body ">
                                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myAreaChart" width="735" height="320" style="display: block; width: 735px; height: 320px;" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 ">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-info">Nombre de cours par classe</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body pb-5">
                                    <div class="chart-pie pt-2 pb-5"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myBarChart" width="595" height="245" style="display: block; width: 595px; height: 245px;" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>


                            
                    </div>
    </div>
</div>


   
<?php
require ( ROUTE_DIR . 'view/inc/footerCharjs.html.php' );
?>
