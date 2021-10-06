<?php

if(est_connect()){
    if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
        if ( isset ( $_GET [ 'view' ])) {
                if ( $_GET [ 'view' ]== 'liste.etudiant.cours' ) {
                get_my_cours();
            }/* elseif ( $_GET [ 'view' ]== 'liste.etudiant.absence' ) {
                get_my_absence();
            } */elseif ( $_GET [ 'view' ]== 'justification' ) {
                $_SESSION['id_absence'] = $_GET['id_absence'];
                require(ROUTE_DIR . 'view/etudiant/justification.html.php');
            }elseif ( $_GET [ 'view' ]== 'liste.justification' ) {
                get_justification_for_etudiant();
            }
        }
          
    }elseif ( $_SERVER ['REQUEST_METHOD' ]== 'POST' ){
        if (isset($_POST[ 'action' ])){
            if ($_POST[ 'action' ]=='filterCoursEtudiant'){
                get_my_cours();
            }elseif ($_POST[ 'action' ]=='justifierabsence'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                insert_justification($_POST ,$_FILES);
            }elseif ($_POST[ 'action' ]=='filterjustification'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                get_justification_for_etudiant($_POST);
            }
        }
    }
}else{
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
}





function get_my_cours(){
    $id = $_SESSION['userConnect'][0]['id_user'];
    $classe = get_classe_student($id);
    $id_classe = $classe[0]['id_classe'];

    if (isset($_POST['ok'])) {
        $mycours = filter_my_cours( $id , $_POST['annee']  ,$_POST['module']) ;
    }else{
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
          $page=1;    
        } 
        $data = find_my_cours($id_classe, $page);
        $mycours = $data['data'];   
        $per_page_record = $data['per_page_record'] ;   
        $total_records= $data['total_records'];
    }
 
    $modules = find_all_module();
    $annee_scolaire=find_annee_scolaire();
   require(ROUTE_DIR . 'view/etudiant/liste.etudiant.cours.html.php');

}


/* function get_my_absence(){
    $id =$_GET['id_user'];
    if (isset($_POST['ok'])) {
            $absences = filter_absence_by_etudiant($id , $_POST['annee'] , $_POST['semestre']) ;
    }else{
            $test = get_absence_etudiant($id);
            $absences = get_absence_by_etudiant($id , $test[0]['id_planing']);

    }
    $annee_scolaires=find_annee_scolaire();
   require(ROUTE_DIR . 'view/attache/liste.absence.etudiant.html.php');
} */




function insert_justification(array $datas):void{
    $arrayError=array();
    extract($datas);
        validation_champ($motif,'motif',$arrayError);  

        $justifications = all_justification();
       
       if (form_valid($arrayError)) {
            foreach ($justifications as $value) {
                if($value['id_absence'] == $_SESSION['id_absence']){
                    $_SESSION['message'] = 2;
                    header('location:'.WEB_ROUTE.'?controllers=attache&view=liste.absence.etudiant&id_user='.$_SESSION['userConnect'][0]['id_user']);
                }
            }
            if($_SESSION['message']!=2){
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES['fiche']['name']);
                    $datas['fiche'] = $target_file;
                    upload_fiche($_FILES, $target_file);
                    insert_in_justification($datas);  
                    $id_absence =  $_SESSION['id_absence'];
                    update_absence('justifiee_non_traitee',$id_absence);
                    $_SESSION['message']=1;
                    header('location:'.WEB_ROUTE.'?controllers=attache&view=liste.absence.etudiant&id_user='.$_SESSION['userConnect'][0]['id_user']);
            }
            var_dump($_SESSION['id_absence']);

         }else{
    
               $_SESSION['arrayError']=$arrayError;
               header('location:'.WEB_ROUTE.'?controllers=etudiant&view=justification&id_absence='.$_SESSION['id_absence']);
            }
           
    }


    
    function get_justification_for_etudiant(){
        $id_user = $_SESSION['userConnect'][0]['id_user'];
        if (isset($_POST['ok'])){  
             $justifications = filiter_my_justification( $_POST['date'], $_POST['etat']);
        }else{
            $justifications = get_my_justification($id_user);
        }

        $modules = find_all_module();
        $annee_scolaires=find_annee_scolaire();
       require(ROUTE_DIR . 'view/etudiant/liste.justification.html.php');

    }

?>