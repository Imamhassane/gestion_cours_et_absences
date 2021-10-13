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

function login_exist($login):array {
   $pdo = ouvrir_connexion_db();
   $sql = "select * from user u 
      where u.login like ?
   ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute([$login ]);
   $user = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
   return  $user ;
}

function generateRandomString($length = 3) {
   return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
function ajout_user(array $user):int{
    $pdo = ouvrir_connexion_db();
    extract($user);
    $sql = "INSERT INTO `user` ( `nom`, `prenom`, `login`, `password`, `grade`, `specialite`, `adresse`, `id_role` ,`avatar`,`matricule`)
    VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?)"; 
    if (isset($_POST['grade'])) {
      $id_role = 3;
    }elseif(isset($_POST['adresse'])){
      $id_role = 4;
      $date = date_format(date_create(), 'Y');
      $matricule = $date.'-'.$_POST['nom'].'-'.generateRandomString()  ;
    }else{
      $id_role = 2;
    }
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($nom , $prenom ,$login, $password, $grade ,$specialite ,$adresse,  $id_role , $avatar , $matricule));
    $dernier_id = $pdo->lastInsertId();

    fermer_connexion_bd($pdo);
    return $dernier_id;
 }


?>