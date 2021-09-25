<table>
   <tr>
        <th>ID</th>
        <th>Nom du magasin</th>
        <th>Email du vendeur</th>
        <th>Action</th>
    </tr>
    <?php foreach($sellers as $seller) : ?>
    <tr>
        <td><?=$seller->getId()?></td>
        <td><?=$seller->getStoreName()?></td>
        <td><?=$seller->getEmail()?></td>
        <td>
            <a href="<?= URL."LoginA/deleteSeller/".$seller->getId()?>">Supprimer</a>
            <a href="<?= URL."LoginA/modifySeller/".$seller->getId()?>">Modifier</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<a href="<?= URL."LoginA/login" ?>" >Retourner vers le panneau de control</a>