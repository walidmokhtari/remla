<!-- 0673ab / e0e305-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3493e2ca30.js" crossorigin="anonymous"></script>
    <title><?= $this->_t ?></title>
    <link rel="stylesheet" type="text/css"  href="<?= URL."style/style.css"?>"/>
    <link rel="stylesheet" type="text/css"  href="<?= URL."style/bootstrap/css/bootstrap.css"?>"/>
</head>
<body>
    <!-- NAV -->
        <nav class="navbar navbar-expand-md bg-dark">
            <a class="px-3" href="<?=URL?>"><img src="<?= URL."img/remla.png"?>"></a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link text-light text-uppercase px-3" href="#">Accueil</a></li>
                <li class="nav-item"><a class="nav-link text-light text-uppercase px-3" href="#">Liste des vendeurs</a></li>
                <li class="nav-item"><a class="nav-link text-light text-uppercase px-3" href="#">Liste des produits</a></li>
                <li class="nav-item"><a class="nav-link text-light text-uppercase px-3" href="#">A propos de nous</a></li>
            </ul>
        </nav>
    <!--END OF NAV-->
    <!-- CONTENT -->
    <div>
        <?= $content ?>
    </div>
    <!-- END OF CONTENT -->
    <!-- FOOTER -->
    <footer class="bg-secondary">
        <div class="container container-foot">
            <div class="row">
                <div class="col">
                    <h1 class="display-2">Plateforme REMLA</h1>
                    <h3>By Walid MOKHTARI</h3>
                </div>
            </div>
        </div>
    </footer>
    <!-- END OF FOOTER -->
</body>
</html>