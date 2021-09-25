<table>
   <tr>
        <th>ID</th>
        <th>Nom du produit</th>
        <th>Type</th>
        <th>Code barre</th>
        <th>Prix</th>
        <th>Disponibilité</th>
        <th>Action</th>
    </tr>
    <?php foreach($products as $product) :?>
    <tr>
        <td><?=$product->getId()?></td>
        <td><?=$product->getNameProduct()?></td>
        <td><?=$product->getType()?></td>
        <td><?=$product->getBarCode()?></td>
        <?php foreach($haveings as $haveing) :?>
            <?php if ($product->getId() == $haveing->getIdproduct() && $_SESSION["id"] == $haveing->getIdseller()){ ?>
                <td><?=$haveing->getPrice()?></td>
                <td><?php if($haveing->getAvailable()== 1) echo "Oui"; else echo "Non"; ?></td>
            <?php } ?>
        <?php endforeach ?>
        <td>
            <a href="<?= URL."LoginS/deleteProduct/".$product->getId()?>">Supprimer</a>
            <a href="<?= URL."LoginS/modifyProduct/".$product->getId()?>">Modifier</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<a href="<?= URL."LoginS/login" ?>" >Retourner vers le panneau de control</a>