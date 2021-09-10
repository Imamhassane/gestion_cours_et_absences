<?php


function est_connect():bool{
    return isset($_SESSION['userConnect']);
}


function  est_responsable():bool{
    return est_connect() && $_SESSION['userConnect']['nom_role']=='ROLE_RESPONSABLE_PEDAGOGIQUE';
}
  
function  est_attache():bool{
      return est_connect() && $_SESSION['userConnect']['nom_role']=='ROLE_ATTACHE';
}


function  est_professeur():bool{
    return est_connect() && $_SESSION['userConnect']['nom_role']=='ROLE_PROFESSEUR';
}


function  est_etudiant():bool{
    return est_connect() && $_SESSION['userConnect']['nom_role']=='ROLE_ETUDIANT';
}


?>