<?php

function get_all_professeur():array{
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT * from user u , role r 
       where u.id_role = r.id_role 
       and r.nom_role like ?
       ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute(['ROLE_PROFESSEUR']);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function count_all_professeur():array{
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT count(id_user) from user u , role r 
      where u.id_role = r.id_role 
      and r.nom_role like ?
      ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(['ROLE_PROFESSEUR']);
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function find_all_professeur($page=null):array{
   $pdo = ouvrir_connexion_db();
    //listing
    $start_from = ($page-1) * per_page_record;     
    $sql =  "SELECT * FROM  user u , role r 
      where u.id_role = r.id_role 
      and r.nom_role like ? LIMIT $start_from, ".per_page_record;
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(['ROLE_PROFESSEUR']);
      //listing
      //pagination
      $sql1 =  "SELECT * FROM  user u , role r 
      where u.id_role = r.id_role 
      and r.nom_role like ? ";
      $stm = $pdo->prepare($sql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stm->execute(['ROLE_PROFESSEUR']);
        //pagination
      $datas['data'] = $sth->fetchAll((PDO::FETCH_ASSOC));
      $datas['row'] =$sth->rowCount();
      $datas['per_page_record'] =per_page_record;
      $datas['total_records'] =$stm->rowCount();

      //var_dump($stm->rowCount());
   fermer_connexion_bd($pdo);
  return  $datas ;
}

function get_user_by_id( $id_user){
   $pdo = ouvrir_connexion_db();
   $sql = "SELECT * from user 
   where id_user =  ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_user));
   $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}
function get_all_etudiant_by_id($id_user):array{
   $pdo = ouvrir_connexion_db();
       $sql = "SELECT * from user u , role r , inscription i , classe c ,annee_scolaire an 
       where u.id_role = r.id_role 
       and u.id_user = i.id_user
       and an.id_annee_scolaire = i.id_annee_scolaire
       and c.id_classe = i.id_classe
       and u.id_user = ? ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute([$id_user]);
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function get_classe_by_id(int $id_classe){
   $pdo = ouvrir_connexion_db();
   $sql = "SELECT * from classe 
   where id_classe =  ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_classe));
   $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}
function get_all_classe(){
   $pdo = ouvrir_connexion_db();
   $sql = "SELECT * from classe  ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
   $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}
function count_all_classe(){
   $pdo = ouvrir_connexion_db();
   $sql = "SELECT count(id_classe) from classe  ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
   $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}
function find_all_classe($page=null):array{
   $pdo = ouvrir_connexion_db();

   $start_from = ($page-1) * per_page_record;     

      $sql = "SELECT * FROM  classe LIMIT $start_from,".per_page_record;
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute();
      $sql2 =  "SELECT * FROM  classe ";
      $stn = $pdo->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $stn->execute();
      $datas['data'] = $sth->fetchAll((PDO::FETCH_ASSOC));
      $datas['row'] =$sth->rowCount();
      $datas['per_page_record'] =per_page_record;
      $datas['total_records'] =$stn->rowCount();
   fermer_connexion_bd($pdo);
  return  $datas ;
}




function find_all_module():array{
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT * from module";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute();
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
}
function find_annee_scolaire():array{
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT id_annee_scolaire, etat_annee_scolaire, annee_scolaire from annee_scolaire ORDER BY annee_scolaire  DESC ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute();
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function find_annee_scolaire_en_cours():array{
   $pdo = ouvrir_connexion_db();
   $sql = "SELECT * from annee_scolaire
   where  etat_annee_scolaire like ?  ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(['en_cours']);
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
   $sql = "INSERT INTO `cours` ( `id_annee_scolaire`, `id_module`, `id_user`, `semestre`)
    VALUES ( ?, ?, ?, ?)"; 
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_annee_scolaire ,$id_module,$id_user,$semestre ));
   $dernier_id = $pdo->lastInsertId();

   fermer_connexion_bd($pdo);
   return $dernier_id;
}

