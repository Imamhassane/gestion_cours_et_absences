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
                require(ROUTE_DIR . 'view/attache/liste.justification.html.php');
            }elseif ( $_GET [ 'view' ]== 'liste.absence.etudiant' ) {
                get_absence_for_etudiant();
            }elseif ( $_GET [ 'view' ]== 'liste.etudiant.classe' ) {
                get_etudiant_classe();
            }elseif ( $_GET [ 'view' ]== 'liste.absence.cours' ) {
                get_absence_for_cours();

            }
        }
    }elseif ( $_SERVER ['REQUEST_METHOD' ]== 'POST' ){
        if (isset($_POST[ 'action' ])){
            if ($_POST[ 'action' ]=='filterCours'){
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
            }
        }
    }
}else{
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
}



function getMatricule(){
    $test0 =  date('Y', time()).'-'.sprintf("%05d").'-M';
}
    


/* function liste_cours_no_planified(){
    
    if (isset($_POST['ok'])) {
        $etat_annee_scolaire = $_POST['annee'];
        $prof = $_POST['professeur'];
        $module = $_POST['module'];
        $classe = $_POST['classe'];
        $cours = filter_cours_non_planifie($etat_annee_scolaire , $prof,$module ,$classe) ;

    }else{
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
          $page=1;    
        } 
        $data =find_cours_non_planifie($page);
        $cours = $data['data'];   
        $per_page_record = $data['per_page_record'] ;   
        $total_records= $data['total_records'];

    }
    $classes = get_all_classe();
    $modules = find_all_module();
    $professeurs = get_all_professeur();
    $annee_scolaires=find_annee_scolaire();
    require ( ROUTE_DIR . 'view/responsable/liste.cours.nonplanifie.html.php' );
} */


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
   // var_dump($total_records);

require ( ROUTE_DIR . 'view/responsable/liste.classe.html.php' );
}


function get_etudiant(){
    if (isset($_POST['ok'])) {
     
        $etudiants = filter_all_etudiant($_POST['classe']  ,$_POST['annee']) ;
    }else{
        $etudiants = get_all_etudiant();
    }
    $rooms = get_all_classe();
    $annee_scolaire = find_annee_scolaire();
    require(ROUTE_DIR . 'view/responsable/liste.professeur.html.php');

}

function get_all_cours(){
    
    if (isset($_POST['ok'])) {
  
        $coursAttaches = filter_cours($_POST['annee'] , $_POST['professeur'],$_POST['module'] ,$_POST['classe']) ;

    }else{
        $coursAttaches = find_all_cours();
    }
    $classes = get_all_classe();
    $modules = find_all_module();
    $professeurs = get_all_professeur();
    $annee_scolaire=find_annee_scolaire();

    require(ROUTE_DIR . 'view/responsable/liste.cours.html.php');

}

function get_etudiant_classe() {
    $id_classe = $_GET['id_classe'];
    $students = get_all_etudiant_by_classe($id_classe);
    require(ROUTE_DIR . 'view/attache/liste.etudiant.classe.html.php');

}
function get_absence_for_etudiant() {
    $id =$_GET['id_user'];
    if (isset($_POST['ok'])) {
        $absences = filter_absence_by_etudiant($id , $_POST['annee'] , $_POST['semestre']) ;
    }else{
            $test = get_absence_etudiant($id);
            $absences = get_absence_by_etudiant($id , $test[0]['id_planing']);

    }
    /* foreach ($absences as $value) {
        $duree = $value['fin'] - $value['debut'];
    }
    var_dump($duree);   */ 
    $annee_scolaires=find_annee_scolaire();
   require(ROUTE_DIR . 'view/attache/liste.absence.etudiant.html.php');
}

function get_absence_for_cours() {
    $annee_scolaires=find_annee_scolaire();
    $id =$_GET['id_cours'];
    $absences = get_absence_by_cours($id);
    require(ROUTE_DIR . 'view/attache/liste.absence.cours.html.php');

}




?>