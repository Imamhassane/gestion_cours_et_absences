<?php
function get_all_student():array{
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT count(u.id_user) as users from user u , role r , inscription i , annee_scolaire an
       where u.id_role = r.id_role 
       and i.id_user= u.id_user
       and i.id_annee_scolaire = an.id_annee_scolaire
       and an.etat_annee_scolaire  like ?
       and r.nom_role like ?";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute(['en_cours','ROLE_ETUDIANT']);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function get_all_students():array{
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT * from user u , role r 
       where u.id_role = r.id_role 
       and r.nom_role like ?";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute(['ROLE_ETUDIANT']);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
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
 /* function get_all_etudiant():array{
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT * from user u , role r , inscription i , classe c
       where u.id_role = r.id_role 
       and u.id_user = i.id_user
       and c.id_classe = i.id_classe
       and r.nom_role like ? ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute(['ROLE_ETUDIANT']);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}  */

 function get_all_etudiant($page=null):array{
   
    $pdo = ouvrir_connexion_db();
    $start_from = ($page-1) * per_page_record;     

       $sql = "SELECT u.nom, u.prenom , u.matricule , c.nom_classe , r.nom_role,u.id_user from user u , role r , inscription i , classe c
       where u.id_role = r.id_role 
       and u.id_user = i.id_user
       and c.id_classe = i.id_classe
       and r.nom_role like ? 
       order by u.nom  asc LIMIT $start_from,".per_page_record;
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute(['ROLE_ETUDIANT']);

       $sql1 = "SELECT u.nom, u.prenom , u.matricule , c.nom_classe , r.nom_role,u.id_user from user u , role r , inscription i , classe c
       where u.id_role = r.id_role 
       and u.id_user = i.id_user
       and c.id_classe = i.id_classe
       and r.nom_role like ? 
       order by u.nom  asc ";
       
       $stm = $pdo->prepare($sql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $stm->execute(['ROLE_ETUDIANT']);
       
       
        $datas['data'] = $sth->fetchAll((PDO::FETCH_ASSOC));
        $datas['row'] =$sth->rowCount();
        $datas['per_page_record'] =per_page_record;
        $datas['total_records'] =$stm->rowCount();

    fermer_connexion_bd($pdo);
   return  $datas ;
}



function filter_all_etudiant($etat_annee_scolaire = "en_cours" , $classe):array{
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT u.nom, u.prenom , u.matricule , c.nom_classe ,u.id_user , r.nom_role , c.nom_classe , c.id_classe , an.id_annee_scolaire , 		an.annee_scolaire from user u , role r , inscription i , classe c ,annee_scolaire an 
       where u.id_role = r.id_role 
       and u.id_user = i.id_user
       and an.id_annee_scolaire = i.id_annee_scolaire
       and c.id_classe = i.id_classe
       and c.nom_classe like ?
       and an.etat_annee_scolaire like ?
       order by u.nom  asc ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$etat_annee_scolaire,$classe]);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
     //  var_dump($sth);

    fermer_connexion_bd($pdo);
   return  $datas ;
} 
function find_all_cours_for_attache($page = null){
    $pdo = ouvrir_connexion_db();
    $start_from = ($page-1) * per_page_record; 
    
    
       $sql = "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl,planing_cours p
       where c.id_user = u.id_user 
       and c.id_cours=cc.id_cours 
       and cl.id_classe = cc.id_classe 
       and c.id_module = m.id_module
       and c.id_annee_scolaire = an.id_annee_scolaire  
       and c.id_cours = p.id_cours LIMIT $start_from,".per_page_record;
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute();


       $sql1 = "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl,planing_cours p
       where c.id_user = u.id_user 
       and c.id_cours=cc.id_cours 
       and cl.id_classe = cc.id_classe 
       and c.id_module = m.id_module
       and c.id_annee_scolaire = an.id_annee_scolaire  
       and c.id_cours = p.id_cours ";
       $stm = $pdo->prepare($sql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $stm->execute();

       $datas['data'] = $sth->fetchAll((PDO::FETCH_ASSOC));
       $datas['row'] =$sth->rowCount();
       $datas['per_page_record'] =per_page_record;
       $datas['total_records'] =$stm->rowCount();

    fermer_connexion_bd($pdo);
   return  $datas ;
 }

 function get_all_etudiant_by_classe($id_classe):array{
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT * from  inscription i , classe cl ,user u 
       where i.id_user = u.id_user
       and cl.id_classe = i.id_classe
       and cl.id_classe = ? ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$id_classe]);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function get_all_etudiant_by_planing($id_planing):array{
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT * from  inscription i , classe cl , cours c , classe_cours cc , planing_cours p ,user u 
       where i.id_user = u.id_user
       and cl.id_classe = cc.id_classe
       and c.id_cours =cc.id_cours 
       and p.id_cours = c.id_cours
       and cl.id_classe = i.id_classe
       and p.id_planing = ? ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$id_planing]);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function get_all_etudiant_by_matricule($matricule):array{
    $pdo = ouvrir_connexion_db();
        $sql = "SELECT * from user u , role r , inscription i , classe c ,annee_scolaire an 
        where u.id_role = r.id_role 
        and u.id_user = i.id_user
        and an.id_annee_scolaire = i.id_annee_scolaire
        and c.id_classe = i.id_classe
        and u.matricule = ? ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$matricule]);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function filter_all_etudiant_by_classe($annee_scolaire = 'en_cours'):array{
    $pdo = ouvrir_connexion_db();
       $id = $_SESSION['id_classe'] ;
       $sql = "SELECT * from  inscription i , classe cl ,user u , annee_scolaire an
       where cl.id_classe = i.id_classe
       and an.id_annee_scolaire = i.id_annee_scolaire
       and u.id_user = i.id_user
       and cl.id_classe =  $id 
       and an.etat_annee_scolaire  like ? ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$annee_scolaire]);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function filter_all_etudiant_by_planing($annee_scolaire = 'en_cours'):array{
    $pdo = ouvrir_connexion_db();
       $id = $_SESSION['id_planing'] ;
       $sql = "SELECT * from  inscription i , classe cl , cours c , classe_cours cc , planing_cours p ,user u , annee_scolaire an
       where i.id_user = u.id_user
       and cl.id_classe = cc.id_classe
       and c.id_cours =cc.id_cours 
       and p.id_cours = c.id_cours
       and cl.id_classe = i.id_classe
       and i.id_annee_scolaire = an.id_annee_scolaire
       and p.id_planing =  $id 
       and an.etat_annee_scolaire  like ?";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$annee_scolaire]);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function filter_cours_for_attache($etat_annee_scolaire = "en_cours" ){
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl ,planing_cours p
       where c.id_user = u.id_user 
       and c.id_cours=cc.id_cours 
       and cl.id_classe = cc.id_classe 
       and c.id_module = m.id_module
       and c.id_cours = p.id_cours
       and c.id_annee_scolaire = an.id_annee_scolaire  
       and an.etat_annee_scolaire  like ? ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute(array($etat_annee_scolaire));
       //var_dump($sth);

       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
 }