function ajout_in_cours_classe(array $datas){
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql = "INSERT INTO `classe_cours` ( `id_classe`, `id_cours`)
    VALUES ( ?, ?)"; 
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute($datas);
   fermer_connexion_bd($pdo);
   return $sth->rowCount();
}













function ajout_planing_cours( $datas):int{
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql ="INSERT INTO `planing_cours` (`date_cours`, `debut`, `fin`, `id_cours`,`duree`) 
      VALUES ( ? , ?, ?, ?,?)";
      $id_cours =  $_GET['id_cours'];
      $duree = ($_POST['fin']-$_POST['debut']);
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($date, $debut , $fin , $id_cours,$duree));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
} 

function find_cours_non_planifie($page=null){
   $pdo = ouvrir_connexion_db();
    //listing
   $start_from = ($page-1) * per_page_record;     
      $sql =  "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl
      where c.id_user = u.id_user 
      and c.id_cours=cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and c.id_module = m.id_module
      and c.id_annee_scolaire = an.id_annee_scolaire   LIMIT $start_from,".per_page_record;
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute();
      //listing
      //pagination
      $sql1 =  "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl
      where c.id_user = u.id_user 
      and c.id_cours=cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and c.id_module = m.id_module
      and c.id_annee_scolaire = an.id_annee_scolaire  ";
        $stm = $pdo->prepare($sql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute();
        //pagination
      $datas['data'] = $sth->fetchAll((PDO::FETCH_ASSOC));
      $datas['row'] =$sth->rowCount();
      $datas['per_page_record'] =per_page_record;
      $datas['total_records'] =$stm->rowCount();

      //var_dump($stm->rowCount());
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function find_cours_by_id_cours( $id_cours){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl,planing_cours p
      where c.id_user = u.id_user 
      and c.id_cours=cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and c.id_module = m.id_module
      and c.id_annee_scolaire = an.id_annee_scolaire  
      and c.id_cours = p.id_cours 
      and p.id_planing= ?";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($id_cours));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
  
}
function get_cours_non_planifie(){
   $pdo = ouvrir_connexion_db();
      $sql =  "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl
      where c.id_user = u.id_user 
      and c.id_cours=cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and c.id_module = m.id_module
      and c.id_annee_scolaire = an.id_annee_scolaire  ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute();
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}

function find_cours_non_planifie_by_id( $id_cours){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl
      where c.id_user = u.id_user 
      and c.id_cours=cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and c.id_module = m.id_module
      and c.id_annee_scolaire = an.id_annee_scolaire 
      and c.id_cours = ?";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($id_cours));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function find_cours_by_classe( $id_classe){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl,planing_cours p
      where c.id_user = u.id_user 
      and c.id_cours=cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and c.id_module = m.id_module
      and c.id_annee_scolaire = an.id_annee_scolaire  
      and c.id_cours = p.id_cours 
      and cl.id_classe = ?";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($id_classe));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}

function find_cours_by_id( $id_cours){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl,planing_cours p
      where c.id_user = u.id_user 
      and c.id_cours=cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and c.id_module = m.id_module
      and c.id_annee_scolaire = an.id_annee_scolaire  
      and c.id_cours = p.id_cours 
      and cl.id_classe = ?";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($id_cours));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
  
}
function find_classe_suivant_mm_cours( $id_cours){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT * FROM  cours c ,classe_cours cc,classe cl ,module m ,user u 
      where c.id_cours=cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and m.id_module= c.id_module
      and u.id_user= c.id_user
		and c.id_cours = ?   ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($id_cours));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
  
}

function filter_cours_non_planifie($etat_annee_scolaire = "en_cours" , $professeur ,$module, $classe){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl
      where c.id_user = u.id_user 
      and c.id_cours=cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and c.id_module = m.id_module
      and c.id_annee_scolaire = an.id_annee_scolaire  
      and an.etat_annee_scolaire  like ? 
      and u.prenom like ?
      and m.libelle_module like ? 
      and cl.nom_classe like ? ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array($etat_annee_scolaire , $professeur,$module,$classe));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));

   fermer_connexion_bd($pdo);
  return  $datas ;
}

