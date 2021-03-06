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
                tableau_bord();
            }elseif ( $_GET [ 'view' ]== 'liste.cours.perid' ) {
                $_SESSION['id_classe'] = $_GET['id_classe'];
                liste_cours_by_id();
            }elseif ( $_GET [ 'view' ]== 'liste.classe' ) {
                liste_all_classe();
            }elseif ( $_GET [ 'view' ]== 'liste.professeur' ) {
                liste_all_professeur();
            } elseif ( $_GET [ 'view' ]== 'ajout.cours' ) {
                liste_cours_proprieties();
            } elseif ( $_GET [ 'view' ]== 'liste.cours.nonplanifie' ) {
                liste_cours_no_planified();
            } elseif ( $_GET [ 'view' ]== 'updateCours' ) {
                $_SESSION['id_cours'] = $_GET['id_cours'];
                get_cours();
            } elseif ( $_GET [ 'view' ]== 'deleteCours' ) {
                    $_SESSION['t'] = $_GET['id_planing'];
                    delete_a_cours();
            }  elseif ( $_GET [ 'view' ]== 'deleteUser' ) {
                delete_a_user();
            } elseif ( $_GET [ 'view' ]== 'deleteClasse' ) {
                delete_a_classe();
            }elseif ( $_GET [ 'view' ]== 'updateUser' ) {
                $_SESSION['id_user'] = $_GET['id_user'];
                get_users();
            }elseif ( $_GET [ 'view' ]== 'reinscrire' ) {
                $_SESSION['id_user'] = $_GET['id_user'];
                get_user();
            }elseif ( $_GET [ 'view' ]== 'modifprofil' ) {
                $_SESSION['id_user'] = $_GET['id_user'];
                get_users();
            }elseif ( $_GET [ 'view' ]== 'updateClasse' ) {
                $_SESSION['id_classe'] = $_GET['id_classe'];
                get_classe();
            }elseif ( $_GET [ 'view' ]== 'user.page' ) {
                user_page();
            }elseif ( $_GET [ 'view' ]== 'classe.concernees' ) {
            cours_partage_by_classe();
            }elseif ( $_GET [ 'view' ]== 'definir.annee' ) {
                require ( ROUTE_DIR . 'view/responsable/definir.annee.html.php' );
            }
            elseif ( $_GET [ 'view' ]== 'getdata' ) {
                getData();
            }elseif ( $_GET [ 'view' ]== 'getDatas' ) {
                getDatas();
            }
        }else{
            header('location:'.WEB_ROUTE.'?controllers=responsable&view=tableau.bord');
        }
    }elseif($_SERVER ['REQUEST_METHOD' ]=='POST'){
        if (isset($_POST['action'])){
            if($_POST['action']=='ajoutClasse'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                insert_classe($_POST); 
            }elseif($_POST['action']=='ajoutCours'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                insert_cours($_POST); 
            }elseif($_POST['action']=='ajoutPlaning'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                insert_planing_cours($_POST); 
            }elseif($_POST['action']=='filterCoursNonplanifie'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                liste_cours_no_planified();
            }elseif($_POST['action']=='editProf'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                modif_prof($_POST,$_FILES);
            }elseif($_POST['action']=='editClasse'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                modif_classe($_POST);
            }elseif($_POST['action']=='editCours'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                modif_cours($_POST);
            }elseif($_POST['action']=='filterClasse'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                liste_all_classe($_POST);
            }elseif($_POST['action']=='filterCours'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                liste_cours_by_id($_POST);
            }elseif($_POST['action']=='nouvelleannee'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                ajout_annee_scolaire($_POST);
            }
            
        }
    }
 }else{
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
 }




