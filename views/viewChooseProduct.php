<h1>Ajouter des produits a mon magasin</h1>

<form method="post" action="<?= URL."loginS/chooseProduct"?>">
    <?php foreach($products as $product) : ?>
        <input type="checkbox" name="tab[]" value="<?= $product->getId(); ?>"><?= $product->getNameProduct(); ?></input>
    <?php endforeach; ?>
    <input type="submit" name="valider" value="valider"/>
</form>