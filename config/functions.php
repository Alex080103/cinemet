<?php
    include ('connectBdd.php');

    /****************Function*************** */
    
    
  

    function addFilm($name, $date, $country, $synopsis) {
        if(require("connectBdd.php"))
        {
            $req = $pdo->prepare("INSERT INTO film SET 
            nom_film = ?, 
            sortie_film = ?,
            pays_film = ?,
            synopsis_film = ?
            ");
            $req->execute([$name, $date, $country, $synopsis]);
            $req->closeCursor();
        }
    };

    function addActor($name, $prenom, $age, $nationality, $picture) {
        if(require("connectBdd.php"))
        {
            $req = $pdo->prepare("INSERT INTO acteur SET 
            nom_acteur = ?, 
            prenom_acteur = ?,
            age_acteur = ?,
            nationalite_acteur = ?,
            photo_acteur = ?
            ");
            $req->execute([$name, $prenom, $age, $nationality, $picture]);
            $req->closeCursor();
        }
    };

    function addReal($name, $prenom, $age, $nationality, $picture) {
        if(require("connectBdd.php"))
        {

            $req = $pdo->prepare("INSERT INTO realisateur SET 
            nom_real = ?, 
            prenom_real = ?,
            age_real = ?,
            nationalite_real = ?,
            photo_real = ?
            ");
            $req->execute([$name, $prenom, $age, $nationality, $picture]);
            $req->closeCursor();
        }
    };

     function addCat($name) {
        if(require("connectBdd.php"))
        {

            $req = $pdo->prepare("INSERT INTO categorie SET 
            nom_categorie = ? 
            ");
            $req->execute([$name]);
            $req->closeCursor();
        }
    };

    function addPosterAndImage($filenamePoster, $filenameImage) {
        if(require("connectBdd.php"))
        {
            $req = $pdo->prepare("INSERT INTO image SET 
            affiche_film = ?,
            image_film = ?,
            id_film = (SELECT max(id_film) FROM film) 
            ");
            $req->execute([$filenamePoster, $filenameImage]);
            $req->closeCursor();
        }
    };

    function addTrailer($trailer) {
        if(require("connectBdd.php"))
        {

            $req = $pdo->prepare("INSERT INTO trailer SET 
            nom_trailer = ?, 
            id_film = (SELECT max(id_film) FROM film)
            ");
            $req->execute([$trailer]);
            $req->closeCursor();
        }
    };

    

    function addFilmActor() {
        if(require("connectBdd.php"))
        {   $sql ="SELECT * FROM film WHERE id_film = (SELECT max(id_film) FROM film)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $id = $stmt->fetch();
            $idFilm = $id['id_film'];
            var_dump($idFilm);

            $idActeurArray = $_POST['idActeur'];
            var_dump($idActeurArray);

            foreach ($idActeurArray as $idActeur) {
            $req = $pdo->prepare("INSERT INTO lien_acteur 
            SET    
            id_acteur = ?,
            id_film = '$idFilm'
            ");
            $req->execute([$idActeur]);
            $req->closeCursor();
        }
    }
    };

    function addFilmReal() {
        if(require("connectBdd.php"))
        {   $sql ="SELECT * FROM film WHERE id_film = (SELECT max(id_film) FROM film)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $id = $stmt->fetch();
            $idFilm = $id['id_film'];
            var_dump($idFilm);

            $idRealArray = $_POST['idReal'];
            
            foreach ($idRealArray as $idReal) {
            $req = $pdo->prepare("INSERT INTO lien_real
            SET    
            id_realisateur = ?,
            id_film = '$idFilm'
            ");
            var_dump($idReal);

            $req->execute([$idReal]);
            $req->closeCursor();
            }
        }   
    };

    function addFilmCat() {
        if(require("connectBdd.php"))
        {   $sql ="SELECT * FROM film WHERE id_film = (SELECT max(id_film) FROM film)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $id = $stmt->fetch();
            $idFilm = $id['id_film'];
            var_dump($idFilm);

            $idCatArray = $_POST['idCat'];
            var_dump($idCatArray);

            foreach ($idCatArray as $idCat) {
            $req = $pdo->prepare("INSERT INTO lien_categorie 
            SET    
            id_categorie = ?,
            id_film = '$idFilm'
            ");
            $req->execute([$idCat]);
            $req->closeCursor();
        }
    }
    };

    function selectActor () {
        if(require("connectBdd.php")) {
            $sql ="SELECT * FROM acteur";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $req = $stmt->fetchAll();
            return $req;
        }
    }

    function selectReal () {
        if(require("connectBdd.php")) {
            $sql ="SELECT * FROM realisateur";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $req = $stmt->fetchAll();
            return $req;
        }
    }

        function selectCat () {
        if(require("connectBdd.php")) {
            $sql ="SELECT * FROM categorie";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $req = $stmt->fetchAll();
            return $req;
        }
    }

    function showFilm() {
        if(require("connectBdd.php")) {
            $sql ="SELECT nom_film, sortie_film, pays_film, synopsis_film,
                affiche_film, image_film, nom_trailer,
                id_realisateur, id_acteur, id_categorie
              FROM film
              INNER JOIN image ON film.id_film = image.id_film 
              INNER JOIN trailer ON film.id_film = trailer.id_film
              INNER JOIN lien_categorie ON film.id_film = lien_categorie.id_film
              INNER JOIN lien_acteur ON film.id_film = lien_acteur.id_film 
              INNER JOIN lien_real ON film.id_film = lien_real.id_film
              ";


            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $film = $stmt->fetch();
            return $film;

        }
    }

    function GetIdFilm() {
        if(require("connectBdd.php")) {
            $sql ="SELECT id_film FROM film";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $idFilm = $stmt->fetchAll();
            return $idFilm;
        }
    }

    function GetIdUser() {
        if(require("connectBdd.php")) {
            $sql ="SELECT id_client FROM client";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $idFilm = $stmt->fetchAll();
            return $idFilm;
        }
    }

    function GetActorById($id_film) {
        if(require("connectBdd.php")) {
            $sql = "SELECT * FROM acteur
            INNER JOIN lien_acteur ON lien_acteur.id_acteur = lien_acteur.id_film
            WHERE id_acteur = '$id_acteur'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $id_acteur = $stmt->fetch();
            return $id_acteur;
        }
    }



    function showAllFilm($id_film) {
        if(require("connectBdd.php")) {
                $sql ="SELECT *
                  FROM film
                  INNER JOIN image ON film.id_film = image.id_film 
                  INNER JOIN trailer ON film.id_film = trailer.id_film
                  INNER JOIN lien_categorie ON film.id_film = lien_categorie.id_film
                  INNER JOIN lien_acteur ON film.id_film = lien_acteur.id_film 
                  INNER JOIN acteur ON acteur.id_acteur = lien_acteur.id_acteur
                  INNER JOIN lien_real ON film.id_film = lien_real.id_film

                  WHERE film.id_film = {$id_film['id_film']}
                  ";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $film = $stmt->fetch();
                return $film;
            }
        }

    function showAllUser($id_user) {
        if(require("connectBdd.php")) {
            $sql = "SELECT * 
            FROM client
            WHERE id_client = {$id_user['id_client']}
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $film = $stmt->fetch();
            return $film;
        }
    }

    function showUser($idClient) {
        if(require("connectBdd.php")) {
            $sql = "SELECT * 
            FROM client
            WHERE id_client = '$idClient'
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $film = $stmt->fetch();
            return $film;
        }
    }

    function findFilm($id_film) {
        if(require("connectBdd.php")) {
                $sql ="SELECT *
                  FROM film
                  INNER JOIN image ON film.id_film = image.id_film 
                  INNER JOIN trailer ON film.id_film = trailer.id_film
                  INNER JOIN lien_categorie ON film.id_film = lien_categorie.id_film
                  INNER JOIN lien_acteur ON film.id_film = lien_acteur.id_film 
                  INNER JOIN acteur ON acteur.id_acteur = lien_acteur.id_acteur
                  INNER JOIN lien_real ON film.id_film = lien_real.id_film

                  WHERE film.id_film = '$id_film'
                  ";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $film = $stmt->fetch();
                
                return $film;
                
            }
        }

        

    function findIdActor($id_film) {
        if (require("connectBdd.php")) {
            $sql = "SELECT id_acteur
                FROM lien_acteur
                WHERE id_film = {$id_film['id_film']}
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $actors = $stmt->fetchAll();
            return $actors;
        }
    }

    function findIdActorPage($id_film) {
        if (require("connectBdd.php")) {
            $sql = "SELECT id_acteur
                FROM lien_acteur
                WHERE id_film = '$id_film'
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $actors = $stmt->fetchAll();
            return $actors;
        }
    }

    function findIdCatPage($id_film) {
        if (require("connectBdd.php")) {
            $sql = "SELECT id_categorie
                FROM lien_categorie
                WHERE id_film = '$id_film'
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $actors = $stmt->fetchAll();
            return $actors;
        }
    }

    function findActor($actor) {
        if(require("connectBdd.php")) {
            $sql = "SELECT * 
                FROM acteur
                WHERE id_acteur = '$actor[id_acteur]'
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $actor = $stmt->fetch();
            return($actor);
        }
    }


    function findReal($film) {
        if(require("connectBdd.php")) {
            $sql = "SELECT * 
                FROM realisateur
                WHERE id_realisateur = '$film[id_realisateur]'
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $real = $stmt->fetch();
            return($real);
        }
    }

    function findCat($film) {
        if(require("connectBdd.php")) {
            $sql = "SELECT * 
                FROM categorie
                WHERE id_categorie = '$film[id_categorie]'
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $real = $stmt->fetch();
            return($real);
        }
    }
        /*SELECT * FROM film INNER JOIN lien_acteur ON film.id_film = lien_acteur.id_film INNER JOIN acteur ON acteur.id_acteur = lien_acteur.id_acteur WHERE film.id_film = 105;
*/

    /*************************MODIFICATIONS********************* */
    
    function modifFilm($name, $date, $country, $synopsis, $id_film) {
        if(require("connectBdd.php"))
        {
            $req = $pdo->prepare("UPDATE film SET 
            nom_film = ?, 
            sortie_film = ?,
            pays_film = ?,
            synopsis_film = ?
            WHERE id_film = ?
            ");
            $req->execute([$name, $date, $country, $synopsis, $id_film]);
            $req->closeCursor();
        }
    };

    function modifImage($filenameImage, $id_film) {
        if(require("connectBdd.php"))
        {

                $req = $pdo->prepare(
                    "UPDATE image 
                    SET 
                    image_film = ?
                    WHERE id_film = '$id_film'
                    ");
                    $req->execute([$filenameImage]);
                    $req->closeCursor();
    
        }
    };

    function modifPoster($filenamePoster, $id_film) {
        if(require("connectBdd.php"))
        {
            
            $req = $pdo->prepare(
                "UPDATE image 
                SET 
                affiche_film = ?,
                WHERE id_film = '$id_film'
                ");
                $req->execute([$filenamePoster]);
                $a = $req;
                var_dump($a);
                $req->closeCursor();
        }
    };

    function modifTrailer($trailer, $id_film) {
        if(require("connectBdd.php"))
        {
            $req = $pdo->prepare("UPDATE trailer SET 
            nom_trailer = ?
            WHERE id_film = ? 
            ");
            $req->execute([$trailer, $id_film]);
            $req->closeCursor();
        }
    };

    

    function modifFilmActor($id_film) {
        if(require("connectBdd.php"))
        {   
            $req = $pdo->prepare("DELETE FROM lien_acteur 
            WHERE id_film = ? 
            ");
            $req->execute([$id_film]);
            $req->closeCursor();
  


            if(isset($_POST['idActeur']) && isset($_POST['acteur'])) {
                $idActeurArray = $_POST['idActeur'];
                $id_acteurArray = $_POST['acteur'];
                $idActeurArray = array_merge($idActeurArray, $id_acteurArray);
            } else {
                $idActeurArray = $_POST['acteur'];

            }


            if(isset($idActeurArray) && is_array($idActeurArray)) {
                foreach ($idActeurArray as $idActeur) {
                $req = $pdo->prepare("INSERT INTO lien_acteur 
                SET    
                id_acteur = ?,
                id_film = '$id_film'
                ");
                $req->execute([$idActeur]);
                $req->closeCursor();
            }
            } else if (isset($idActeurArray)) {
                foreach ($idActeurArray as $idActeur) {
                $req = $pdo->prepare("INSERT INTO lien_acteur 
                SET    
                id_acteur = ?,
                id_film = '$id_film'
                ");
                $req->execute([$idActeur]);
                $req->closeCursor();
            }
            }
    }
    };

    function modifFilmReal($id_real, $id_film) {
        if(require("connectBdd.php"))
        {   $req = $pdo->prepare("DELETE FROM lien_real
            WHERE id_film = ? 
            ");
            $req->execute([$id_film]);
            $req->closeCursor();
            
            $req = $pdo->prepare("INSERT INTO lien_real 
            SET    
            id_realisateur = ?,
            id_film = ?
            ");
            $req->execute([$id_real, $id_film]);
            $req->closeCursor();
            
        }   
    };

    function modifFilmCat($id_cat, $id_film) {
        if(require("connectBdd.php"))
        {   
            $req = $pdo->prepare("DELETE FROM lien_categorie 
            WHERE id_film = ? 
            ");
            $req->execute([$id_film]);
            $req->closeCursor();   


            if(isset($_POST['idCat']) && isset($_POST['cat'])) {
                $idCatArray = $_POST['idCat'];
                $id_CatArray = $_POST['cat'];
                $idCatArray = array_merge($idCatArray, $id_CatArray);
            } else {
                $idCatArray = $_POST['cat'];
            }



            if(isset($idCatArray) && is_array($idCatArray)) {
                foreach ($idCatArray as $idCat) {
                $req = $pdo->prepare("INSERT INTO lien_categorie 
                SET    
                id_categorie = ?,
                id_film = '$id_film'
                ");
                $req->execute([$idCat]);
                $req->closeCursor();   

            }
            } else if (isset($idCatArray)) {
                foreach ($idCatArray as $idCat) {
                $req = $pdo->prepare("INSERT INTO lien_categorie 
                SET    
                id_categorie = ?,
                id_film = '$id_film'
                ");
                $req->execute([$idCat]);
                $req->closeCursor();
            }
            }
    }
    };

?>