<h1>Modifier un produit</h1>

<form method="post" action="<?= URL."loginS/modifyProduct/".$id?>">

<input type="text" name="price" placeholder="Entrez le prix du produit" /> <br>
<select name="available">
    <option value="">--Disponible ?--</option>
    <option value="1">Oui</option>
    <option value="0">Non</option>
</select>
<input type="submit" name="enregistrer" value="Enregistrer" /> <br>

</form>

<a href="<?= URL."LoginA/login" ?>">Retourner vers le panneau de control</a>