<h1>Modifier mes informations personnelles</h1>

<div class="container">
<form method="post" action="<?= URL."loginS/updateSeller"?>">
<div class="form-group">
      <label for="storeName">Nom du magasin :</label>
      <input type="text" name="storeName" placeholder="Entrez le nom du magasin" id="storeName"/>
</div>
<div class="form-group">
      <label for="email">Email :</label>
      <input type="text" name="email" placeholder="Entrez l'email du vendeur" id="email"/>
</div>
<div class="form-group">
      <label for="pwd">Mot de passe :</label>
      <input type="password" name="pwd" placeholder="Entrez le mot de passe du vendeur" id="pwd"/>
</div>
<button type="submit" class="btn btn-primary" name="enregistrer">Enregistrer</button>
</form>
</div>


<a href="<?= URL."LoginS/login" ?>" >Retourner vers le panneau de control</a>