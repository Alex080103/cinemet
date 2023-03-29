<?php 

include('../../config/connectBdd.php');

require("../../config/functions.php");



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
            /******************AJOUT DU POSTER dans la BDD******************** */

    if(isset($_FILES['poster']['name']) && isset($_FILES['image']['name'])) {      
        if (isset($_FILES['poster']['name']) && $_FILES['poster']['error'] == 0) {
            $y = 1;
            var_dump($y);
            $nameFile = $_FILES['poster']['name'];
            $typeFile = $_FILES['poster']['type'];
            $tmpFile = $_FILES['poster']['tmp_name'];
            $errorFile = $_FILES['poster']['error'];
            $sizeFile = $_FILES['poster']['size'];
        
            $max_size = 700000;
            $extensions = ['png', 'jpg', 'jpeg', 'gif', 'jiff'];

            if ($sizeFile > $max_size) {
                echo "Taille de l'affiche trop importante";
                die();
            }
        
            $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
            $file_type = pathinfo($_FILES['poster']['name'], PATHINFO_EXTENSION);
            if(!in_array($file_type, $allowed_types)) {
                echo 'format image invalide';
                die();
            }

            $extension = explode('.', $nameFile);
            if(!count($extension) <=2 && !in_array(strtolower(end($extension)), $extensions)) {
                echo 'format image incorrect';     
            }

            $filenamePoster = uniqid() . '.' . $file_type;
        
            $upload_dir = '../../upload/affiche/';
            if(move_uploaded_file($_FILES['poster']['tmp_name'], $upload_dir . $filenamePoster)) {
                echo 'le fichier est dans le serveur';// Le fichier a été correctement déplacé
            } else {
                echo 'le fichier n as pas pu etre upload';
                die(); // Il y a eu une erreur lors du déplacement du fichier
            }

        } else {
            echo "erreur avec l'image";
            die();
        }


            /******************AJOUT DU POSTER dans la BDD******************** */

            if (isset($_FILES['image']['name']) && $_FILES['image']['error'] == 0) {
                $y = 1;
                var_dump($y);
                $nameFile = $_FILES['image']['name'];
                $typeFile = $_FILES['image']['type'];
                $tmpFile = $_FILES['image']['tmp_name'];
                $errorFile = $_FILES['image']['error'];
                $sizeFile = $_FILES['image']['size'];
            
                $max_size = 700000;
                $extensions = ['png', 'jpg', 'jpeg', 'gif', 'jiff'];
            
                if ($sizeFile > $max_size) {
                    echo "Taille de l'affiche trop importante";
                    die();
                }
            
                $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                $file_type = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                if(!in_array($file_type, $allowed_types)) {
                    echo 'format image invalide';
                    die();
                }
            
                $extension = explode('.', $nameFile);
                if(!count($extension) <=2 && !in_array(strtolower(end($extension)), $extensions)) {
                    echo 'format image incorrect';     
                }
            
                $filenameImage = uniqid() . '.' . $file_type;
            
                $upload_dir = '../../upload/image/';
                if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $filenameImage)) {
                    echo 'le fichier est dans le serveur';// Le fichier a été correctement déplacé
                } else {
                    echo 'le fichier n as pas pu etre upload';
                    die(); // Il y a eu une erreur lors du déplacement du fichier
                }

            
            } else {
                echo "erreur avec l'image";
                die();
            }

            try {
                addPosterAndImage($filenamePoster, $filenameImage);
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }

        
            /******************AJOUT TRAILER******************** */

            $trailer = $_POST['trailer'];
            
            try {
                addTrailer($trailer);
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }



            /******************AJOUT ACTEUR REAL CATEGORIE******************** */

    addFilmActor();
    addFilmReal();
    addFilmCat();
    



?>