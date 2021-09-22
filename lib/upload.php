<?php
function valide_image(array $files, array &$arrayError, string $key, $target_file): void {
    
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "jpg" ) {
        $arrayError[$key] = "Veuillez choisir une image png ,  jpeg ou jpg";
    } elseif ($files['avatar']['size'] > 1200000) {
        $arrayError[$key] = "La taille de l'image ne doit pas dépasser 1,2MB";
    }
}


function upload_image($files, $target_file): bool {
    return move_uploaded_file($files["avatar"]["tmp_name"], $target_file);
}
?>