<?php
if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
    if ( isset ( $_GET [ 'view' ])) {
       if ( $_GET [ 'view' ]== 'connexion' ) {
        require ( ROUTE_DIR . 'view/security/connexion.html.php' );
       }elseif ( $_GET [ 'view' ]== 'deconnexion' ) {
            deconnexion();
        }
       
    }else{
        require ( ROUTE_DIR . 'view/security/connexion.html.php' );
    }
} elseif ($_SERVER ['REQUEST_METHOD' ]== 'POST') {
    if ( isset ( $_POST [ 'action' ])) {
        if ( $_POST [ 'action' ]== 'connexion' ) {
            connexion ( $_POST [ 'login' ], $_POST [ 'password' ]);
        }elseif($_POST['action']=='ajoutProf'){
            unset($_POST['action']);
            unset($_POST['controllers']);
            unset($_POST['password_confirm']);
            $_SESSION['restor'] = $_POST;
            insert_prof($_POST,$_FILES); 
        }
    } 

}



 function connexion(string $login,string $password):void{
    $arrayError=array();
    validation_login($login,'login',$arrayError);
     validation_password($password,'password',$arrayError);

     if (form_valid($arrayError)) {
        $user = find_user_by_login_password($login , $password);

        if (count($user)==0) {
          $arrayError['erreurConnexion']="login ou password incorrect ";
          $_SESSION['arrayError']= $arrayError;
          header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
        }else{

            $_SESSION ['userConnect'] = $user;
                $test = $user[0]['nom_role'];
            if (est_responsable()) {
              header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.professeur');
            }
            if (est_attache()) {
                header('location:'.WEB_ROUTE.'?controllers=attache&view=liste.etudiant');
            }
            if (est_professeur()) {
                header('location:'.WEB_ROUTE.'?controllers=professeur&view=liste.cours.professeur');
            }
            if (est_etudiant()) {
                header('location:'.WEB_ROUTE.'?controllers=etudiant&view=liste.etudiant.cours');
            }  

        }
     }else {
         $_SESSION['arrayError']=$arrayError;
         header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
     }
}

function insert_prof(array $datas, array $files):void{
    
    $arrayError=array();
    extract($datas);
        validation_login($login,'login',$arrayError);  
        validation_password($password,'password',$arrayError);
        validation_champ($prenom,'prenom',$arrayError);
        validation_champ($nom,'nom',$arrayError);
        if (est_responsable()) {
            validation_champ($grade,'grade',$arrayError); 
            validation_champ($specialite,'specialite',$arrayError);
        }elseif (est_attache()) {
            validation_champ($adresse,'adresse',$arrayError);   

        }
   
       // valide_image($_FILES, $arrayError, 'avatar', $target_file);
     
       if(login_exist($login)){
        $arrayError['login'] = 'Ce login existe déjà';
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controllers=responsable&view=ajout.professeur');
    }
       if (form_valid($arrayError)) {
           $target_dir = "upload/";
           $target_file = $target_dir . basename($_FILES['avatar']['name']);
           $datas['avatar'] = $target_file;
                upload_image($_FILES, $target_file);
                $id_user =  ajout_user($datas);
                if(est_attache()){
                    $date = date_format(date_create(), 'Y-m-d'); 
                    $annee_scolaire = 2 ;    
                    insert_in_inscription($date , $annee_scolaire , $id_user , $classe);  
                }

               $_SESSION['message']=1;

            if(est_responsable()){
                    header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.professeur');
            }elseif (est_attache()) {
                header('location:'.WEB_ROUTE.'?controllers=attache&view=liste.etudiant');
            }
       }else{
               $_SESSION['arrayError']=$arrayError;
               header('location:'.WEB_ROUTE.'?controllers=attache&view=inscrire.etudiant');
           }      
}
function deconnexion():void{
    unset($_SESSION['userConnect']);
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');

} 
?>