function filterCours($debut, $fin){
   $pdo = ouvrir_connexion_db();
   $cours = $_SESSION['id_classe'];
      $sql = "SELECT * FROM  cours c , user u , module m  , annee_scolaire an ,classe_cours cc,classe cl, planing_cours p
      where c.id_user = u.id_user 
      and c.id_cours=cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and c.id_module = m.id_module
      and p.id_cours = c.id_cours
      and c.id_annee_scolaire = an.id_annee_scolaire  
      and p.debut  = ?
      and p.fin = ?
      and cl.id_classe = $cours ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array( $debut, $fin));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));

   fermer_connexion_bd($pdo);
  return  $datas ;
}
function getplaningdebut(){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT DISTINCT debut  FROM planing_cours ORDER BY debut ASC ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute();
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function getplaningfin(){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT DISTINCT fin FROM planing_cours ORDER BY  fin ASC";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute();
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function classe_cours($id_cours){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT * FROM classe_cours cc , classe cl 
      where cl.id_classe  = cc.id_classe
      and id_cours = ? ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute([$id_cours]);
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}
function verfi_planing($id){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT * from cours c , planing_cours p , classe cl , classe_cours cc where c.id_cours = p.id_cours and cl.id_classe = cc.id_classe and c.id_cours = cc.id_cours and cl.id_classe = ? ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute([$id ]);
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}

/* function delete_cours_planifie( $id_cours) {
   $pdo = ouvrir_connexion_db();
   $sql = " DELETE FROM `cours` 
      WHERE `id_cours` = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_cours));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
} */


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
function update_user_prof($datas){
   $pdo = ouvrir_connexion_db();
   extract($datas);
  $sql = " UPDATE `user` 
  SET  `nom` = :nom, 
  `prenom` = :prenom,
   `login` = :login, 
   `password` = :password, 
   `grade` = :grade,
   `specialite` = :specialite,
   `avatar` = :avatar
   WHERE `id_user` = :id_user ";

   $stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom', $nom,PDO::PARAM_STR);
$stmt->bindParam(':prenom', $prenom,PDO::PARAM_STR);
$stmt->bindParam(':login',$login,PDO::PARAM_STR);
$stmt->bindParam(':password',$password,PDO::PARAM_STR);
$stmt->bindParam(':grade',$grade,PDO::PARAM_STR);
$stmt->bindParam(':specialite',$specialite,PDO::PARAM_STR);
$stmt->bindParam(':avatar',$avatar,PDO::PARAM_STR);
$stmt->bindParam(':id_user',$id_user,PDO::PARAM_STR);
$stmt->execute();
fermer_connexion_bd($pdo);
   return $stmt->rowCount();
}  
function update_user_etudiant($id_user ,$nom ,$prenom,$login,$password,$adresse){
   $pdo = ouvrir_connexion_db();
  $sql = " UPDATE `user` 
  SET  `nom` = :nom, 
  `prenom` = :prenom,
   `login` = :login, 
   `password` = :password, 
   `adresse` = :adresse
   WHERE `id_user` = :id_user ";

   $stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom', $nom,PDO::PARAM_STR);
$stmt->bindParam(':prenom', $prenom,PDO::PARAM_STR);
$stmt->bindParam(':login',$login,PDO::PARAM_STR);
$stmt->bindParam(':password',$password,PDO::PARAM_STR);
$stmt->bindParam(':adresse',$adresse,PDO::PARAM_STR);
$stmt->bindParam(':id_user',$id_user,PDO::PARAM_STR);
$stmt->execute();
fermer_connexion_bd($pdo);
   return $stmt->rowCount();
}
function update_classe_etudiant($id_inscription , $classe){
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql = "UPDATE inscription
   SET id_classe=?
   WHERE id_inscription=? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array( $classe,$id_inscription));
   fermer_connexion_bd($pdo);
   return $sth->rowCount();
 }
function get_inscription_student($id_user){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT * FROM `inscription` i, classe cl , annee_scolaire an
       WHERE i.id_classe= cl.id_classe
       and an.id_annee_scolaire=i.id_annee_scolaire
       and i.id_user = ?";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute(array( $id_user));
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));

   fermer_connexion_bd($pdo);
  return  $datas ;
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
function update_cours(int $id_cours ,  $semestre ,int  $id_user , int $id_module , int $id_annee_scolaire){
   $pdo = ouvrir_connexion_db();
  $sql = " UPDATE `cours` 
  SET  `semestre` = :semestre, 
   `id_user` = :id_user,
   `id_module` = :id_module, 
   `id_annee_scolaire` = :id_annee_scolaire
   WHERE `id_cours` = :id_cours " ;

   $stmt = $pdo->prepare($sql);
$stmt->bindParam(':semestre', $semestre,PDO::PARAM_STR);
$stmt->bindParam(':id_user', $id_user,PDO::PARAM_STR);
$stmt->bindParam(':id_module',$id_module,PDO::PARAM_STR);
$stmt->bindParam(':id_annee_scolaire',$id_annee_scolaire,PDO::PARAM_STR);
$stmt->bindParam(':id_cours',$id_cours,PDO::PARAM_STR);
$stmt->execute();
fermer_connexion_bd($pdo);
   return $stmt->rowCount();
} 


