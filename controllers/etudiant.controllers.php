<?php

if(est_connect()){
    if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
        if ( isset ( $_GET [ 'view' ])) {
                if ( $_GET [ 'view' ]== 'liste.etudiant.cours' ) {
                get_my_cours();
            }elseif ( $_GET [ 'view' ]== 'liste.etudiant.absence' ) {
                get_my_absence();
            }
        }
          
    }elseif ( $_SERVER ['REQUEST_METHOD' ]== 'POST' ){
        if (isset($_POST[ 'action' ])){
            if ($_POST[ 'action' ]=='filterCoursEtudiant'){
                get_my_cours();
            }
        }
    }
}else{
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
}





function get_my_cours(){
    $id = $_SESSION['userConnect'][0]['id_user'];
    if (isset($_POST['ok'])) {
        $mycours = filter_my_cours($id ,$_POST['annee']  ,$_POST['module']) ;
    }else{
        $mycours = find_my_cours($id);
    }
    $modules = find_all_module();
    $annee_scolaire=find_annee_scolaire();
    require(ROUTE_DIR . 'view/etudiant/liste.etudiant.cours.html.php');

}


function get_my_absence(){
    $id =$_GET['id_user'];
    if (isset($_POST['ok'])) {
        $absences = filter_absence_by_etudiant($id , $_POST['annee'] , $_POST['semestre']) ;
    }else{
            $test = get_absence_etudiant($id);
            $absences = get_absence_by_etudiant($id , $test[0]['id_planing']);

    }
 
    $annee_scolaires=find_annee_scolaire();
   require(ROUTE_DIR . 'view/attache/liste.absence.etudiant.html.php');
}

?>