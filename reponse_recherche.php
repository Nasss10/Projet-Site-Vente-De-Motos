<?php 
    require('header.php');


?>

    <title> Recherche de motos </title>

    <link rel="stylesheet" href="style.css">
</head>

    <?php require('nav.php'); ?>
    
    
    <body>
      <div id="recherche">
          <h1>Voici les résultats pour votre recherche</h1>
</div>

      
      
<?php
    require 'lib_crud.inc.php';
    $search=$_GET['texte'];
    $co=connexionBD();
    afficherResultatRecherche($co,$search);
    deconnexionBD($co);
?>


    </body>
</html>
<?php 
    require('footer2.php');
?>







