<?php 
    require('header.php');
?>

    <title> Recherche de motos </title>
    
</head>

    <?php require('nav.php'); ?>
    
    
    <body>



</div>    
<div id="search-box-bg">
                    <form id="form" method="get" action="reponse_recherche.php">
                        <div id="form-search">
                            <input type="search" list="auteurs" name="texte" id="real" autocomplete="off" placeholder="Que cherchez-vous ?">
                            <datalist id="auteurs">
                            <?php
    // On va afficher ici la datalist
    require 'lib_crud.inc.php';
    $co=connexionBD();
    genererDatalistAuteurs($co);
    deconnexionBD($co);
?>
</datalist>
                            <button type="submit"  class="search-button"></button>
                        </div></form>
                </div> 

    </body>



</html>
<?php 

    require('footer.php');
?>

