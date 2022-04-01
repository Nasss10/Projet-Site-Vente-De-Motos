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
 // affichage de la liste des albums pour la gestion
 function afficherListe($mabd) {
    $req = "SELECT * FROM vendeurs ";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    echo '<table>'."\n";
    
    echo '<thead><tr><th>Prénom</th><th> Nom</th><th>Ville</th><th>Modifier</th><th>Supprimer</th></tr></thead>'."\n";
    echo '<tbody>'."\n";
    foreach ($resultat as $value) {
        echo '<tr>'."\n";

        
        
        echo '<td>'.$value['vendeurs_nom'].'</td>'."\n";
        echo '<td>'.$value['vendeurs_prenom'].'</td>'."\n";
        echo '<td>'.$value['vendeurs_ville'].'</td>'."\n";
        echo '<td><a href="table2_update_form.php?num='.$value['vendeurs_id'].'">Modifier</a></td>'."\n";
        echo '<td><a href="table2_delete.php?num='.$value['vendeurs_id'].'">Supprimer</a></td>'."\n";
        echo '</tr>'."\n";
    }
    echo '</tbody>'."\n";
    echo '</table>'."\n";
}
// fonction d'ajout d'une BD dans la table bande_dessinees
function ajouterBD($mabd, $nom, $prenom, $ville)
{
    $req = 'INSERT INTO vendeurs (vendeurs_nom, vendeurs_prenom, vendeurs_ville) VALUES ("'.$nom.'", "'.$prenom.'", "'.$ville.'")';
   // echo '<p>' . $req . '</p>' . "\n";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    if ($resultat->rowCount() == 1) {
        echo '<p>Le vendeur  ' . $prenom . ' a été ajoutée a la liste.</p>' . "\n";
    } else {
        echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
        die();
    }
}
// fonction d'effacement d'une BD
function effaceBD($mabd, $id) {
    
      $req = 'DELETE FROM vendeurs WHERE vendeurs_id = '.$id; 
      //echo '<p>'.$req.'</p>'."\n";
      try{
          $resultat = $mabd->query($req);
      } catch (PDOException $e) {
          // s'il y a une erreur, on l'affiche
          echo '<p>Erreur : ' . $e->getMessage() . '</p>';
          die();
      }
      if ($resultat->rowCount()==1) {
          echo '<p>Le vendeur '.$id.' a été supprimée de la liste.</p>'."\n";
      } else {
          echo '<p>Erreur lors de la suppression.</p>'."\n";
          die();
      }
  }
  // fonction de modification d'une BD dans la table bande_dessinees
function modifierBD($mabd, $id, $nom, $prenom, $ville)
{
    $req = 'UPDATE vendeurs
            SET vendeurs_nom = "'.$nom.'",
            vendeurs_prenom = "'.$prenom.'",
            vendeurs_ville = "'.$ville.'"
        WHERE vendeurs_id ='.$id;
    //echo '<p>' . $req . '</p>' . "\n";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    if ($resultat->rowCount() == 1) {
        echo '<p>Le vendeur ' . $prenom . ' a été modifiée.</p>' . "\n";
    } else {
        echo '<p>Erreur lors de la modification.</p>' . "\n";
        die();
    }
}
// fonction de récupération des informations d'une BD
function getBD($mabd, $vendeurs_id) {
    $req = 'SELECT * FROM vendeurs WHERE vendeurs_id ='.$vendeurs_id;
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