<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="table2_gestion.php">Gestion</a>
	    <hr />
	    <h1>Modifier un auteur</h1>
	    <hr />
	    <?php
	        require '../lib_crud2.inc.php';
	
	        $id=$_POST['num'];
	        $nom=$_POST['nom'];
	        $prenom=$_POST['prenom'];
	        $ville=$_POST['ville'];
	       // var_dump($_POST);
	       // var_dump($_FILES);
	
	        
	
	        $co=connexionBD();
	        modifierBD($co, $id, $nom, $prenom, $ville);
	        deconnexionBD($co);
	    ?>
	</body>
</html>