function get_absence_etudiant($id_user):array{
    $pdo = ouvrir_connexion_db();
        $sql = "SELECT * FROM  absence a ,user u , cours c ,module m , classe_cours cc , classe cl , planing_cours p
        where u.id_user = a.id_user 
        and p.id_planing = a.id_planing
        and m.id_module = c.id_module 
        and c.id_cours = cc.id_cours 
        and c.id_cours = p.id_cours
        and cl.id_classe = cc.id_classe 
        and a.id_user = ? ";
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
        and p.id_planing = a.id_planing
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
function get_absence__etudiant($id_user ):array{
    $pdo = ouvrir_connexion_db();
        $sql = "SELECT * FROM  absence a ,user u , cours c ,module m , classe_cours cc , classe cl , planing_cours p
        where u.id_user = a.id_user 
        and p.id_planing = a.id_planing
        and m.id_module = c.id_module 
        and c.id_cours = cc.id_cours 
        and c.id_cours = p.id_cours
        and cl.id_classe = cc.id_classe 
        and a.id_user = ? ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([$id_user ]);
        $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
    return  $datas ;
}



function get_absence_by_cours($id_cours , $planing):array{
    $pdo = ouvrir_connexion_db();
        $sql = "SELECT * FROM  absence a ,user u , cours c ,module m , classe_cours cc , classe cl , planing_cours p
        where u.id_user = a.id_user 
        and p.id_planing = a.id_planing
        and m.id_module = c.id_module 
        and c.id_cours = cc.id_cours 
        and c.id_cours = p.id_cours
        and cl.id_classe = cc.id_classe 
        and c.id_cours = ?
        and p.id_planing = ?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([$id_cours , $planing]);
        $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
    return  $datas ;
}
function get_absence_cours($id_cours):array{
    $pdo = ouvrir_connexion_db();
        $sql = "SELECT * FROM  absence a ,user u , cours c ,module m , classe_cours cc , classe cl , planing_cours p
        where u.id_user = a.id_user 
        and p.id_planing = a.id_planing
        and m.id_module = c.id_module 
        and c.id_cours = cc.id_cours 
        and c.id_cours = p.id_cours
        and cl.id_classe = cc.id_classe 
        and c.id_cours = ?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([$id_cours ]);
        $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
    return  $datas ;
}


function filter_absence_by_etudiant( $etat_annee_scolaire = "en_cours" , $semestre):array{
    $pdo = ouvrir_connexion_db();
    $id = $_SESSION['id_user'];
        $sql = "SELECT * FROM  cours c, user u, absence a , planing_cours p , annee_scolaire an , module m , classe_cours cc , classe cl
        where  a.id_user = u.id_user 
        and p.id_planing = a.id_planing
        and c.id_cours = cc.id_cours
        and cl.id_classe = cc.id_classe
        and c.id_annee_scolaire= an.id_annee_scolaire
        and c.id_module = m.id_module
        and c.id_cours = p.id_cours
        and u.id_user = $id
        and an.etat_annee_scolaire like ? 
        and c.semestre like ? ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([ $etat_annee_scolaire,$semestre]);
        $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
    return  $datas ;
}


function get_all_justification($page=null){
    $pdo = ouvrir_connexion_db();
    $start_from = ($page-1) * per_page_record; 
    
    
       $sql = "SELECT * FROM justification j , user u , absence a
       where  u.id_user = j.id_user 
      and a.id_absence = j.id_absence LIMIT $start_from,".per_page_record;
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute();


       $sql1 = "SELECT * FROM justification j , user u , absence a
       where  u.id_user = j.id_user 
      and a.id_absence = j.id_absence ";
       $stm = $pdo->prepare($sql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $stm->execute();

       $datas['data'] = $sth->fetchAll((PDO::FETCH_ASSOC));
       $datas['row'] =$sth->rowCount();
       $datas['per_page_record'] =per_page_record;
       $datas['total_records'] =$stm->rowCount();

    fermer_connexion_bd($pdo);
   return  $datas ;
}

function all_justification(){

    $pdo = ouvrir_connexion_db();
         $sql = "SELECT * FROM justification j , user u , absence a
         where  u.id_user = j.id_user 
        and a.id_absence = j.id_absence";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute();
         $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
     fermer_connexion_bd($pdo);
     return  $datas ;
 }
 function filter_all_justification($date_absence){

    $pdo = ouvrir_connexion_db();
         $sql = "SELECT * FROM justification j , user u , absence a 
        where  u.id_user = j.id_user 
        and a.id_absence = j.id_absence 
        and j.date_justification  = ?";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute([$date_absence]);
         $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
     fermer_connexion_bd($pdo);
     return  $datas ;
 }

function justification_by_etuiant($id_absence){
    $pdo = ouvrir_connexion_db();
    $id = $_SESSION['id_user'];
        $sql = "SELECT * FROM justification j , user u , absence a ,planing_cours p , cours c ,module m
        where  u.id_user = j.id_user 
       and a.id_absence = j.id_absence
       and p.id_planing =a.id_planing
       and c.id_cours =p.id_cours
       and m.id_module = c.id_module
       and a.id_absence = ? ";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([$id_absence]);
        $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
    return  $datas ;
 }



 function update_justification($etat , $id_justification){
    $pdo = ouvrir_connexion_db();
    extract($datas);
    $sql = " UPDATE `justification` 
    SET `etat` = ? 
    WHERE `id_justification` = ? ;    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($etat , $id_justification));
    fermer_connexion_bd($pdo);
    return $sth->rowCount();
 }


function get_the_planing_id($justification){

    $pdo = ouvrir_connexion_db();
         $sql = "SELECT * FROM justification j , absence a ,planing_cours p 
         WHERE a.id_absence = j.id_absence 
         and p.id_planing = a.id_planing 
         and j.id_justification = ?";
         $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $sth->execute([$justification]);
         $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
     fermer_connexion_bd($pdo);
     return  $datas ;
 }

function getdureeabsencejustiie($id_user , $id_planing){
    $pdo = ouvrir_connexion_db();
        $sql = "SELECT duree FROM `justification` j , absence a , planing_cours p , user u
        where u.id_user = a.id_user 
        and j.id_absence = a.id_absence 
        and p.id_planing = a.id_planing 
        and u.id_user = ?
        and p.id_planing = ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_user,$id_planing]);
    $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}
function getdureeabsence($id_absence){
    $pdo = ouvrir_connexion_db();
        $sql = "SELECT * FROM  absence a ,planing_cours p , user u
        where u.id_user= a.id_user 
        and p.id_planing = a.id_planing
        and a.id_absence = ?";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_absence]);
    $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}
?>
