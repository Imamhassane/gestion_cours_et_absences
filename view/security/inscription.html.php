<?php
if (isset($_SESSION['arrayError'])){
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
require ( ROUTE_DIR . 'view/inc/header.html.php' );

?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <h2 class="inactive"><a href="<?=WEB_ROUTE.'?controllers=security&view=connexion'?>"> Se connecter </a> </h2>
    <h2 class="active underlineHover"><a href="<?=WEB_ROUTE.'?controllers=security&view=inscription'?>" >S'inscrire</a> </h2>
    <form method="post" action="<?=WEB_ROUTE?>">
      <div class="form-group">
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
            <small id="helpId" class="form-text text-muted"></small>
      </div>
      <div class="form-group">
            <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
      </div>
      <div class="form-group">
            <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
      </div>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
  </div>
</div>
<style>
html {
    background-color: #152032;
}
</style>
<?php require ( ROUTE_DIR . 'view/inc/footer.html.php' )?>