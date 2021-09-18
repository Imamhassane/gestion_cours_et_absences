<?php

/* 
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
 function ajout_user(array $user):int{
    $pdo = ouvrir_connexion_db();
    extract($user);
    $sql = " INSERT INTO user (nom, prenom, login, password, telephone, addresse , id_role  ) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($nom , $prenom ,$login, $password, $telephone ,$addresse ,  $id_role ));
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    fermer_connexion_bd($pdo);
 
    return $user = $del->rowCount();
 } */
?>