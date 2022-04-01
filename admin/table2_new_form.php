<!DOCTYPE html>
<html>
	<head>
	    <title>SAE203</title>
        <link rel="stylesheet" href="../style.css">
	</head>
    <?php require('../nav2.php'); ?>
	<body style="font-family:sans-serif;">
	    

	    <hr />
        <div class="bien">
	    <h1>Ajouter un vendeur</h1>
</div>
	    <hr />
        <div class="bueno2">
	    <form action="table2_new_valide.php" method="POST" enctype="multipart/form-data">
        Nom : <input type="text" name="nom" required /><br />
        Prénom : <input type="text" name="prenom" required /><br />
        Ville : <input type="text" name="ville" required /><br />
        </div>

	        <?php
	            require '../lib_crud.inc.php';
	            $co=connexionBD();
	            //afficherAuteursOptions($co);
	            deconnexionBD($co);
	        ?>
	        </select><br />
	        <div id="ajouter3">
	        <input type="submit" value="Ajouter" />
</div>
	    </form>
	</body>
</html>