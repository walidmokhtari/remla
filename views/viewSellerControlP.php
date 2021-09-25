<div >
    <h2 >Control panel du vendeur</h2>
</div>
<div >
    <p class="session-name"><i class="fas fa-user"></i><?="  ".$_SESSION["storeName"]."     ";?>
<a href="<?=URL."LoginS/logout"?>"><i class="fas fa-sign-out-alt"></i></a><br></p>
</div>

<div class="container p-3 my-3 bg-dark text-white">
    <h2 >Gestion de mes informations personnelles</h2>
    <a href="<?= URL."loginS/updateSeller"?>">Cliquez ici</a>
</div>

<div class="container p-3 my-3 bg-dark text-white">
    <h2>Gestion des produits</h2>
    <a href="<?= URL."loginS/chooseProduct"?>">Nouveau produit pour mon magasin ? cliquez-ici</a> <br>
    <a href="<?= URL."loginS/showProducts"?>">Afficher mes produits</a>
</div>

