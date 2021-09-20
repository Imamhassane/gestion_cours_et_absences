<?php
if (isset($_SESSION['arrayError'])){
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 mt-3 liste-col">
            <div class="text-center mb-3"><h2 >Ajouter une classe</h2></div>
                <div class="column">
                    <div class="card">
                    <form method="POST" action="<?=WEB_ROUTE?>">
                        <input type="hidden" name="controllers" value="responsable">
                        <input type="hidden" name="action" value="ajoutClasse">
                        <div class="form-group mt-3 ">
                            <input type="text" id="" class="fadeIn second" name="nom_classe" placeholder="Entrer le nom de la classe">
                            <small class = " form-text text-danger ">
                                <?= isset($arrayError['nom_classe']) ? $arrayError['nom_classe'] : '' ;?>
                            </small>
                        </div>
                        <div class="mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="filiere" id="">
                                    <option>Developpement web</option>
                                    <option>Design numérique</option>
                                    <option>Marketing et communication</option>
                                </select>
                            </div>
                            <div class=" mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="niveau" id="">
                                    <option>Licence 1</option>
                                    <option>Licence 2</option>
                                    <option>Licence 3</option>
                                    <option>Master 1</option>
                                    <option>Master 2</option>
                                </select>
                            </div>
                        <input type="submit" class="fadeIn fourth" value="Creer">
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
