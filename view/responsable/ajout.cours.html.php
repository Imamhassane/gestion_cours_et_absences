<?php
require ( ROUTE_DIR . 'view/inc/header.html.php' );
require ( ROUTE_DIR . 'view/inc/menu.html.php' );
require ( ROUTE_DIR . 'view/inc/footer.html.php' );
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 mt-5 liste-col">
            <div class="text-center mb-3"><h2 >Ajouter un cours</h2></div>
              
                <form method="POST" action="<?=WEB_ROUTE?>" class="form-inline">
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="" value="">
                            <div class=" col-md-6 mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="" id="">
                                    <option>Choisir le semestre</option>
                                    <option>semestre 1</option>
                                    <option>semestre 2</option>
                                </select>
                            </div>
                            <div class=" mb-2 col-md-6 ">
                                <input type="text" name=""   placeholder="Durée">
                            </div>
                            <div class=" col-md-6 mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="" id="">
                                    <option>Choisir le professeur</option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                            <div class=" col-md-6 mb-4 mt-2">
                                <label for=""></label>
                                <select class=" select" name="" id="" >
                                    <option>Choisir le module</option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                        <input type="submit" class="fadeIn fourth ml-auto mr-auto mt-4" value="Creer">
                </form>
            </div>
        </div>
    </div>

    