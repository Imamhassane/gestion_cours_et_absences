<?php
if (isset($_REQUEST['controllers'])){
    if ($_REQUEST['controllers']=='security'){
        require_once(ROUTE_DIR.'controllers/security.controllers.php');
    }elseif($_REQUEST['controllers']== 'attache'){
        require_once(ROUTE_DIR.'controllers/attache.controllers.php');
    }elseif($_REQUEST['controllers']=='professeur'){
        require_once(ROUTE_DIR.'controllers/professeur.controllers.php');
    }elseif($_REQUEST['controllers']=='etudiant'){
        require_once(ROUTE_DIR.'controllers/etudiant.controllers.php');
    }elseif($_REQUEST['controllers']=='responsable'){
        require_once(ROUTE_DIR.'controllers/responsable.controllers.php');
    }else{
        require_once(ROUTE_DIR.'controllers/security.controllers.php');
    }
}else{
    require_once(ROUTE_DIR.'controllers/security.controllers.php');

}
?>