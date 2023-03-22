<?php 

include('../config/connectBdd.php')

require("../config/functions.php");



if (isset($_POST['name'])) {

        /*******AJOUT DU PRODUIT******/

            /*******RECUPERATION DU PRODUIT******** */
            $name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES);
            $date = htmlspecialchars(strip_tags($_POST['date']), ENT_QUOTES);
            $country = htmlspecialchars(strip_tags($_POST['country']), ENT_QUOTES);
            $synopsis = htmlspecialchars(strip_tags($_POST['synopsis']), ENT_QUOTES); 
            
            try {
                addFilm($name, $date, $country, $synopsis) ;
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

    addFilmActor();// Do something with the $idActeur value
      



?>