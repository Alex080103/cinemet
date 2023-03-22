<?php 

include('../config/connectBdd.php');

require("../config/functions.php");

if (isset($_POST['name'])) {

        /*******AJOUT DU PRODUIT******/

            /*******RECUPERATION DU PRODUIT******** */
            $name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES);
            $prenom = htmlspecialchars(strip_tags($_POST['prenom']), ENT_QUOTES);
            $age = htmlspecialchars(strip_tags($_POST['age']), ENT_QUOTES);
            $country = htmlspecialchars(strip_tags($_POST['country']), ENT_QUOTES); 
            $picture = htmlspecialchars(strip_tags($_POST['picture']), ENT_QUOTES); 
            
            
            try {
                addActor($name, $prenom, $age, $country, $picture) ;
                $y = 1;
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }      
            /******************AJOUT DANS LA BDD******************** */
            
             if (isset($y)) {
                 echo "<p>Le produit a été ajouté</p>";
            } else {
                 echo "<p>Erreur</p>";
            }
        
    } else {
            echo "name n'est pas rempli";
    }


?>