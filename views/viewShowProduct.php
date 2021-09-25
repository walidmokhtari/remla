<table>
   <tr>
        <th>ID</th>
        <th>Nom du produit</th>
        <th>Type</th>
        <th>Code barre</th>
        <th>Action</th>
    </tr>
    <?php foreach($products as $product) : ?>
    <tr>
        <td><?=$product->getId()?></td>
        <td><?=$product->getNameProduct()?></td>
        <td><?=$product->getType()?></td>
        <td><?=$product->getBarCode()?></td>
        <td>
            <a href="<?= URL."LoginA/deleteProduct/".$product->getId()?>">Supprimer</a>
            <a href="<?= URL."LoginA/modifyProduct/".$product->getId()?>">Modifier</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<a href="<?= URL."LoginA/login" ?>" >Retourner vers le panneau de control</a>