<h1>Modifier un produit</h1>

<form method="post" action="<?= URL."loginA/modifyProduct/".$id?>">

<input type="text" name="nameProduct" placeholder="Entrez le nom du produit" /> <br>
<input type="text" name="type" placeholder="Entrez le type du produit" /> <br>
<input type="text" name="barCode" placeholder="Entrez le code barre du produit" /> <br>
<input type="submit" name="enregistrer" value="Enregistrer" /> <br>

</form>

<a href="<?= URL."LoginA/login" ?>">Retourner vers le panneau de control</a>