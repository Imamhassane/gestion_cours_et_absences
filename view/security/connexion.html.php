<?php
if (isset($_SESSION['arrayError'])){
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
require ( ROUTE_DIR . 'view/inc/header.html.php' );
  require ( ROUTE_DIR . 'view/inc/footer.html.php' );

?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <h2 class="active"> Login Form</h2>
  <form method="POST" action="<?=WEB_ROUTE?>">
  <?php if (isset($arrayError['erreurConnexion'])):?>
            <div class="alert alert-danger"  role="alert">
                 <?= $arrayError['erreurConnexion']; ?>
            </div>
    <?php endif ?>
            <input type="hidden" name="controllers" value="security">
            <input type="hidden" name="action" value="connexion">
            <div class="form-group">
                  <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
                  <small class = "ml-5 text-left form-text text-danger">
                        <?= isset($arrayError['login']) ? $arrayError['login'] : '' ;?>
                  </small>
            </div>
            <div class="form-group">
                  <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                  <small class = "ml-5 text-left form-text text-danger ">
                        <?= isset($arrayError['password']) ? $arrayError['password'] : '' ;?>
                  </small>
            </div>
            <input type="submit" class="fadeIn fourth" value="Se connecter">
      </form>
  </div>
</div>
<style>
html {
    background-color: #152032;
}
</style>