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
	    <h1>Ajouter une moto à vendre</h1>
</div>
	    <hr />
        <div class="bueno">
	    <form action="table1_new_valide.php" method="POST" enctype="multipart/form-data">
	        Cylindré : <input type="number" name="cylindree" min="0" max="500"required /><br />
            Marque : <input type="text" name="marque" required /><br />
	        Année : <input type="number" name="annee" min="-5000" max="3000" required /><br />
            Couleur : <input type="text" name="couleur" required /><br />
	        Prix : <input type="number" name="prix" min="1" max="10000.00" step="1" required /><br />
	        Photo : <input type="file" name="photo" required /><br />
	        Vendeur :  <select name="vendeur" required>
</div>
	        <?php
	            require '../lib_crud.inc.php';
	            $co=connexionBD();
	            afficherAuteursOptions($co);
	            deconnexionBD($co);
	        ?>
	        </select><br />
            <div id="ajouter2">
	        <input type="submit" value="Ajouter" />
</div>
	    </form>
	</body>
</html>