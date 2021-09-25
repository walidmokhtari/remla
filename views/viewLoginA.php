<?php
$this->_t = "Admin login";
?>
<form method="post" action="<?= URL."LoginA/checkLogin" ?>" >
<input type="text" name="email" placeholder="Entrez votre email"/>
<input type="password" name="pwd" placeholder="Entrez votre mot de passe" />
<input type="submit" name="login" value="Connexion" />
</form>