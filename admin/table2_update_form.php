<!DOCTYPE html>
<html>
<head>
	<title>SAE203</title>
    <link rel="stylesheet" href="../style.css">
</head>
<?php require('../nav2.php'); ?>
<body style="font-family:sans-serif;">
    
	<hr>
    <div class="bien">
    <h1>Modifier un vendeur</h1>
</div>
    <hr />
    <?php
        require '../lib_crud2.inc.php';

        $id=$_GET['num'];
        $co=connexionBD();
        $vendeurs=getBD($co, $id);
        //var_dump($vendeurs);
        deconnexionBD($co);
    ?>
    <div class="bueno2">
    <form action="table2_update_valide.php" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="num" value="<?= $id; ?>" />
        Nom : <input type="text" name="nom" value="<?php echo $vendeurs['vendeurs_nom']; ?>" required/><br />
        Prénom : <input type="text" name="prenom" value="<?php echo $vendeurs['vendeurs_prenom']; ?>" required/><br />
        Ville : <input type="text" name="ville" value="<?php echo $vendeurs['vendeurs_ville']; ?>" required/><br />
</div>
        <?php
            $co=connexionBD();
            
            deconnexionBD($co);
        ?>
        </select><br />
        <div id="ajouter2">
	        <input type="submit" value="Modifier" />
</div>
    </form>
</body>
</html>