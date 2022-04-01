<!DOCTYPE html>
<html>
    <head>
        <title>SAE203</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
    <?php require('../nav2.php'); ?>
        <h1>Gestion des données</h1>

        <div id="ajouter">
        <p><a href="table2_new_form.php">Ajouter un vendeur</a></p>
</div>
        <?php
            require '../lib_crud2.inc.php';
            $co=connexionBD();
            afficherListe($co);
            deconnexionBD($co);
            
        ?>
         <?php require('../footer.php'); ?>
    </body>
</html>