<?php
  // LIBRAIRIE "lib_crud.inc.php"
  // 2022 - BUT MMI - IUT Troyes - URCA
  // JL

  // insertion des dépendances
  require 'secretxyz123.inc.php';

  // connexion à la base de données
  function connexionBD()
  {
    // on initialise la variable de connexion à null
    $mabd = null;
    try {
      // on essaie de se connecter
      // le port et le dbname ci-dessous sont À ADAPTER à vos données
      $mabd = new PDO('mysql:host=localhost;port=8888;
                dbname=sae203;charset=UTF8;', 
                UTIL, PASS);
      // on passe le codage en utf-8
      $mabd->query('SET NAMES utf8;');
    } catch (PDOException $e) {
      // s'il y a une erreur, on l'affiche
      echo '<p>Erreur : ' . $e->getMessage() . '</p>';
      die();
    }
    // on retourne la variable de connexion
    return $mabd;
  }

  // déconnexion de la base de données
  function deconnexionBD(&$mabd) {
    // on se déconnexte en mettant la variable de connexion à null 
    $mabd=null;
  }
  // affichage du catalogue des albums
  function afficherCatalogue($mabd) {
    $req = "SELECT * FROM motos 
            INNER JOIN vendeurs
            ON motos._vendeurs_id = vendeurs.vendeurs_id";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // ICI VOTRE CODE POUR AFFICHER LES ALBUMS
    // ...
    // ...
    $lignes_resultat = $resultat->rowCount();
                if ($lignes_resultat>0) { // y a-t-il des résultats ?
                    // oui : pour chaque résultat : afficher
                    
                    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        echo'<div id="carte">';
                        echo '<div class="motome">';
                        
                        echo '<img class="image_listing" src="../images/uploads/'.$ligne['moto_photo'].'">';
                        echo '</div>';
                        echo '<div class="info">';
                        echo '<h3>'.$ligne['moto_cylindree'] .$ligne['moto_marque']. '</h3>';
                        
                        echo '<p>tarif: ' . $ligne['moto_prix'] . ' euro </p>';
                        echo '<p class="couleur"> Couleur:  ' . $ligne['moto_couleur'] . '  </p>';
                        echo '<p>Année de sortie usine: ' . $ligne['moto_annee'] . ' </p>';
                        echo '<p class="vendeurs"> vendu(e) par ' . $ligne['vendeurs_prenom'] . '</p>';
                        echo '</div>';
                        
                    echo "</div>";
                    }
                    
                } else { echo '<p>Pas de résultat !</p>'; }
              }
                
    // affichage de la liste des albums pour la gestion
    function afficherListe($mabd) {
        $req = "SELECT * FROM motos 
                INNER JOIN vendeurs
                ON motos._vendeurs_id = vendeurs.vendeurs_id";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        echo '<table>'."\n";
        
        echo '<thead><tr><th>Photo</th><th>Cylindrée</th><th> Marque</th><th>Prix</th><th>Couleur</th><th>Année</th><th>Vendeur</th><th>Modifier</th><th>Supprimer</th></tr></thead>'."\n";
        echo '<tbody>'."\n";
        foreach ($resultat as $value) {
            echo '<tr>'."\n";

            
            echo '<td><img class="photo_moto" src="../images/uploads/'.$value['moto_photo'].'" alt="image_'.$value['moto_id'].'" /></td>'."\n";
            echo '<td>'.$value['moto_cylindree'].'</td>'."\n";
            echo '<td>'.$value['moto_marque'].'</td>'."\n";
            echo '<td>'.$value['moto_prix'].'</td>'."\n";
            echo '<td>'.$value['moto_couleur'].'</td>'."\n";
            echo '<td>'.$value['moto_annee'].'</td>'."\n";
            echo '<td>'.$value['vendeurs_prenom'].' '.$value['vendeurs_nom'].'</td>'."\n";
            echo '<td><a href="table1_update_form.php?num='.$value['moto_id'].'">Modifier</a></td>'."\n";
            echo '<td><a href="table1_delete.php?num='.$value['moto_id'].'">Supprimer</a></td>'."\n";
            echo '</tr>'."\n";
        }
        echo '</tbody>'."\n";
        echo '</table>'."\n";
    }
    // afficher les auteurs (prénom et nom) dans des champs "option"
    function afficherAuteursOptions($mabd) {
    	// on sélectionne tous les auteurs de la table auteurs
        $req = "SELECT * FROM vendeurs";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // pour chaque auteur, on met son id, son prénom et son nom 
        // dans une balise <option>
        foreach ($resultat as $value) {
            echo '<option value="'.$value['vendeurs_id'].'">'; 
            echo  $value['vendeurs_prenom'].' '.$value['vendeurs_nom']; 
            echo '</option>'."\n";
        }
    }
    // fonction d'ajout d'une BD dans la table bande_dessinees
    function ajouterBD($mabd, $cylindree, $marque, $prix, $couleur, $annee, $nouvelleImage, $vendeurs)
    {
        $req = 'INSERT INTO motos (moto_cylindree, moto_marque, moto_prix, moto_couleur, moto_annee, moto_photo, _vendeurs_id) VALUES ('.$cylindree.', "'.$marque.'", '.$prix.', "'.$couleur.'", '.$annee.', "'.$nouvelleImage.'", "'.$vendeurs.'")';
       // echo '<p>' . $req . '</p>' . "\n";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount() == 1) {
            echo '<p>La moto ' . $marque . ' a été ajoutée au catalogue.</p>' . "\n";
        } else {
            echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
            die();
        }
    }
    
    // fonction d'effacement d'une BD
    function effaceBD($mabd, $id) {
      $vendeurs_id=$_GET['num'];
        $req = 'DELETE FROM motos WHERE moto_id = '.$vendeurs_id; 
        echo '<p>'.$req.'</p>'."\n";
        try{
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount()==1) {
            echo '<p>La moto '.$id.' a été supprimée du catalogue.</p>'."\n";
        } else {
            echo '<p>Erreur lors de la suppression.</p>'."\n";
            die();
        }
    }
    
    // fonction de récupération des informations d'une BD
    function getBD($mabd, $vendeurs_id) {
        $req = 'SELECT * FROM motos WHERE moto_id ='.$vendeurs_id;
        //echo '<p>GetBD() : '.$req.'</p>'."\n";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // la fonction retourne le tableau associatif 
        // contenant les champs et leurs valeurs
        return $resultat->fetch();
    }
    // afficher le "bon" auteur parmi les auteurs (prénom et nom)
   // dans les balises "<option>"
	function afficherAuteursOptionsSelectionne($mabd, $vendeurs) {
    
    $req = "SELECT * FROM vendeurs";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<option value="'.$value['vendeurs_id'].'"';
        if ($value['vendeurs_id']==$vendeurs) {
            echo ' selected="selected"';
        }
        echo '>';
        echo $value['vendeurs_prenom'].' '.$value['vendeurs_nom'];
        echo '</option>'."\n";
    }
}
// fonction de modification d'une BD dans la table bande_dessinees
function modifierBD($mabd, $id, $cylindree, $marque, $annee, $nouvelleImage, $couleur, $prix, $vendeurs)
{
    $req = 'UPDATE motos 
            SET moto_cylindree = "'.$cylindree.'",
            moto_marque = "'.$marque.'",
            moto_annee = '.$annee.',
            moto_photo = "'.$nouvelleImage.'",
            moto_couleur = "'.$couleur.'",
            moto_prix = '.$prix.',
            _vendeurs_id = "'.$vendeurs.'"
        WHERE moto_id ='.$id;
    //echo '<p>' . $req . '</p>' . "\n";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    if ($resultat->rowCount() == 1) {
        echo '<p>La moto à vendre ' . $marque . ' a été modifiée.</p>' . "\n";
    } else {
        echo '<p>Erreur lors de la modification.</p>' . "\n";
        die();
    }
}
// Génération de la liste des auteurs dans le formulaire de recherche
function genererDatalistAuteurs($mabd) {
  // on sélectionne le nom et prénom de tous les auteurs de la table auteurs
  $req = "SELECT vendeurs_prenom FROM vendeurs";
  try {
      $resultat = $mabd->query($req);
  } catch (PDOException $e) {
      // s'il y a une erreur, on l'affiche
      echo '<p>Erreur : ' . $e->getMessage() . '</p>';
      die();
  }
  // pour chaque auteur, on met son nom et prénom dans une balise <option>
  foreach ($resultat as $value) {
      echo '<option value="'.$value['vendeurs_prenom'].'">'; 
  } 
}




