<!DOCTYPE html>
<html>
<head>
	<title>SAE203</title>
    <link rel="stylesheet" href="../style.css">
</head>
<?php require('../nav2.php'); ?>
<body style="font-family:sans-serif;">
    <a href="../index.php">Accueil</a> 
	<hr>
    <h1>Modifier une bande dessinée</h1>
    <hr />
    <?php
        require '../lib_crud.inc.php';

        $id=$_GET['num'];
        $co=connexionBD();
        $motos=getBD($co, $id);
        //var_dump($motos);
        deconnexionBD($co);
    ?>
    <div class="bueno">
    <form action="table1_update_valide.php" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="num" value="<?= $id; ?>" />
        Cylindree : <input type="text" name="cylindree" value="<?php echo $motos['moto_cylindree']; ?>" required/><br />
        Marque : <input type="text" name="marque" value="<?php echo $motos['moto_marque']; ?>" required/><br />
        Année : <input type="text" name="annee" value="<?php echo $motos['moto_annee']; ?>" required/><br />
        Couleur : <input type="text" name="couleur" value="<?php echo $motos['moto_couleur']; ?>" required/><br />
        Prix :<input type="number" name="prix" value="<?php echo $motos['moto_prix']; ?>" required/><br />
        Photo : <input type="file" name="photo" required /><br />
        Vendeur : <select name="vendeurs" required>
</div>
        <?php
            $co=connexionBD();
            afficherAuteursOptionsSelectionne($co, $motos['_vendeurs_id']);
            deconnexionBD($co);
        ?>
        </select><br />
        <div id="ajouter2">
	        <input type="submit" value="Modifier" />
</div>
    </form>
</body>
</html>