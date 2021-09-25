<?php
$this->_t = "Seller login";
?>
<div class="logins-container container">
<h2>Connectez-vous a votre compte vendeur</h2>
<form method="post" action="<?= URL."LoginS/checkLogin" ?>" >
    <div class="form-group">
      <label for="usr">Email :</label>
      <input type="text" class="form-control" id="usr" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Mot de passe :</label>
      <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
    <div class="div-btn">
        <button type="submit" name="login" class="btn btn-primary">Connexion</button>
    </div>
  </form>
</div>