function nombre_de_cours(){
   $pdo = ouvrir_connexion_db();
   $sql = " SELECT count(p.id_planing)
   FROM planing_cours p ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
   $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}

/* function nombre_de_cours_par_classe($id_classe){
   $pdo = ouvrir_connexion_db();
   $sql = " SELECT count(cl.id_classe)
   FROM `cours`c , planing_cours p , classe cl , classe_cours cc
  where c.id_cours = cc.id_cours
  and cl.id_classe = cc.id_classe
  and c.id_cours = p.id_cours
   and cl.id_classe = ?  ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute([$id_classe]);
   $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
} */

function update_annee_scolaire($etat){
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql = "UPDATE `annee_scolaire` 
   SET `etat_annee_scolaire` = ?
    WHERE `annee_scolaire`.`etat_annee_scolaire` = 'en_cours'   ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($etat));
   fermer_connexion_bd($pdo);
   return $sth->rowCount();
}


function insert_in_annee_scolaire( $datas):int{
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql ="INSERT INTO `annee_scolaire` ( `annee_scolaire`, `etat_annee_scolaire`) 
   VALUES ( ?, ?)";
   $newannee = $_POST['annee'];
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($newannee , 'en_cours'));
   fermer_connexion_bd($pdo);

   return $sth->rowCount();
} 

 function getCoursByProf(){
   $pdo = ouvrir_connexion_db();
   $sql = "SELECT count(c.id_cours) cours,u.prenom,u.nom FROM `cours`  c,`user`u ,`planing_cours`p , annee_scolaire an WHERE u.id_user=c.id_user and c.id_cours = p.id_cours and c.id_annee_scolaire=an.id_annee_scolaire and an.etat_annee_scolaire like ? GROUP By u.id_user";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(['en_cours']);
   $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}


function getCoursByClasse(){
   $pdo = ouvrir_connexion_db();
   $sql = "SELECT count(cl.id_classe) classe,cl.nom_classe FROM `cours` c,`classe` cl,classe_cours cc,planing_cours p ,annee_scolaire an WHERE c.id_cours =cc.id_cours and cl.id_classe = cc.id_classe and p.id_cours=c.id_cours and c.id_annee_scolaire=an.id_annee_scolaire and an.etat_annee_scolaire like ? GROUP By cl.id_classe";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(['en_cours']);
   $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}

?>