<?php

function insert_in_inscription($date, $annee_scolaire , $user , $classe){
    $pdo = ouvrir_connexion_db();
    extract($datas);
    $sql ="INSERT INTO `inscription` (`date_inscription`, `id_annee_scolaire`, `id_user`, `id_classe`) 
            VALUES (?, ?, ? , ?)";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($date, $annee_scolaire , $user , $classe));
    fermer_connexion_bd($pdo);
 
    return $sth->rowCount();
}


function get_all_etudiant():array{
    $pdo = ouvrir_connexion_db();
       $sql = "select * from user u , role r , inscription i , classe c
       where u.id_role = r.id_role 
       and u.id_user = i.id_user
       and c.id_classe = i.id_classe
       and r.nom_role like ? ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute(['ROLE_ETUDIANT']);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function filter_all_etudiant($etat_annee_scolaire = "en_cours" , $classe):array{
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT * from user u , role r , inscription i , classe c ,annee_scolaire an 
       where u.id_role = r.id_role 
       and u.id_user = i.id_user
       and an.id_annee_scolaire = i.id_annee_scolaire
       and c.id_classe = i.id_classe
       and c.nom_classe like ?
       and an.etat_annee_scolaire like ?";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$etat_annee_scolaire,$classe]);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
     //  var_dump($sth);

    fermer_connexion_bd($pdo);
   return  $datas ;
}
function find_all_cours(){
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl,planing_cours p
       where c.id_user = u.id_user 
       and c.id_cours=cc.id_cours 
       and cl.id_classe = cc.id_classe 
       and c.id_module = m.id_module
       and c.id_annee_scolaire = an.id_annee_scolaire  
       and c.id_cours = p.id_cours ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute();
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
 }

 function get_all_etudiant_by_classe($id_classe):array{
    $pdo = ouvrir_connexion_db();
       $sql = "select * from user u , role r , inscription i , classe c
       where u.id_role = r.id_role 
       and u.id_user = i.id_user
       and c.id_classe = i.id_classe
       and c.id_classe = ? ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$id_classe]);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}


function filter_cours($etat_annee_scolaire = "en_cours" , $professeur ,$module, $classe){
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl ,planing_cours p
       where c.id_user = u.id_user 
       and c.id_cours=cc.id_cours 
       and cl.id_classe = cc.id_classe 
       and c.id_module = m.id_module
       and c.id_cours = p.id_cours
       and c.id_annee_scolaire = an.id_annee_scolaire  
       and an.etat_annee_scolaire  like ? 
       and u.prenom like ?
       and m.libelle_module like ? 
       and cl.nom_classe like ? ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute(array($etat_annee_scolaire , $professeur,$module,$classe));
       //var_dump($sth);

       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
 }

function get_absence_etudiant($id_user):array{
    $pdo = ouvrir_connexion_db();
        $sql = "SELECT * FROM  absence a ,user u , cours c ,module m , classe_cours cc , classe cl , planing_cours p
        where u.id_user = a.id_user 
        and c.id_cours = a.id_cours 
        and m.id_module = c.id_module 
        and c.id_cours = cc.id_cours 
        and c.id_cours = p.id_cours
        and cl.id_classe = cc.id_classe 
        and a.id_user =? ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([$id_user]);
        $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
    return  $datas ;
}
function get_absence_by_etudiant($id_user , $planing):array{
    $pdo = ouvrir_connexion_db();
        $sql = "SELECT * FROM  absence a ,user u , cours c ,module m , classe_cours cc , classe cl , planing_cours p
        where u.id_user = a.id_user 
        and c.id_cours = a.id_cours 
        and m.id_module = c.id_module 
        and c.id_cours = cc.id_cours 
        and c.id_cours = p.id_cours
        and cl.id_classe = cc.id_classe 
        and a.id_user = ?
        and p.id_planing = ? ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([$id_user , $planing]);
        $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
    return  $datas ;
}




function get_absence_by_cours($id_cours):array{
    $pdo = ouvrir_connexion_db();
        $sql = "SELECT * FROM  cours c, user u, absence a , planing_cours p , annee_scolaire an , module m , classe_cours cc , classe cl
        where  a.id_user = u.id_user 
        and c.id_cours = a.id_cours
        and c.id_cours = cc.id_cours
        and cl.id_classe = cc.id_classe
        and c.id_annee_scolaire= an.id_annee_scolaire
        and c.id_module = m.id_module
        and c.id_cours = p.id_cours
        and c.id_cours = ? ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([$id_cours]);
        $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
    return  $datas ;
}



function filter_absence_by_etudiant($id_user , $etat_annee_scolaire = "en_cours" , $semestre):array{
    $pdo = ouvrir_connexion_db();
        $sql = "SELECT * FROM  cours c, user u, absence a , planing_cours p , annee_scolaire an , module m , classe_cours cc , classe cl
        where  a.id_user = u.id_user 
        and c.id_cours = a.id_cours
        and c.id_cours = cc.id_cours
        and cl.id_classe = cc.id_classe
        and c.id_annee_scolaire= an.id_annee_scolaire
        and c.id_module = m.id_module
        and c.id_cours = p.id_cours
        and u.id_user = ?
        and an.etat_annee_scolaire like ? 
        and c.semestre like ? ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([ $id_user,$etat_annee_scolaire,$semestre]);
        $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
    return  $datas ;
}


?>