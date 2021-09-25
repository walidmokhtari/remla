<?= $msg; ?> <br>
<?php if (isset($_SESSION["f_name"]))  { ?> 
    <a href="<?= URL."LoginA/login"?>" >Retourner vers le panneau de control</a>
<?php } else if(isset($_SESSION["storeName"])) { ?>
    <a href="<?= URL."LoginS/login"?>" >Retourner vers le panneau de control</a>
<?php } ?>