<?php

if(est_connect()){
    if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
        if ( isset ( $_GET [ 'view' ])) {
            if ( $_GET [ 'view' ]== '' ) {

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