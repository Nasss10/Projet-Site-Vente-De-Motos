<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="table1_gestion.php">Gestion</a>
	    <hr />
	    <h1>Modifier une bande dessinée</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	
	        $id=$_POST['num'];
	        $cylindree=$_POST['cylindree'];
	        $marque=$_POST['marque'];
	        $annee=$_POST['annee'];
	        $couleur=$_POST['couleur'];
	        $prix=trim($_POST['prix']);
	        $vendeurs=$_POST['vendeurs'];
	       // var_dump($_POST);
	       // var_dump($_FILES);
	
	        $imageType=$_FILES["photo"]["type"];
	        if ( ($imageType != "image/png") &&
	            ($imageType != "image/jpg") &&
	            ($imageType != "image/jpeg") ) {
	                echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
	                die();
	        }
	
	        $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];
	
	        if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
	            if(!move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/uploads/".$nouvelleImage)) {
	                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
	                die();
	            }
	        } else {
	            echo '<p>Problème : image non chargée...</p>'."\n";
	            die();
	        }
	
	        $co=connexionBD();
	        modifierBD($co, $id, $cylindree, $marque, $annee, $nouvelleImage, $couleur, $prix, $vendeurs);
	        deconnexionBD($co);
	    ?>
	</body>
</html>