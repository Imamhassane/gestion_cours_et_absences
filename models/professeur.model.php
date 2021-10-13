<?php 
function cours_professeur( int $id_user , $page=null){

    $pdo = ouvrir_connexion_db();
    //listing
   $start_from = ($page-1) * per_page_record;     
      $sql =  "SELECT p.date_cours , p.debut ,p.fin , m.libelle_module , cl.nom_classe ,c.semestre,cl.id_classe,p.id_planing,c.id_cours
       FROM user u,planing_cours p , cours c , classe cl, classe_cours cc,module m 
       WHERE u.id_user = c.id_user 
       and c.id_cours = p.id_cours 
       and c.id_cours= cc.id_cours 
       and cl.id_classe = cc.id_classe 
       and m.id_module = c.id_module 
       and u.id_user = ? 
       order by p.date_cours  LIMIT $start_from,".per_page_record;
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute([$id_user]);
      //listing
      //pagination
      $sql1 =  "SELECT p.date_cours , p.debut ,p.fin , m.libelle_module , cl.nom_classe ,c.semestre
      FROM user u,planing_cours p , cours c , classe cl, classe_cours cc,module m 
      WHERE u.id_user = c.id_user 
      and c.id_cours = p.id_cours 
      and c.id_cours= cc.id_cours 
      and cl.id_classe = cc.id_classe 
      and m.id_module = c.id_module 
      and u.id_user = ? 
      order by p.date_cours ";
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





 function plan($id_user){
    $pdo = ouvrir_connexion_db();
       $sql = "SELECT p.date_cours , p.debut ,p.fin , m.libelle_module , cl.nom_classe ,c.semestre,cl.id_classe,p.id_planing,c.id_cours
       FROM user u,planing_cours p , cours c , classe cl, classe_cours cc,module m 
       WHERE u.id_user = c.id_user 
       and c.id_cours = p.id_cours 
       and c.id_cours= cc.id_cours 
       and cl.id_classe = cc.id_classe 
       and m.id_module = c.id_module 
       and u.id_user = ? ";
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$id_user ]);
       $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
   return  $datas ;
 }
 function filter_my_cours_professeur($id_user , $etat_annee_scolaire = "en_cours" , $classe){
   $pdo = ouvrir_connexion_db();
      $sql = "SELECT * FROM user u,planing_cours p , cours c , classe cl, classe_cours cc
      WHERE u.id_user = c.id_user
      and c.id_cours = p.id_cours
      and c.id_cours= cc.id_cours
      and cl.id_classe = cc.id_classe
      and u.id_user = ? 
      and an.etat_annee_scolaire  like ?
      and cl.nom_classe like ? ";
      $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $sth->execute([$id_user , $etat_annee_scolaire , $classe]);
      $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
  return  $datas ;
}




 function my_classe_professeur($id_user , $page=null):array{
    $pdo = ouvrir_connexion_db();
 
    $start_from = ($page-1) * per_page_record;     
 
       $sql = " SELECT * FROM  classe cl , cours c, classe_cours cc , user u
      where c.id_cours = cc.id_cours
      and cl.id_classe = cc.id_classe 
      and u.id_user = c.id_user
      and u.id_user = ? LIMIT $start_from,".per_page_record;
       $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $sth->execute([$id_user]);


       $sql2 =  "SELECT * FROM  classe cl , cours c, classe_cours cc , user u
       where c.id_cours = cc.id_cours
       and cl.id_classe = cc.id_classe 
       and u.id_user = c.id_user
       and u.id_user = ?";
       $stn = $pdo->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $stn->execute([$id_user]);


       $datas['data'] = $sth->fetchAll((PDO::FETCH_ASSOC));
       $datas['row'] =$sth->rowCount();
       $datas['per_page_record'] =per_page_record;
       $datas['total_records'] =$stn->rowCount();


    fermer_connexion_bd($pdo);
   return  $datas ;
 }


function ajout_absence( $datas):int{
   $pdo = ouvrir_connexion_db();
   extract($datas);
   $sql ="INSERT INTO `absence` ( `date_absence`, `id_planing`, `id_user`) 
   VALUES ( ?, ?, ?)";
   $date=date_format(date_create(),'Y-m-d');
   $id_planing = $_SESSION['id_planing'] ;
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   foreach ($absent as $value){
       $sth->execute(array($date, $id_planing , $value ));
   }
   fermer_connexion_bd($pdo);
   return $sth->rowCount();
} 

function nombre_de_cours_par_prof($id_user){
   $pdo = ouvrir_connexion_db();
   $sql = "SELECT count(u.id_user)
    FROM `cours`c , planing_cours p , user u 
   where u.id_user = c.id_user 
   and c.id_cours = p.id_cours
    and u.id_user = ?   ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute([$id_user]);
   $datas = $sth->fetchAll((PDO::FETCH_ASSOC));
fermer_connexion_bd($pdo);
return  $datas ;
}
 

function planing_exist($id_planing):array {
   $pdo = ouvrir_connexion_db();
   $sql = "select * from absence a 
      where a.id_planing = ? ";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute([$id_planing]);
   $user = $sth->fetchAll((PDO::FETCH_ASSOC));
   fermer_connexion_bd($pdo);
   return  $user ;
}



 ?>
