<?php
if (isset($_REQUEST['controllers'])){
     if ($_REQUEST['controllers']=='security'){
        require_once(ROUTE_DIR.'controllers/security.controllers.php');
    }else if($_REQUEST['controllers']== 'attache'){
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

<!--  if (isset($_REQUEST['controllers'])){
    switch ($_REQUEST['controllers']) {
        case 'security':
            require_once(ROUTE_DIR.'controllers/security.controllers.php');
            break;
        case 'attache':
            require_once(ROUTE_DIR.'controllers/attache.controllers.php');
                break;
        case 'professeur':
            require_once(ROUTE_DIR.'controllers/professeur.controllers.php');
            break;
        case 'etudiant':
            require_once(ROUTE_DIR.'controllers/etudiant.controllers.php');
            break;
        case 'responsable':
            require_once(ROUTE_DIR.'controllers/responsable.controllers.php');
            break;
        default:
            header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
            break;
    }
   
}else{
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');

} 

 -->