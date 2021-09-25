
<h1>Modifier un vendeur</h1>

<form method="post" action="<?= URL."loginA/modifySeller/".$id?>">

<input type="text" name="storeName" placeholder="Entrez le nom du magasin" /> <br>
<input type="text" name="email" placeholder="Entrez l'email du vendeur'" /> <br>
<input type="password" name="pwd" placeholder="Entrez le mot de passe du vendeur" /> <br>
<input type="submit" name="enregistrer" value="Enregistrer" /> <br>

</form>

<a href="<?= URL."LoginA/login" ?>" >Retourner vers le panneau de control</a>