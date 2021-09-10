<?php
 function ouvrir_connexion_db():PDO{
    try{    
        $options=[
            PDO::ATTR_CASE=> PDO::CASE_LOWER ,
            PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION ,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            
        ];
        $pdo = new PDO(CHAINE_DE_CONNEXION , USER_DB, PASSWORD_DB,  $options);
        return $pdo;    
    }catch (PDOException $e){
         die ($e->getMessage());
    }

 }
 
function fermer_connexion_bd(PDO $pdo){
    $pdo = null;
 }
?>