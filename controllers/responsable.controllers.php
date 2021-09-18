<?php
 if (est_connect()){
    if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
        if ( isset ( $_GET [ 'view' ])) {
            if ( $_GET [ 'view' ]== 'planing.cours' ) {
            require ( ROUTE_DIR . 'view/responsable/planing.cours.html.php' );
           }elseif ( $_GET [ 'view' ]== 'ajout.classe' ) {
            require ( ROUTE_DIR . 'view/responsable/ajout.classe.html.php' );
           }elseif ( $_GET [ 'view' ]== 'ajout.professeur' ) {
            require ( ROUTE_DIR . 'view/responsable/ajout.professeur.html.php' );
           }elseif ( $_GET [ 'view' ]== 'tableau.bord' ) {
            require ( ROUTE_DIR . 'view/responsable/tableau.bord.html.php' );
           }elseif ( $_GET [ 'view' ]== 'liste.cours' ) {
            require ( ROUTE_DIR . 'view/responsable/liste.cours.html.php' );
           }elseif ( $_GET [ 'view' ]== 'liste.classe' ) {
            require ( ROUTE_DIR . 'view/responsable/liste.classe.html.php' );
           }elseif ( $_GET [ 'view' ]== 'liste.professeur' ) {
            require ( ROUTE_DIR . 'view/responsable/liste.professeur.html.php' );
           } elseif ( $_GET [ 'view' ]== 'ajout.cours' ) {
            require ( ROUTE_DIR . 'view/responsable/ajout.cours.html.php' );
           } elseif ( $_GET [ 'view' ]== 'liste.cours.nonplanifie' ) {
            require ( ROUTE_DIR . 'view/responsable/liste.cours.nonplanifie.html.php' );
           } 
        }
        
    }elseif ( $_SERVER ['REQUEST_METHOD' ]== 'POST' ){
        if (isset($_POST[ 'action' ])){
           /*  if ($_POST[ 'action' ]=='inscription'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                unset($data['password_confirm']);
                inscription($_POST); 
            } */
        }
    }
 }else{
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
 }
 /* switch ($_GET [ 'view' ]) {
    case 'planing.cours':
        require ( ROUTE_DIR . 'view/responsable/planing.cours.html.php' );
        break;
    case 'ajout.classe':
        require ( ROUTE_DIR . 'view/responsable/ajout.classe.html.php' );
        break;
    case 'ajout.professeur':
        require ( ROUTE_DIR . 'view/responsable/ajout.professeur.html.php' );
        break;
    case 'tableau.bord':
        require ( ROUTE_DIR . 'view/responsable/tableau.bord.html.php' );
        break;
    case 'liste.cours':
        require ( ROUTE_DIR . 'view/responsable/liste.cours.html.php' );
        break;
    case 'liste.classe':
        require ( ROUTE_DIR . 'view/responsable/liste.classe.html.php' );
        break;
    case 'liste.professeur':
        require ( ROUTE_DIR . 'view/responsable/liste.professeur.html.php' );
        break; 
    case 'liste.etudiant':
        require ( ROUTE_DIR . 'view/responsable/liste.etudiant.html.php' );
        break;
    default:
        header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
        break;
} */



/*  */

?>