function insert_classe(array $datas):void{
    $arrayError=array();
    extract($datas);
        validation_champ($nom_classe,'nom_classe',$arrayError);  
        validation_champ($nom_classe,'niveau',$arrayError);  
        validation_champ($nom_classe,'filiere',$arrayError);  

       if (form_valid($arrayError)) {

                ajout_classe($datas);  
                $_SESSION['message']=1;
     
                header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.classe');
       }else{
    
               $_SESSION['arrayError']=$arrayError;
               header('location:'.WEB_ROUTE.'?controllers=responsable&view=ajout.classe');
           }
           
        
}
function insert_cours(array $datas):void{
    $arrayError=array();
    extract($datas);
    validation_champ($classe,'classe',$arrayError);
    validation_champ($id_annee_scolaire,'id_annee_scolaire',$arrayError);  
    validation_champ($semestre,'semestre',$arrayError);
    validation_champ($id_user,'id_user',$arrayError);  
    validation_champ($id_module,'id_module',$arrayError);  
    validation_champ($classe,'classe',$arrayError);  

    if (form_valid($arrayError)) {
   
             $id_cours = ajout_cours($datas);
              foreach($classe as $value){
                   $cour_classe=[
                        $value,
                        $id_cours 
                   ];
                     ajout_in_cours_classe($cour_classe);   
               }
            $_SESSION['message']=1; 
            header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.cours.nonplanifie');
            }else{
               $_SESSION['arrayError']=$arrayError;
               header('location:'.WEB_ROUTE.'?controllers=responsable&view=ajout.cours');
           }
           
        
}


