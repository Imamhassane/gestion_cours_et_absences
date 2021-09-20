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
            liste_all_cours();
           }elseif ( $_GET [ 'view' ]== 'liste.classe' ) {
            liste_all_classe();
           }elseif ( $_GET [ 'view' ]== 'liste.professeur' ) {
            liste_all_professeur();
           } elseif ( $_GET [ 'view' ]== 'ajout.cours' ) {
            ajout_cours();
           } elseif ( $_GET [ 'view' ]== 'liste.cours.nonplanifie' ) {
            liste_cours_no_planified();
           }  elseif ( $_GET [ 'view' ]== 'deleteCoursPlanifie' ) {
            delete_from_cours_nonplanifie();
           } elseif ( $_GET [ 'view' ]== 'modifieCoursPlanifie' ) {
            //get_the_cours_planifie_by_id();
           } elseif ( $_GET [ 'view' ]== 'deleteCours' ) {
            delete_cours();
           }  elseif ( $_GET [ 'view' ]== 'deleteUser' ) {
            delete_user();
           }
        }
    }elseif($_SERVER ['REQUEST_METHOD' ]=='POST'){
        if (isset($_POST['action'])){
            if($_POST['action']=='ajoutProf'){
                unset($_POST['controllers']);
                unset($_POST['action']);
                unset($_POST['password_confirm']);
                insert_prof($_POST); 
            }elseif($_POST['action']=='ajoutClasse'){
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
            }
        }
    }
 }else{
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
 }



 function insert_prof(array $user):void{

    $arrayError=array();
    extract($user);
       validation_login($login,'login',$arrayError);  
       validation_password($password,'password',$arrayError);
       validation_champ($prenom,'prenom',$arrayError);
       validation_champ($nom,'nom',$arrayError);    
          
       if(login_exist($login)){
        $arrayError['login'] = 'Ce login existe déjà';
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controllers=responsable&view=ajout.professeur');
    }
       if (form_valid($arrayError)) {
           
               ajout_user($user);       
               header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.professeur');
       }else{
                // var_dump($_GET);
               $_SESSION['arrayError']=$arrayError;
               header('location:'.WEB_ROUTE.'?controllers=responsable&view=ajout.professeur');
           }
           
        
}

function insert_classe(array $classe):void{
    $arrayError=array();
    extract($classe);
        validation_champ($nom_classe,'nom_classe',$arrayError);  
       if (form_valid($arrayError)) {

                ajout_classe($classe);       
                header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.classe');
       }else{
    
               $_SESSION['arrayError']=$arrayError;
               header('location:'.WEB_ROUTE.'?controllers=responsable&view=ajout.classe');
           }
           
        
}
function insert_cours(array $cours):void{
    $arrayError=array();
    extract($cours);
        validation_champ($duree,'duree',$arrayError);  
       // validation_champ($classe,'classe',$arrayError);  
       if (form_valid($arrayError)) {
              
                insert_in_cours($cours);       
                 header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.cours.nonplanifie');
            }else{
    
               $_SESSION['arrayError']=$arrayError;
               header('location:'.WEB_ROUTE.'?controllers=responsable&view=ajout.cours');
           }
           
        
}
function insert_planing_cours(array $planing):void{
    $arrayError=array();
    extract($planing);
        validation_champ($date,'date',$arrayError);  
        validation_champ($debut,'debut',$arrayError);  
        validation_champ($fin,'fin',$arrayError);  
            if($debut > $fin ){
                $arrayError['debut'] = 'L\'heure de début doit être inférieur à l\'heure de fin';
                $_SESSION['arrayError']=$arrayError;
                header('location:'.WEB_ROUTE.'?controllers=responsable&view=planing.cours');

            }
       if (form_valid($arrayError)) {
               
                insert_in_planing_cours($planing);       
                header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.cours');
            }else{
    
               $_SESSION['arrayError']=$arrayError;
               header('location:'.WEB_ROUTE.'?controllers=responsable&view=planing.cours');
           }
           
        
}

function delete_from_cours_nonplanifie(){
    $prof = find_cours_non_planifie();
    foreach ($prof as  $value) {
        if ($value['id_cours'] == $_GET ['id_cours'] ) {
            $_SESSION['erreurSuppression']= 'Ce cours est planifé , Pour le supprimer veuillez supprimer la planificcation compléte dans la liste des cours';
            header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.cours.nonplanifie');
        }
            
    }
    $id = $_GET ['id_cours'];
    $delete =  delete_cours_planifie($id);
    header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.cours.nonplanifie');

    
}
function delete_user(){
    $prof = find_cours_non_planifie();
    foreach ($prof as  $value) {
        if ($value['id_user'] == $_GET ['id_user'] ) {
            $_SESSION['erreurSuppression']= 'Ce professeur est enregistré dans un cours , Pour le supprimer veuillez supprimer les cours qui lui sont lié ';
            header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.professeur');
        }
            
    }
    $id = $_GET ['id_user']; 
    $delete =  delete_user_by_id($id); 
    header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.professeur');


}
/* function get_the_cours_planifie_by_id(){
    $id = $_GET ['id_cours'];
    $cours_planifie = get_cours_by_id($id);
    header('location:'.WEB_ROUTE.'?controllers=responsable&view=ajout.cours');

} */
/* function update_from_cours_planifie(){
    /* extract($cours);
    $id = $_GET ['id_cours'];
   /*  $update = [
       
        'id_classe' => $id_classe, 
           `id_module` => $id_module,
           `id_user` => $id_user,
           `semestre` => $semestre,
          `duree` => $duree , */
        // modifie_cours_planifie($id);
    /* ]; 
    header('location:'.WEB_ROUTE.'?controllers=responsable&view=ajout.cours');

} */


function liste_all_professeur(){
    $professeurs = find_all_professeur();
    require ( ROUTE_DIR . 'view/responsable/liste.professeur.html.php' );

}
function liste_all_classe() {
    $classes = find_all_classe();
    require ( ROUTE_DIR . 'view/responsable/liste.classe.html.php' );

}

function ajout_cours(){
    $classes = find_all_classe();
    $modules = find_all_module();
    $professeurs = find_all_professeur();
    $annee_scolaires=find_annee_scolaire();
    require ( ROUTE_DIR . 'view/responsable/ajout.cours.html.php' );


}
function liste_cours_no_planified(){
    $cours = find_cours_non_planifie();
    require ( ROUTE_DIR . 'view/responsable/liste.cours.nonplanifie.html.php' );
}

function liste_all_cours(){
    $all_cours = find_all_cours();
    require ( ROUTE_DIR . 'view/responsable/liste.cours.html.php' );
}
function delete_cours(){
    $id = $_GET ['id_planing'];
    $delete =  delete_cours_by_id($id);
    header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.cours');

}
?>