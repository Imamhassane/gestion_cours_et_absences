<?php
/* if (est_responsable()) header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
 */
if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
    if ( isset ( $_GET [ 'view' ])) {
        if ( $_GET [ 'view' ]== 'liste.professeur' ) {
        require ( ROUTE_DIR . 'view/responsable/liste.professeur.html.php' );
       }
    }
    
}elseif ( $_SERVER ['REQUEST_METHOD' ]== 'POST' ){
    if (isset($_POST[ 'action' ])){
        if ($_POST[ 'action' ]==''){

        }
    }
}



?>