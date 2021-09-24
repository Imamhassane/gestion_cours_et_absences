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
function get_classe_by_id(int $id_classe){
   $pdo = ouvrir_connexion_db();
   $sql = "select * from classe 
   where id_classe =  ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_classe));
   $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}
function find_all_classe($page=null):array{
   $pdo = ouvrir_connexion_db();
   $per_page_record = 15;      
   $start_from = ($page-1) * $per_page_record;     

      $sql = "SELECT * FROM  classe LIMIT $start_from, $per_page_record";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute();
      $sql2 =  "SELECT * FROM  classe ";
      $stn = $pdo->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stn->execute();
      $datas['data'] = $sth->fetchAll((PDO::FETCH_ASSOC));
      $datas['row'] =$sth->rowCount();
      $datas['per_page_record'] =$per_page_record;

      $datas['total_records'] =$stn->rowCount();


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

function ajout_classe(array $datas):int{
    $pdo = ouvrir_connexion_db();
    extract($datas);
    $sql = "INSERT INTO `classe` ( `nom_classe`, `niveau`, `filiere`) 
        VALUES ( ?, ?, ?)"; 
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($nom_classe , $niveau ,$filiere ));
        fermer_connexion_bd($pdo);
    return $sth->rowCount();
 }

 function ajout_cours( $datas):int{
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql = "INSERT INTO `cours` ( `id_annee_scolaire`, `id_classe`, `id_module`, `id_user`, `semestre`)
    VALUES ( ?, ?, ?, ?, ?)"; 
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_annee_scolaire, $classe ,$id_module,$id_user,$semestre ));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
}
function ajout_planing_cours( $datas):int{
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql ="INSERT INTO `planing_cours` (`date_cours`, `debut`, `fin`, `id_cours`) 
      VALUES ( ? , ?, ?, ?)";
      $id_cours =  $_GET['id_cours'];
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($date, $debut , $fin , $id_cours));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
} 

function find_cours_non_planifie($page=null){
   $pdo = ouvrir_connexion_db();
   $per_page_record = 5;      
    //listing

   $start_from = ($page-1) * $per_page_record;     
      $sql =  "SELECT * FROM  cours c , user u , module m , classe cl , annee_scolaire an
      where c.id_user = u.id_user 
      and c.id_module = m.id_module
      and c.id_classe = cl.id_classe
      and c.id_annee_scolaire = an.id_annee_scolaire  LIMIT $start_from, $per_page_record";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute();
      //listing
      //pagination
      $sql1 =  "SELECT * FROM  cours c";
        $stm = $pdo->prepare($sql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute();
        //pagination
      $datas['data'] = $sth->fetchAll((PDO::FETCH_ASSOC));
      $datas['row'] =$sth->rowCount();
      $datas['per_page_record'] =$per_page_record;
      $datas['total_records'] =$stm->rowCount();

      //var_dump($stm->rowCount());
   fermer_connexion_bd($pdo);
  return  $datas ;
}
/*  function find_cours_non_planifie_paginate($stat , $npage ){
   $pdo = ouvrir_connexion_db();
      $sql = "select * from cours c , user u , module m , classe cl , annee_scolaire an
      where c.id_user = u.id_user 
      and c.id_module = m.id_module
      and c.id_classe = cl.id_classe
      and c.id_annee_scolaire = an.id_annee_scolaire LIMIT $stat , $npage ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute();
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}  */

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
function find_cours_by_id( $id_cours){
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



function filter_cours_non_planifie($etat_annee_scolaire = "en_cours" , $professeur ,$module,$classe){
   $pdo = ouvrir_connexion_db();
      $sql = "select * from cours c , user u , module m , classe cl , annee_scolaire an 
      where c.id_user = u.id_user 
      and c.id_module = m.id_module
      and c.id_classe = cl.id_classe
      and c.id_annee_scolaire = an.id_annee_scolaire 
      and an.etat_annee_scolaire  like ? 
      and u.prenom like ?
      and m.libelle_module like ?
      and cl.nom_classe like ?";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($etat_annee_scolaire , $professeur,$module,$classe));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function filter_classe_by_annee($etat_annee_scolaire = "en_cours" ){
   $pdo = ouvrir_connexion_db();
      $sql = "select * from cours c , user u , module m , classe cl , annee_scolaire an 
      where c.id_user = u.id_user 
      and c.id_module = m.id_module
      and c.id_classe = cl.id_classe
      and c.id_annee_scolaire = an.id_annee_scolaire 
      and an.etat_annee_scolaire  like ? ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($etat_annee_scolaire));
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


function delete_cours( $id_planing) {
   $pdo = ouvrir_connexion_db();
   $sql = " DELETE FROM `planing_cours` 
      WHERE `id_planing` = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_planing));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
}
function delete_user( $id_user) {
   $pdo = ouvrir_connexion_db();
   $sql = " DELETE FROM `user` 
      WHERE `id_user` = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_user));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
}

