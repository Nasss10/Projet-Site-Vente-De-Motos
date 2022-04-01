<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
		<link rel="stylesheet" href="../style.css">
	</head>
	<body style="font-family:sans-serif;">
	<?php require('../nav2.php'); ?>
	
	    <hr />
	    <h1>Ajouter un vendeur</h1>
	    <hr />
	    <?php
	        require '../lib_crud2.inc.php';
	
	        $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
	        $ville=$_POST['ville'];
	        
	        // var_dump($_POST);
	        // var_dump($_FILES);
	
	        
	
	        $co=connexionBD();
	        ajouterBD($co, $nom, $prenom, $ville 
	        		);
	        deconnexionBD($co);
	    ?>
	</body>
</html>