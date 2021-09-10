<?php
function find_user_by_login_password($login , $password):array{
    $pdo = ouvrir_connexion_db();
       $sql = "select * from user u , role r 
       where u.id_role = r.id_role 
       and u.login like ?
       and u.password = ? 
       ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$login , $password]);
     
       $user = $sth->fetchAll((PDO::FETCH_ASSOC));
       
    fermer_connexion_bd($pdo);
   return  $user ;
}
?>