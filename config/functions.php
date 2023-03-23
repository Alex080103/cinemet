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


?>