<h2 >Control panel de l'admin</h2>
<?= $_SESSION["f_name"]?>
<?= $_SESSION["l_name"]?>

<a href="<?=URL."LoginA/logout"?>">Se déconnecter</a><br>

<div>
    <h2 >Gestion des vendeurs</h2>
    <a href="<?= URL."LoginA/addSeller"?>">Ajouter un vendeur</a>
    <a href="<?= URL."LoginA/showSellers"?>">Afficher les vendeurs</a>
</div>

<div>
    <h2>Gestion des produits</h2>
    <a href="<?= URL."LoginA/addProduct"?>">Ajouter un produit</a>
    <a href="<?= URL."LoginA/showProducts"?>">Afficher les produits</a>
</div>

