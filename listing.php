<?php 
    require('header.php');
?>

    <title> Liste de motos disponible </title>
    
</head>

    <?php require('nav.php'); ?>
    
    
    <body>
        <div id="list">
    
    <?php
        echo'<div id="motodispo">';
        echo "<h1>Liste des motos disponibles </h1>"."\n";
        echo'<br>';
        echo'</br>';
        echo'</div>';
        require 'lib_crud.inc.php';
		$co=connexionBD();
		afficherCatalogue($co);
		deconnexionBD($co);
        ?>






            </div>

</body>
</html>
<?php 
    require('footer.php');
?>


                    