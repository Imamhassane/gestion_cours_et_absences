<?php


function find_my_cours( int $id_user){
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT * FROM `inscription` i , user u, classe cl, module m  , annee_scolaire an ,classe_cours cc,planing_cours p , cours c
       WHERE u.id_user = i.id_user
       and cl.id_classe = i.id_classe
       and c.id_cours=cc.id_cours 
       and cl.id_classe = cc.id_classe 
       and m.id_module = c.id_module
       and c.id_annee_scolaire = an.id_annee_scolaire  
       and c.id_cours = p.id_cours 
       and u.id_user = ? ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$id_user]);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
 }




function filter_my_cours($id_user , $etat_annee_scolaire = "en_cours" , $module){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT * FROM `inscription` i , user u, classe cl, module m  , annee_scolaire an ,classe_cours cc,planing_cours p , cours c
      WHERE u.id_user = i.id_user
      and cl.id_classe = i.id_classe
      and c.id_cours=cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and m.id_module = c.id_module
      and c.id_annee_scolaire = an.id_annee_scolaire  
      and c.id_cours = p.id_cours 
      and u.id_user = ?
      and an.etat_annee_scolaire  like ?
      and m.libelle_module like ? ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute([$id_user , $etat_annee_scolaire , $module]);
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}


?>