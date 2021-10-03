<?php
// SELECT*FROM cours c ,user u ,classe cl,module m,annee_scolaire an,classe_cours cc, planing_cours p ,inscription i WHERE c.id_user = u.id_user and cl.id_classe = i.id_classe and c.id_cours=cc.id_cours and cl.id_classe = cc.id_classe and m.id_module = c.id_module and c.id_annee_scolaire = an.id_annee_scolaire and c.id_cours = p.id_cours and c.id_cours = 528

/* function find_my_cours( int $id_user , $page=null){

   $pdo = ouvrir_connexion_db();
   //listing
  $start_from = ($page-1) * per_page_record;     
     $sql =  "SELECT  FROM `inscription` i , user u, classe cl, module m  , annee_scolaire an ,classe_cours cc,planing_cours p , cours c
     WHERE u.id_user = i.id_user
     and cl.id_classe = i.id_classe
     and c.id_cours=cc.id_cours 
     and cl.id_classe = cc.id_classe 
     and m.id_module = c.id_module
     and c.id_annee_scolaire = an.id_annee_scolaire  
     and c.id_cours = p.id_cours 
     and u.id_user = ?
     ORDER by p.date_cours LIMIT $start_from,".per_page_record;
     $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $sth->execute([$id_user]);
     //listing
     //pagination
     $sql1 =  "SELECT p.date_cours , p.debut,p.fin,m.libelle_module,cl.nom_classe,c.semestre FROM `inscription` i , user u, classe cl, module m  , annee_scolaire an ,classe_cours cc,planing_cours p , cours c
     WHERE u.id_user = i.id_user
     and cl.id_classe = i.id_classe
     and c.id_cours=cc.id_cours 
     and cl.id_classe = cc.id_classe 
     and m.id_module = c.id_module
     and c.id_annee_scolaire = an.id_annee_scolaire  
     and c.id_cours = p.id_cours 
     and u.id_user = ?
     ORDER by p.date_cours ";
       $stm = $pdo->prepare($sql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $stm->execute([$id_user]);
       //pagination
     $datas['data'] = $sth->fetchAll((PDO::FETCH_ASSOC));
     $datas['row'] =$sth->rowCount();
     $datas['per_page_record'] =per_page_record;
     $datas['total_records'] =$stm->rowCount();

     //var_dump($stm->rowCount());
  fermer_connexion_bd($pdo);
 return  $datas ;
} */
function find_my_cours( int $id_user , $page=null){

   $pdo = ouvrir_connexion_db();
   //listing
  $start_from = ($page-1) * per_page_record;     
     $sql =  "SELECT p.date_cours , p.debut, p.fin,m.libelle_module,cl.nom_classe,c.semestre ,c.id_cours,cl.id_classe,u.nom,u.prenom
      FROM   classe cl, module m  , annee_scolaire an ,classe_cours cc,planing_cours p , cours c,user u  
     WHERE  c.id_cours=cc.id_cours 
      and c.id_user = u.id_user
     and cl.id_classe = cc.id_classe 
     and m.id_module = c.id_module
     and c.id_annee_scolaire = an.id_annee_scolaire  
     and c.id_cours = p.id_cours 
     and cl.id_classe = ?  ORDER by p.date_cours LIMIT $start_from,".per_page_record;
     $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $sth->execute([$id_user]);
     //listing
     //pagination
     $sql1 =  "SELECT p.date_cours , p.debut, p.fin,m.libelle_module,cl.nom_classe,c.semestre ,c.id_cours,cl.id_classe,u.nom,u.prenom
     FROM    classe cl, module m  , annee_scolaire an ,classe_cours cc,planing_cours p , cours c,user u  
     WHERE  c.id_cours=cc.id_cours 
      and c.id_user = u.id_user
     and cl.id_classe = cc.id_classe 
     and m.id_module = c.id_module
     and c.id_annee_scolaire = an.id_annee_scolaire  
     and c.id_cours = p.id_cours 
     and cl.id_classe = ?  ORDER by p.date_cours";
       $stm = $pdo->prepare($sql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $stm->execute([$id_user]);
       //pagination
     $datas['data'] = $sth->fetchAll((PDO::FETCH_ASSOC));
     $datas['row'] =$sth->rowCount();
     $datas['per_page_record'] =per_page_record;
     $datas['total_records'] =$stm->rowCount();

     //var_dump($stm->rowCount());
  fermer_connexion_bd($pdo);
 return  $datas ;
}


function get_classe_student($id_user){
   $pdo = ouvrir_connexion_db();
   $sql = "select * from user u , inscription i ,classe cl 
   where u.id_user = i.id_user 
   and cl.id_classe = i.id_classe 
   and u.id_user = ?   ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute([$id_user ]);
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



function insert_in_justification( $datas):int{
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql ="INSERT INTO `justification` ( `date_justification`, `motif`, `etat`, `id_absence`, `id_user`, `fiche_justification`) 
   VALUES ( ? , ?, ?, ?, ?,?)";
   $date= date_format(date_create(), 'Y-m-d') ;
   $etat ='non_traiter';
   $id_absence = $_SESSION['id_absence'];
   $id_user = $_SESSION['userConnect'][0]['id_user'];
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($date, $motif , $etat , $id_absence , $id_user,$fiche));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
} 


function get_my_justification($id_user){
   $pdo = ouvrir_connexion_db();
   $id = $_SESSION['id_user'];
       $sql = "SELECT * FROM justification j , user u , absence a ,planing_cours p , cours c ,module m
               where  u.id_user = j.id_user 
              and a.id_absence = j.id_absence
              and p.id_planing =a.id_planing
              and c.id_cours =p.id_cours
              and m.id_module = c.id_module
              and u.id_user = ?";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$id_user]);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
   return  $datas ;
}
function filiter_my_justification($date_justification  , $etat){
   $pdo = ouvrir_connexion_db();
       $sql = "SELECT * FROM justification j , user u , absence a ,planing_cours p , cours c ,module m,annee_scolaire an 
               where  u.id_user = j.id_user 
              and a.id_absence = j.id_absence
              and p.id_planing =a.id_planing
              and c.id_cours =p.id_cours
              and m.id_module = c.id_module
              and c.id_annee_scolaire = an.id_annee_scolaire
              and j.date_justification like ?
              and j.etat  like ? ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($date_justification ,$etat));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));

   fermer_connexion_bd($pdo);
  return  $datas ;
}



function get_my_number_absence($id_user){
  
$pdo = ouvrir_connexion_db();
$sql = " SELECT SUM(p.duree) FROM `absence` a , planing_cours p , user u
where p.id_planing = a.id_planing 
and u.id_user = a.id_user
and u.id_user = ?";
$sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array($id_user ));
$datas = $sth->fetchAll((PDO::FETCH_ASSOC));

fermer_connexion_bd($pdo);
return  $datas ;
}



function update_absence($etat , $id_absence){
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql = " UPDATE `absence` 
   SET `etat_absence` = ? 
   WHERE `absence`.`id_absence` = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($etat , $id_absence));
   fermer_connexion_bd($pdo);
   return $sth->rowCount();
}

?>