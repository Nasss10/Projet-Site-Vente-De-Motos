<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="table2_gestion.php">Gestion</a>
	    <hr />
	    <h1>Supprimer un Vendeur</h1>
	    <hr />
	    <?php
	        require '../lib_crud2.inc.php';
	
	        $id=$_GET['num'];
	
	        $co=connexionBD();
	        effaceBD($co, $id);
	        deconnexionBD($co);
	    ?>
	</body>
</html>