function insert_planing_cours(array $datas):void{
    $arrayError=array();
    extract($datas);
        validation_champ($date,'date',$arrayError);  
        validation_champ($debut,'debut',$arrayError);  
        validation_champ($fin,'fin',$arrayError);

      
            $duree = $fin - $debut;
            if($debut > $fin ){
                $arrayError['debut'] = 'L\'heure de d??but doit ??tre inf??rieur ?? l\'heure de fin';
                $_SESSION['arrayError']=$arrayError;
                header('location:'.WEB_ROUTE.'?controllers=responsable&view=planing.cours');
            }if($debut == $fin ){
                $arrayError['debut'] = 'L\'heure et l\'heure de fin ne doivent pas ??tre ??gales';
                $_SESSION['arrayError']=$arrayError;
                header('location:'.WEB_ROUTE.'?controllers=responsable&view=planing.cours');
            }
            if (form_valid($arrayError)) {

                    $id =  $_GET['id_cours'];
                    $cours = find_cours_non_planifie_by_id($id);   
                    $reste = $cours[0]['heure_restante'] - $duree;
                    if(invalid_planing()){
                        $_SESSION['message']=12; 
                        header('location:'.WEB_ROUTE.'?controllers=responsable&view=planing.cours&id_cours='.$_GET['id_cours']);
                   
                    }elseif ($reste < 0) {
                        $_SESSION['erreurPlaning'] = 'La dur??e du cours ne peut pas ??tre inf??rieur ?? 0';
                        header('location:'.WEB_ROUTE.'?controllers=responsable&view=planing.cours');
                    }else {
                        update_heure_restante($reste ,$id );
                        ajout_planing_cours($datas);   
                        $_SESSION['message']=10; 
                        header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.cours.nonplanifie');
                    }
                    
            }else{
    
               $_SESSION['arrayError']=$arrayError;
               header('location:'.WEB_ROUTE.'?controllers=responsable&view=planing.cours&id_cours='.$_GET['id_cours']);
           } 
}
function liste_all_professeur(){
    if (isset($_GET["page"])) {    
        $page  = $_GET["page"];    
    }    
    else {    
      $page=1;    
    } 
    $data =find_all_professeur($page);

    $professeurs = $data['data'];   
    $per_page_record = $data['per_page_record'] ;   
    $total_records= $data['total_records'];
    require ( ROUTE_DIR . 'view/responsable/liste.professeur.html.php' );
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

function liste_cours_proprieties(){
    $classes = get_all_classe();
    $modules = find_all_module();
    $professeurs = get_all_professeur();
    $annee_scolaires=find_annee_scolaire_en_cours();
    require ( ROUTE_DIR . 'view/responsable/ajout.cours.html.php' );
}
function liste_cours_no_planified(){
    
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
}
function liste_cours_by_id(){

    $id =  $_SESSION['id_classe'];    
    if (isset($_POST['ok'])) {
        $all_cours = filterCours ($_POST['debut'] , $_POST['fin']) ;
    }else{
        $all_cours = find_cours_by_id($id );
    }

    $classes = get_all_classe();
    $planings = getplaningdebut();
    $planins = getplaningfin();

    require ( ROUTE_DIR . 'view/responsable/liste.cours.html.php' );
}

function delete_a_user(){
    $data = get_cours_non_planifie();
    foreach ($data as  $value) {
        if ($value['id_user'] == $_GET ['id_user'] ) {
            $_SESSION['erreurSuppression']= 'Ce professeur est li?? ?? un cours , Pour le supprimer veuillez le modifier dans les cours qui lui sont li??s ';
            header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.professeur');
        }
    }
    $id = $_GET ['id_user']; 
    $delete =  delete_user($id); 
    header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.professeur');
}
function delete_a_classe(){
    $data = get_cours_non_planifie();
    foreach ($data as  $value) {
        if ($value['id_classe'] == $_GET ['id_classe'] ) {
            $_SESSION['erreurSuppression']= 'Cette classe est li?? ?? un cours , Pour le supprimer veuillez supprimer le cours qui lui est li?? ';
            header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.classe');
        }
    }
    $id = $_GET ['id_classe']; 
    $delete =  delete_classe($id); 
    header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.classe');


}
function delete_a_cours(){
    $id = $_SESSION['t'];
    $getcour = find_cours_by_id_cours($id);
    $reste = $getcour[0]['heure_restante'] + ($getcour[0]['fin'] - $getcour[0]['debut']);
    $delete =  delete_cours($id);
    $get =  update_heure_restante($reste ,$getcour[0]['id_cours'] );
    header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.cours.perid&id_classe='.$_SESSION['id_classe']);
    unset( $_SESSION['t']);
}

function get_user(){
    $id = $_GET ['id_user'];
    $users = get_all_etudiant_by_id($id);  
    require ( ROUTE_DIR . 'view/responsable/ajout.professeur.html.php' );

}
function get_users(){
    $id = $_GET ['id_user'];
    $users = get_user_by_id($id);  
    require ( ROUTE_DIR . 'view/responsable/ajout.professeur.html.php' );

}
function get_classe(){
    $id = $_GET ['id_classe'];
    $classes = get_classe_by_id($id);  
    require ( ROUTE_DIR . 'view/responsable/ajout.classe.html.php' );

}
function get_cours(){
    $id = $_GET ['id_cours'];

    $cours = find_cours_non_planifie_by_id($id); 

    $classes = get_all_classe();
    $modules = find_all_module();
    $professeurs = get_all_professeur();
    $annee=find_annee_scolaire_en_cours();
        $classe_cours = classe_cours($id);

    require ( ROUTE_DIR . 'view/responsable/ajout.cours.html.php' );
    
}
function modif_prof(array $datas, array $files):void{
    $arrayError=array();
    extract($datas);
       validation_login($login,'login',$arrayError);  
       validation_password($password,'password',$arrayError);
       validation_champ($prenom,'prenom',$arrayError);
       validation_champ($nom,'nom',$arrayError);    
       $annee_scolaires=find_annee_scolaire();
   
       if (form_valid($arrayError)) {
                foreach ($annee_scolaires as $annee){
                    if ($annee['etat_annee_scolaire'] == 'en_cours') {
                        $annee_en_ecours = $annee;  
                    }
                } 
                $id = $_SESSION['id_user'];
                $target_dir = "upload/";
                $target_file = $target_dir . basename($_FILES['avatar']['name']);
                $datas['avatar'] = $target_file;
                upload_image($_FILES, $target_file);
                update_user_prof($datas);  
                $_SESSION['message'] = 2;                  
 		if(est_responsable()){   
                	header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.professeur');
                }elseif(est_professeur()){  
                    	header('location:'.WEB_ROUTE.'?controllers=professeur&view=liste.cours.professeur');
                }
            if(est_attache()){               
                $inscription = get_inscription_student($id_user);
                foreach($inscription as $inscript){
                    if ($inscript['id_classe'] == $_POST['classe'] && $_SESSION['annee_en_ecours']['annee_scolaire'] == $annee_en_ecours['annee_scolaire']) {
                            $_SESSION['message']=01;
                            header('location:'.WEB_ROUTE.'?controllers=responsable&view=reinscrire&id_user='.$id);
                    }else{
                        $id_inscription = $inscription[0]['id_inscription'];
                        update_classe_etudiant($id_inscription , $classe); 
                        update_user_etudiant($id_user ,$nom ,$prenom,$login,$password,$adresse); 
                        foreach ($annee_scolaires as $annee){
                            if ($annee['etat_annee_scolaire'] == 'en_cours') {
                                $_SESSION['annee_en_ecours'] = $annee;  
                            }
                        } 
                        $_SESSION['message']=3;                  
                        header('location:'.WEB_ROUTE.'?controllers=attache&view=liste.etudiant');
                    }
                }
          }
       }else{
               $_SESSION['arrayError']=$arrayError;
               header('location:'.WEB_ROUTE.'?controllers=responsable&view=updateUser&id_user='.$id_user);
           }      
}  
function modif_classe(array $datas):void{
        $arrayError=array();
        extract($datas);
        validation_champ($nom_classe,'nom_classe',$arrayError);  
       if (form_valid($arrayError)) {
            $id =$_SESSION['id_classe']   ;
            update_classe($id,$nom_classe ,$filiere,$niveau);   
            $_SESSION['message']=2;
            header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.classe');
       }else{
               $_SESSION['arrayError']=$arrayError;
               header('location:'.WEB_ROUTE.'?controllers=responsable&view=updateClasse&id_classe='.$id_classe);
           }      
}
function modif_cours(array $datas):void{
    $arrayError=array();
    extract($datas);
    validation_champ($classe,'classe',$arrayError);
    validation_champ($id_annee_scolaire,'id_annee_scolaire',$arrayError);  
    validation_champ($semestre,'semestre',$arrayError);
    validation_champ($id_user,'id_user',$arrayError);  
    validation_champ($id_module,'id_module',$arrayError);  
    validation_champ($classe,'classe',$arrayError);  
    if (form_valid($arrayError)) {
       
         update_cours($id_cours ,$semestre ,$id_user,$id_module,$id_annee_scolaire);   
        foreach($classe as $value){
            $cour_classe=[
                 $value,
                 $id_cours 
            ];
            var_dump($cour_classe);
           ajout_in_cours_classe($cour_classe);   
        }
        $_SESSION['message']=2;
        
        
      header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.cours.nonplanifie');
   }else{
            $_SESSION['arrayError']=$arrayError;
          header('location:'.WEB_ROUTE.'?controllers=responsable&view=updateCours&id_cours='.$id_cours);
       }      
}


function user_page(){
    $user = $_SESSION['userConnect'][0];
   require ( ROUTE_DIR . 'view/responsable/user.page.html.php' );

}




function cours_partage_by_classe(){
    $id = $_GET['id_cours'];
    $coursPartage = find_classe_suivant_mm_cours($id);
    require ( ROUTE_DIR . 'view/responsable/classe.concernee.html.php' );

}

function ajout_annee_scolaire(array $datas):void{
    $arrayError=array();
    extract($datas);
    validation_champ($annee,'annee',$arrayError);  

       if (form_valid($arrayError)) {
                    update_annee_scolaire('terminee');   
                    insert_in_annee_scolaire($datas);
                    $_SESSION['message']=1;
                    header('location:'.WEB_ROUTE.'?controllers=responsable&view=definir.annee');
            }else{
                $_SESSION['message']=2;
                $_SESSION['arrayError']=$arrayError;
                header('location:'.WEB_ROUTE.'?controllers=responsable&view=definir.annee');
       } 
}
function tableau_bord(){

    $cours = nombre_de_cours();
    $nbrcours=$cours[0]['count(p.id_planing)'];

    $datas = count_all_classe();
    $nbrclasse=$datas[0] ["count(id_classe)"];
    $cours_per_classe =ceil($nbrcours/$nbrclasse);

    $data = count_all_professeur();
    $nbrprof=$data[0]["count(id_user)"];
    $cours_per_prof = ceil($nbrcours/$nbrprof);
    $classes = get_all_classe();
    $professeurs = get_all_professeur();
    $total_etudiants = get_all_student();
    $annee_scolaire=find_annee_scolaire_en_cours();
    $users = get_all_students();
    foreach ($users as $user) {
        $response = get_my_number_absence($user['id_user']);
        foreach ($response as  $value) {
            if ($value["duree"]>25) {
                $absentSup25h[]=$value;
            }
        }
    }
     /* elseif ($value["duree"]>50) {
                $plusAbsent??iste[]=$value;
            } */
    require ( ROUTE_DIR . 'view/responsable/tableau.bord.html.php' );
    
 }
 
 function getData(){
    $response=  getCoursByProf();
    echo json_encode($response);
 }
function getDatas(){
    $response=  getCoursByClasse();
    echo json_encode($response);
}

/* function getAbsentsup(){
     $users = get_all_students();
    foreach ($users as $user) {
        $response = get_my_number_absence($user['id_user']);
        foreach ($response as  $value) {
            if ($value["duree"]>25) {
                $absentSup25h[]=$value;
                var_dump($absentSup25h);
            }
        }
    } 
} */

?>
