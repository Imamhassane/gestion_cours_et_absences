<?php

if(est_connect()){
    if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
        if (isset($_GET [ 'view' ])) {
            if ($_GET [ 'view' ]== 'liste.etudiant') {
                get_etudiant();
            }elseif ($_GET [ 'view' ]== 'inscrire.etudiant') {
                require(ROUTE_DIR . 'view/responsable/ajout.professeur.html.php');
            }elseif ( $_GET [ 'view' ]== 'liste.classe' ) {
                liste_all_classe();
            }elseif ( $_GET [ 'view' ]== 'liste.cours' ) {
                get_all_cours();
            }elseif ( $_GET [ 'view' ]== 'liste.justification' ) {
                liste_justification();
            }elseif ( $_GET [ 'view' ]== 'liste.absence.etudiant' ) {
                $_SESSION['id_user'] = $_GET['id_user'];
                get_absence_for_etudiant();
            }elseif ( $_GET [ 'view' ]== 'liste.etudiant.classe' ) {
                $_SESSION['id_planing'] = $_GET['id_planing'];
                get_etudiant_classe();
            }elseif ( $_GET [ 'view' ]== 'liste.etudiant.of.classe' ) {
                $_SESSION['id_classe'] = $_GET['id_classe'];
                get_etudiant_classroom();
            }elseif ( $_GET [ 'view' ]== 'liste.absence.cours' ) {
                get_absence_for_cours();

            }elseif ( $_GET [ 'view' ]== 'traitement.absence' ) {
                $_SESSION['id_absence'] = $_GET['id_absence'];
                justification_for_etudiant();
            }elseif ( $_GET [ 'view' ]== 'refuserJustification' ) {
                change_etat_justification();
            }elseif ( $_GET [ 'view' ]== 'accepterJustification' ) {
                change_etat_justification();
            }
        }
    }elseif ( $_SERVER ['REQUEST_METHOD' ]== 'POST' ){
        if (isset($_POST[ 'action' ])){
            if ($_POST[ 'action' ]=='filterCoursAttache'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                get_all_cours();
            }elseif ($_POST[ 'action' ]=='filterAbsence'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                get_absence_for_etudiant();
            }elseif ($_POST[ 'action' ]=='filterEtudiant'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                get_etudiant();
            }elseif ($_POST[ 'action' ]=='filterEtudiantclasse'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                get_etudiant_classroom();
            }elseif ($_POST[ 'action' ]=='filterstudentclasse'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                get_etudiant_classe();
            }elseif ($_POST[ 'action' ]=='cherchematricule'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                get_etudiant();
            }elseif ($_POST[ 'action' ]=='filtreJUST'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                liste_justification();
            }
        }
   }  
}else{
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
}



    




function liste_all_classe() {
    if (isset($_GET["page"])) {    
        $page  = $_GET["page"];    
    }    
    else {    
        $page=1;    
    } 
    $data =find_all_classe($page);
    $classes = $data['data'];   
    $per_page_record = $data['per_page_record'] ;   
    $total_records= $data['total_records'];

require ( ROUTE_DIR . 'view/responsable/liste.classe.html.php' );
}


function get_etudiant(){

    if (isset($_POST['ok'])) {
        $etudiants = filter_all_etudiant($_POST['classe']  ,$_POST['annee']) ;
    }elseif (isset($_POST['search'])) {
        $etudiants = get_all_etudiant_by_matricule($_POST['matricule']) ;
    }else{            
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
            $page=1;   
            
        } 
        $data = get_all_etudiant($page);
        $etudiants = $data['data'];   
        $per_page_record = $data['per_page_record'] ;   
        $total_records= $data['total_records'];
    }

    $rooms = get_all_classe();
    $annee_scolaire = find_annee_scolaire();
    require(ROUTE_DIR . 'view/responsable/liste.professeur.html.php');

}

function get_all_cours(){
    
    if (isset($_POST['ok'])) {
  
        $coursAttaches = filter_cours_for_attache($_POST['annee']) ;

    }else{
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
            $page=1;   
            
        } 
        $data = find_all_cours_for_attache($page);
        $coursAttaches = $data['data'];   
        $per_page_record = $data['per_page_record'] ;   
        $total_records= $data['total_records'];
    }


    
    $classes = get_all_classe();
    $modules = find_all_module();
    $professeurs = get_all_professeur();
    $annee_scolaire=find_annee_scolaire();

    require(ROUTE_DIR . 'view/responsable/liste.cours.html.php');

}

function get_etudiant_classe() {
    $id_planing =  $_SESSION['id_planing'] ;
    if(isset($_POST['ok'])){
        $students = filter_all_etudiant_by_planing($_POST['annee']);
    }else{
        $students = get_all_etudiant_by_planing($id_planing);
    }

    $annee_scolaire=find_annee_scolaire();

    require(ROUTE_DIR . 'view/attache/liste.etudiant.classe.html.php');

}
function get_etudiant_classroom() {
    $id_classe =  $_SESSION['id_classe'] ;
    if(isset($_POST['ok'])){
        $students = filter_all_etudiant_by_classe($_POST['annee']);

    }else{
        $students = get_all_etudiant_by_classe($id_classe);
    }

    $annee_scolaire=find_annee_scolaire();

    require(ROUTE_DIR . 'view/attache/liste.etudiant.classe.html.php');

}
function get_absence_for_etudiant() {
        $id = $_SESSION['id_user'] ;
        
    if (isset($_POST['ok'])) {
            $absences = filter_absence_by_etudiant( $_POST['annee'] , $_POST['semestre']) ;

    }else{
            $absences = get_absence__etudiant($id );

    }
    $annee_scolaires=find_annee_scolaire();
    $nombreAbsence = get_my_number_absence($id);
    $justifications = all_justification();
    require(ROUTE_DIR . 'view/attache/liste.absence.etudiant.html.php');
}

function get_absence_for_cours() {
    $annee_scolaires=find_annee_scolaire();
    $id =$_GET['id_cours'];
    $test = get_absence_cours($id);
    $absences = get_absence_by_cours($id , $test[0]['id_planing']);
    require(ROUTE_DIR . 'view/attache/liste.absence.cours.html.php');

}

function liste_justification(){

    if (isset($_POST['ok'])) {
        $justifications = filter_all_justification($_POST['date']);
    }else{
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
            $page=1;   
            
        } 
        $data = get_all_justification($page);
        $justifications = $data['data'];   
        $per_page_record = $data['per_page_record'] ;   
        $total_records= $data['total_records'];
    }
  

   require(ROUTE_DIR . 'view/attache/liste.justification.html.php');

}
 function justification_for_etudiant() {
     $id_absence  = $_GET['id_absence'];
     $justify = justification_by_etuiant($id_absence);
     require(ROUTE_DIR . 'view/attache/traitement.absence.html.php');

 }


function change_etat_justification(){
    $id_justification = $_GET['id_justification'];
    $id_absence =  $_SESSION['id_absence'];
    if ($_GET[ 'view']=='refuserJustification') {
        $_SESSION['message'] =0;
        $etat = 'refusee';
        update_absence('justifiee_refusee',$id_absence);
    }elseif($_GET[ 'view']=='accepterJustification'){
        $_SESSION['message'] = 1;
        $etat = 'acceptee';
        update_absence('justifiee_acceptee',$id_absence);
    }
    $change = update_justification($etat , $id_justification);
    header('location:'.WEB_ROUTE.'?controllers=attache&view=liste.justification');

}



?>