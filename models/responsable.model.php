<?php
function find_all_professeur():array{
    $pdo = ouvrir_connexion_db();
       $sql = "select * from user u , role r 
       where u.id_role = r.id_role 
       and r.nom_role like ?
       ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute(['ROLE_PROFESSEUR']);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function find_all_classe():array{
    $pdo = ouvrir_connexion_db();
       $sql = "select * from classe";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute();
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function find_all_module():array{
    $pdo = ouvrir_connexion_db();
       $sql = "select * from module";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute();
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function find_annee_scolaire():array{
   $pdo = ouvrir_connexion_db();
      $sql = "select * from annee_scolaire";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute();
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}

function ajout_classe(array $user):int{
    $pdo = ouvrir_connexion_db();
    extract($user);
    $sql = "INSERT INTO `classe` ( `nom_classe`, `niveau`, `filiere`) 
        VALUES ( ?, ?, ?)"; 
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($nom_classe , $niveau ,$filiere ));
        fermer_connexion_bd($pdo);
 
    return $sth->rowCount();
 }
 function insert_in_cours( $cours):int{
   $pdo = ouvrir_connexion_db();
   extract($cours);
   $sql = "INSERT INTO `cours` ( `id_annee_scolaire`, `id_classe`, `id_module`, `id_user`, `semestre`)
    VALUES ( ?, ?, ?, ?, ?)"; 
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_annee_scolaire, $classe ,$id_module,$id_user,$semestre ));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
}
function insert_in_planing_cours( $cours):int{
   $pdo = ouvrir_connexion_db();
   extract($cours);
   $sql ="INSERT INTO `planing_cours` (`date_cours`, `debut`, `fin`, `id_cours`) 
      VALUES ( ? , ?, ?, ?)";
      $id_cours =  $_GET['id_cours'];
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($date, $debut , $fin , $id_cours));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
} 

function find_cours_non_planifie($etat_annee_scolaire = "en_cours"){
   $pdo = ouvrir_connexion_db();
      $sql = "select * from cours c , user u , module m , classe cl , annee_scolaire an 
      where c.id_user = u.id_user 
      and c.id_module = m.id_module
      and c.id_classe = cl.id_classe
      and c.id_annee_scolaire = an.id_annee_scolaire 
      and an.etat_annee_scolaire  = ? ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($etat_annee_scolaire));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function find_cours_non_planifie_by_id( $id_cours){
   $pdo = ouvrir_connexion_db();
      $sql = "select * from cours c , user u , module m , classe cl , annee_scolaire an 
      where c.id_user = u.id_user 
      and c.id_module = m.id_module
      and c.id_classe = cl.id_classe
      and c.id_annee_scolaire = an.id_annee_scolaire 
      and c.id_cours = ?";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($id_cours));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function find_all_cours_by_id( $id_cours){
   $pdo = ouvrir_connexion_db();
      $sql = "select * from cours c , user u , module m , classe cl , annee_scolaire an ,  planing_cours p
      where c.id_user = u.id_user 
      and c.id_module = m.id_module
      and c.id_classe = cl.id_classe
      and c.id_annee_scolaire = an.id_annee_scolaire 
      and c.id_cours = p.id_cours 
      and c.id_cours = ?";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($id_cours));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function find_all_cours(){
   $pdo = ouvrir_connexion_db();
      $sql = "select * from cours c , user u , module m , classe cl , annee_scolaire an ,  planing_cours p
      where c.id_user = u.id_user 
      and c.id_module = m.id_module
      and c.id_classe = cl.id_classe
      and c.id_annee_scolaire = an.id_annee_scolaire 
      and c.id_cours = p.id_cours ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute();
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function find_all_cours_by_module(string $module){
   $pdo = ouvrir_connexion_db();
      $sql = "select * from cours c , user u , module m , classe cl , annee_scolaire an ,  planing_cours p
      where c.id_user = u.id_user 
      and c.id_module = m.id_module
      and c.id_classe = cl.id_classe
      and c.id_annee_scolaire = an.id_annee_scolaire 
      and c.id_cours = p.id_cours ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute([$module]);
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}

function delete_cours_planifie( $id_cours) {
   $pdo = ouvrir_connexion_db();
   $sql = " DELETE FROM `cours` 
      WHERE `id_cours` = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_cours));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
}
function delete_cours_by_id( $id_planing) {
   $pdo = ouvrir_connexion_db();
   $sql = " DELETE FROM `planing_cours` 
      WHERE `id_planing` = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_planing));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
}
function delete_user_by_id( $id_user) {
   $pdo = ouvrir_connexion_db();
   $sql = " DELETE FROM `user` 
      WHERE `id_user` = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_user));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
}

function delete_classe_by_id( $id_classe) {
   $pdo = ouvrir_connexion_db();
   $sql = " DELETE FROM `classe` 
      WHERE `id_classe` = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_classe));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
}
  

  
  


/* 
update

function get_cours_by_id(int $id_cours){
   $pdo = ouvrir_connexion_db();
      $sql = "select * from cours where id_cours = ? ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($id_cours));
      $id_cours_non_planifie = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
return  $id_cours_non_planifie ;
} */


/* 

update
*/
function get_user_by_id(int $id_user){
   $pdo = ouvrir_connexion_db();
   $sql = "select * from user 
   where id_user =  ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_user));
   $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}
/* function modifie_cours_planifie( $id_user){
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql = "UPDATE `user`
    SET `nom` = ?, `prenom` = ?, 
    `login` = ?, `password` = ?, 
    `grade` = ?, `specialite` = ?,
     `avatar` = ? WHERE 
     `user`.`id_user` = ?; ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($nom ,$prenom,$login ,$password,$grade,$specialite , $avatar , $id_user));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
}  */
 function modifie_heure_restante(  $id_cours ,  $heure_restante ){
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql = "UPDATE `cours` SET `heure_restante` = ?
      WHERE `cours`.`id_cours` = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_cours , $heure_restante));

   fermer_connexion_bd($pdo);

   return $sth->rowCount();
}  

?>