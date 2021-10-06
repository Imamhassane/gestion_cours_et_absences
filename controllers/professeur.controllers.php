<?php

if(est_connect()){
    if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
        if ( isset ( $_GET [ 'view' ])) {
            if ( $_GET [ 'view' ]== 'liste.cours.professeur' ) {
                my_cours_professeur();
            }elseif ( $_GET [ 'view' ]== 'mes.classes' ) {
                my_classe_prof();
            }
        }
        
    }elseif ( $_SERVER ['REQUEST_METHOD' ]== 'POST' ){
        if (isset($_POST[ 'action' ])){
            if ($_POST[ 'action' ]=='marquerAbsent'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                insert_in_absence($_POST);
            }
        }
    }
}else{
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
}


function my_cours_professeur(){
    $id = $_SESSION['userConnect'][0]['id_user'];
    if (isset($_POST['ok'])) {
        $coursProfesseur = filter_my_cours_professeur($id , $_POST['annee']  ,$_POST['module']) ;
    }else{
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
            $page=1;    
        } 
        $data = cours_professeur($id, $page);
        $coursProfesseur = $data['data'];   
        //var_dump($coursProfesseur);
        $per_page_record = $data['per_page_record'] ;   
        $total_records= $data['total_records'];
    }
    $classes = get_all_classe();
    $annee_scolaire=find_annee_scolaire();
require(ROUTE_DIR . 'view/professeur/liste.cours.professeur.html.php');

 }
 function insert_in_absence(array $datas):void{
    $arrayError=array();
    extract($datas);
     validation_champ($absent,'absent',$arrayError);  
        $id_planing = $_SESSION['id_planing'] ;
       if (form_valid($arrayError)) {
                    if(etudiant_exist($id_planing)){
                        $_SESSION['message']=7; 
                        header('location:'.WEB_ROUTE.'?controllers=professeur&view=liste.cours.professeur');
                    }else{
                        ajout_absence( $datas);
                        $_SESSION['message']=4;
                        header('location:'.WEB_ROUTE.'?controllers=professeur&view=liste.cours.professeur');
                    }
            }else{
                $_SESSION['message']=5; 
                $_SESSION['arrayError']=$arrayError;
                header('location:'.WEB_ROUTE.'?controllers=professeur&view=liste.cours.professeur');

           } 
}


function my_classe_prof() {
    $id = $_SESSION['userConnect'][0]['id_user'];
    if (isset($_GET["page"])) {    
        $page  = $_GET["page"];    
    }    
    else {    
      $page=1;    
    } 
    $data =my_classe_professeur($id , $page);
    
    $classesProfesseur = $data['data'];   
    $per_page_record = $data['per_page_record'] ;   
    $total_records= $data['total_records'];

require ( ROUTE_DIR . 'view/responsable/liste.classe.html.php' );
}


?>