function afficherResultatRecherche($mabd, $search) {
  $req = "SELECT * FROM vendeurs 
          INNER JOIN motos 
          ON motos._vendeurs_id = vendeurs.vendeurs_id
          WHERE vendeurs_prenom LIKE '%".$search."%'";
  try {
      $resultat = $mabd->query($req);
  } catch (PDOException $e) {
      // s'il y a une erreur, on l'affiche
      echo '<p>Erreur : ' . $e->getMessage() . '</p>';
      die();
  }
  // ICI VOTRE CODE POUR AFFICHER LES ALBUMS FILTRES
  // ...
  // ...
  $lignes_resultat = $resultat->rowCount();
                if ($lignes_resultat>0) { // y a-t-il des résultats ?
                    // oui : pour chaque résultat : afficher
                    
                    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        echo'<div id="carte">';
                        echo '<div class="motome">';
                        
                        echo '<img class="image_listing" src="../images/uploads/'.$ligne['moto_photo'].'">';
                        echo '</div>';
                        echo '<div class="info">';
                        echo '<h3>'.$ligne['moto_cylindree'] .$ligne['moto_marque']. '</h3>';
                        
                        echo '<p>tarif: ' . $ligne['moto_prix'] . ' euro </p>';
                        echo '<p class="couleur"> Couleur:  ' . $ligne['moto_couleur'] . '  </p>';
                        echo '<p>Année de sortie usine: ' . $ligne['moto_annee'] . ' </p>';
                        echo '<p class="vendeurs"> vendu(e) par ' . $ligne['vendeurs_prenom'] . '</p>';
                        echo '</div>';
                        
                    echo "</div>";
                    }
                    
                } else { echo '<p>Pas de résultat !</p>'; }
              
}
