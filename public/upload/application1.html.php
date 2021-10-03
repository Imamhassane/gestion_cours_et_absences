<?php
function  est_vide ($valeur ): bool {
    return  empty ($valeur );
}
function  est_number($valeur ): bool {
    return  is_numeric($valeur );
}
function valide_champ($valeur , $key ,&$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key]='champ obligatoire';
    }elseif(!est_number($valeur)) {
            $arrayError[$key]='Ce nombre doit être numérique';
    }
}
function form_valid(array $arrayError):bool{
    return count($arrayError)==0;
}

function permutation( $a ,  $b ):void {
    $tmp = $a;
    $a = $b;
    $b = $tmp;
}

if (isset($_POST['valider'])) {
    $arrayError = [];
    extract($_POST);
    valide_champ($nombre1 , 'nombre1' , $arrayError);
    valide_champ($nombre1 , 'nombre1' , $arrayError);
    if (form_valid($arrayError)) {
        permutation($nombre1 , $nombre2);
    }
} 

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col mt-5">
                <form method="post" action="">
                    <div class="mb-3 col-md-6">
                            <label for="" class="form-label">Nombre 1 </label>
                            <input type="number" class="form-control" id="" name="nombre1" >
                            <small  class = " form-text text-danger " >
                                <?=  isset ( $arrayError [ 'nombre1' ]) ? $arrayError [ 'nombre1' ] : '' ; ?>
                            </small>
                    </div>

                    <div class="mb-3 col-md-6">
                            <label for="" class="form-label">Nombre 2</label>
                            <input type="number" class="form-control" id="" name="nombre2">
                            <small  class = " form-text text-danger " >
                                <?=  isset ( $arrayError [ 'nombre2' ]) ? $arrayError [ 'nombre2' ] : '' ; ?>
                            </small>
                    </div>
                   
                        <button type="submit" name="valider" class="btn btn-primary ml-3 mb-5">Submit</button>
                </form>
                <div class="ml-3">
                     <?php

                     
                     ?>
                </div>  
               

              </div>
          </div>
      </div>
      <?php if (isset($_POST['valider'])) {
            unset($_POST['nombre1']);
            unset($_POST['nombre2']);
            
      }
      ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>