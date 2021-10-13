<?php 

// fonction de validation
function est_vide( $valeur): bool {
    return empty($valeur);
}


function is_email($valeur):bool{
    if (filter_var($valeur, FILTER_VALIDATE_EMAIL)) {
        return true;
      }else {
        return false;
      }
}
function form_valid($arrayError):bool{
    if (count($arrayError)==0){
        return true;
    }
    return false;
}

function validation_login( $valeur, string  $key, array &$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key] = "le login est obligatoire";
    }elseif (!is_email($valeur)) {
        $arrayError[$key] = "Saisir un email ";
    }
        
}


function validation_password( $valeur, string $key , array &$arrayError, $min = 6, $max = 10){
    if (est_vide($valeur)) {
        $arrayError[$key] = "le password est obligatoire";
    }elseif ((strlen($valeur) < $min)||(strlen($valeur) > $max)) {
        $arrayError[$key] = "le password doit être compris entre $min et $max";
    }
}
function validation_champ( $valeur, string  $key,  &$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key] = "Ce champ est obligatoire";
    }   
}

function validation(  string  $key,  &$arrayError){
    if ($_FILES['cover_image']['size'] == 0 && $_FILES['cover_image']['error'] == 0)
{
    $arrayError[$key] = "Ce champ est obligatoire";
}  
}

function invalid_planing(){
    $id =  $_GET['id_cours'];
    $classe = classe_cours($id);
    $verfi_planing = verfi_planing($classe[0]['id_classe'] );
        foreach ($verfi_planing as $value) {
            $debute =substr($value['debut'], 0, 5) ;
            $final =substr($value['fin'], 0, 5) ;
            if ( $_POST['date'] == $value['date_cours'] && $_POST['debut'] >= $debute && $_POST['debut'] < $final ) {
                return true;
            }
        }
}
 



?>