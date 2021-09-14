<?php
if ( $_SERVER ['REQUEST_METHOD' ]== 'GET' ) {
    if ( isset ( $_GET [ 'view' ])) {
       if ( $_GET [ 'view' ]== 'connexion' ) {
        require ( ROUTE_DIR . 'view/security/connexion.html.php' );
       }elseif ( $_GET [ 'view' ]== 'inscription' ) {
        require ( ROUTE_DIR . 'view/security/inscription.html.php' );
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
        }/* elseif ($_POST['action']=='inscription') {
            unset($_POST['controllers']);
            unset($_POST['action']);
            unset($data['password_confirm']);
            inscription($_POST); 
            
        } */
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
            if ($test ='ROLLE_RESPONSABLE_PEDAGOGIQUE') {
              header('location:'.WEB_ROUTE.'?controllers=responsable&view=liste.cours');
            }elseif ($test=='ROLE_ATTACHE') {
                header('location:'.WEB_ROUTE.'?controllers=attache&view=liste.etudiant.classe');
            }elseif ($test=='ROLE_PROFESSEUR') {
                header('location:'.WEB_ROUTE.'?controllers=attache&view=liste.cours.professeur');
            }elseif ($test=='ROLE_ETUDIANT') {
                header('location:'.WEB_ROUTE.'?controllers=attache&view=liste.etudiant.cours');
            }

        }
     }else {
         $_SESSION['arrayError']=$arrayError;
         header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');
     }
}

/*
function inscription(array $user):void{
  
    
    $arrayError=array();
    extract($user);
        validation_login($login,'login',$arrayError);
        if(login_exist($login)){
            $arrayError['login'] = 'Ce login existe déjà';
            $_SESSION['arrayError']=$arrayError;
            header('location:'.WEB_ROUTE.'?controllers=security&view=inscription');
      }
        validation_password($password,'password',$arrayError);
        validation_champ($prenom,'prenom',$arrayError);
        validation_champ($nom,'nom',$arrayError);
        if ($password != $password_confirm){
            $arrayError['password_confirm'] = 'Les deux password ne sont pas identiques';
        }               
        if (form_valid($arrayError)) {

               if (est_gestionnaire()) {
                   require(ROUTE_DIR.'view/reservation/liste.reservation.html.php' );
                }else {
                    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');

                }  
                ajout_user($user);         

        }else{
          
                $_SESSION['arrayError']=$arrayError;
                header('location:'.WEB_ROUTE.'?controllers=security&view=inscription');
            }
            
         
}*/
function deconnexion():void{
    unset($_SESSION['userConnect']);
    header('location:'.WEB_ROUTE.'?controllers=security&view=connexion');

} 
?>