function delete_classe( $id_classe) {
   $pdo = ouvrir_connexion_db();
   $sql = " DELETE FROM `classe` 
      WHERE `id_classe` = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_classe));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
}



 function update_heure_restante(  $id_cours ,  $heure_restante ){
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql = "UPDATE `cours` SET `heure_restante` = ?
      WHERE `cours`.`id_cours` = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_cours , $heure_restante));
   fermer_connexion_bd($pdo);
   return $sth->rowCount();
}  
function update_user_prof($id_user ,$nom ,$prenom,$login,$password,$grade,$specialite){
   $pdo = ouvrir_connexion_db();
  $sql = " UPDATE `user` 
  SET  `nom` = :nom, 
  `prenom` = :prenom,
   `login` = :login, 
   `password` = :password, 
   `grade` = :grade,
   `specialite` = :specialite
   WHERE `id_user` = :id_user ";

   $stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom', $nom,PDO::PARAM_STR);
$stmt->bindParam(':prenom', $prenom,PDO::PARAM_STR);
$stmt->bindParam(':login',$login,PDO::PARAM_STR);
$stmt->bindParam(':password',$password,PDO::PARAM_STR);
$stmt->bindParam(':grade',$grade,PDO::PARAM_STR);
$stmt->bindParam(':specialite',$specialite,PDO::PARAM_STR);
$stmt->bindParam(':id_user',$id_user,PDO::PARAM_STR);
$stmt->execute();
fermer_connexion_bd($pdo);
   return $stmt->rowCount();
}  
function update_classe($id_classe ,$nom_classe ,$filiere,$niveau){
   $pdo = ouvrir_connexion_db();
  $sql = " UPDATE `classe` 
  SET  `nom_classe` = :nom_classe, 
  `filiere` = :filiere,
   `niveau` = :niveau
   WHERE `id_classe` = :id_classe ";

   $stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom_classe', $nom_classe,PDO::PARAM_STR);
$stmt->bindParam(':filiere', $filiere,PDO::PARAM_STR);
$stmt->bindParam(':niveau',$niveau,PDO::PARAM_STR);
$stmt->bindParam(':id_classe',$id_classe,PDO::PARAM_STR);
$stmt->execute();
// $result = $stmt->rowCount();
// echo $result;
fermer_connexion_bd($pdo);
   return $stmt->rowCount();
}  
function update_cours(int $id_cours ,  $semestre ,int  $id_user , int $id_module , int $id_annee_scolaire , int $classe){
   $pdo = ouvrir_connexion_db();
  $sql = " UPDATE `cours` 
  SET  `semestre` = :semestre, 
   `id_user` = :id_user,
   `id_module` = :id_module, 
   `id_annee_scolaire` = :id_annee_scolaire, 
   `id_classe` = :classe
   WHERE `id_cours` = :id_cours ";

   $stmt = $pdo->prepare($sql);
$stmt->bindParam(':semestre', $semestre,PDO::PARAM_STR);
$stmt->bindParam(':id_user', $id_user,PDO::PARAM_STR);
$stmt->bindParam(':id_module',$id_module,PDO::PARAM_STR);
$stmt->bindParam(':id_annee_scolaire',$id_annee_scolaire,PDO::PARAM_STR);
$stmt->bindParam(':classe',$classe,PDO::PARAM_STR);
$stmt->bindParam(':id_cours',$id_cours,PDO::PARAM_STR);
$stmt->execute();
fermer_connexion_bd($pdo);
   return $stmt->rowCount();
} 
?>