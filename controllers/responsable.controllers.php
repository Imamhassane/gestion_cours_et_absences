<?php
 if (est_connect()){
    if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
        if ( isset ( $_GET [ 'view' ])) {
            if ( $_GET [ 'view' ]== 'planing.cours' ) {
            require ( ROUTE_DIR . 'view/responsable/planing.cours.html.php' );
           }elseif ( $_GET [ 'view' ]== 'creer.classe' ) {
            require ( ROUTE_DIR . 'view/responsable/creer.classe.html.php' );
           }elseif ( $_GET [ 'view' ]== 'creer.professeur' ) {
            require ( ROUTE_DIR . 'view/responsable/creer.professeur.html.php' );
           }elseif ( $_GET [ 'view' ]== 'liste.cours' ) {
            require ( ROUTE_DIR . 'view/responsable/liste.cours.responsable.html.php' );
           }elseif ( $_GET [ 'view' ]== 'liste.etudiant' ) {
            require ( ROUTE_DIR . 'view/responsable/liste.etudiant.classe.html.php' );
           }elseif ( $_GET [ 'view' ]== 'liste.professeur' ) {
            require ( ROUTE_DIR . 'view/responsable/liste.professeur.html.php' );
           }elseif ( $_GET [ 'view' ]== 'tableau.bord' ) {
            require ( ROUTE_DIR . 'view/responsable/tableau.bord.html.php' );
           }elseif ( $_GET [ 'view' ]== 'liste.classe' ) {
            require ( ROUTE_DIR . 'view/responsable/liste.classe.html.php' );
           }
        }
        
    }elseif ( $_SERVER ['REQUEST_METHOD' ]== 'POST' ){
        if (isset($_POST[ 'action' ])){
            if ($_POST[ 'action' ]==''){
    
            }
        }
    }
 }else{
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
 }





?>