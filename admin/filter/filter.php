<?php include("../../config/connectBdd.php"); ?>
<?php include("../../config/functions.php"); ?>


<?php 

    session_start();

    $searchCat = null;
    $searchCountry = null;
    $searchActor = null;
    
    if(!empty($_POST['category'])) {
        $searchCat = $_POST['category'];
    }

    if(!empty($_POST['country'])) {
        $searchCountry = $_POST['country'];
        var_dump($searchCountry);
    }

    if(!empty($_POST['actor'])) {
        $searchActor = $_POST['actor'];
    }

   
    if(require("../../config/connectBdd.php")) {
        $sql ="SELECT ";
        if(!empty($searchCat)) {
            $sql .= "id_categorie";
            if(!empty($searchCountry) || !empty($searchActor)) {
                $sql .= ", ";
            }
        }
        if(!empty($searchCountry)) {
           $sql .="pays_film";
           if(!empty($searchActor)) {
            $sql .= ", ";
        }
        }
        if(!empty($searchActor)) {
            $sql .="id_acteur";
         }

        $sql .= " FROM ";

        if(!empty($searchCat)) {
            $sql .= "categorie";
        }

        if(!empty($searchCountry) && empty($searchCat)) {
           $sql .="film";
        } else if(!empty($searchCat) && !empty($searchCountry)) {
            $sql .= " INNER JOIN film";
        }

        
        if(!empty($searchActor) && empty($searchCat) && empty($searchCat)) {
            $sql .="acteur";
        }   else if( !empty($searchActor) && (!empty($searchCat) || !empty($searchCountry))) {
                $sql .= " INNER JOIN acteur";
        } 
        }
        
         $sql .= " WHERE ";

        if(!empty($searchCat)) {
            $sql .= "nom_categorie = ?";
        }

        if(!empty($searchCountry) && empty($searchCat)) {
           $sql .="pays_film = ?";
         } else if(!empty($searchCat) && !empty($searchCountry)) {
            $sql .= " AND pays_film = ?";
        }
        
        if(!empty($searchActor) && empty($searchCat) && empty($searchCat)) {
            $sql .="nom_acteur";
        } else if((!empty($searchCat) || !empty($searchCountry)) && !empty($searchActor)) {
                $sql .= " AND nom_acteur = ?";
            }
        

        $sql .=" GROUP BY ";

        if(!empty($searchCat)) {
            $sql .= "id_categorie";
            if(!empty($searchCountry) || !empty($searchActor)) {
                $sql .= ", ";
            }
        }
        if(!empty($searchCountry)) {
           $sql .="pays_film";
           if(!empty($searchActor)) {
            $sql .= ", ";
        }
        }
        if(!empty($searchActor)) {
            $sql .="id_acteur";
         }

         var_dump($sql);


        // $sql = "SELECT id_categorie, pays_film, id_acteur
        //   FROM categorie
        //   INNER JOIN film 
        //   INNER JOIN acteur
        //   WHERE nom_categorie = ? AND pays_film = ? AND nom_acteur = ?
        //   GROUP BY id_categorie, pays_film, id_acteur
        //   ";
        $stmt = $pdo->prepare($sql);
        

        if (!empty($searchCat)) {
            $all = $searchCat;
        }
        if (!empty($searchCountry) && !empty($searchCat)) {
            $all .= ", " . $searchCountry;
        } else if (!empty($searchCountry) && (empty($searchCat) && empty($searchActor))) {
            $all = $searchCountry;
        }
        if (!empty($searchActor) && (!empty($searchCat) || !empty($searchCountry))) {
            $all .= ", " . $searchActor;
        }   else if (!empty($searchActor) && (empty($searchCat) && empty($searchCountry))) {
            $all = $searchActor;
        }

        $all = explode(",", $all);
        var_dump($all[0]);

        var_dump($all);
        
        $stmt->execute([$all]);
        $film = $stmt->fetchAll();

        if(!empty($searchCat)){
            $cat = $film[0]['id_categorie'];
        }
        if(!empty($searchCountry)){
            $country = $film[0]['pays_film'];
        }
        if(!empty($searchActor)){
            $actor = $film[0]['id_acteur'];
        }
        
        


        $sql ="SELECT id_film";

        $sql .= " FROM ";

        if(!empty($country)) {
            $sql .= "film";
        }

        if(!empty($cat) && empty($country)) {
           $sql .="lien_categorie";
        } else if(!empty($cat) && !empty($country)) {
            $sql .= " NATURAL JOIN lien_categorie";
        }

        
        if(!empty($actor) && empty($cat) && empty($country)) {
            $sql .="acteur";
        }   else if( !empty($actor) && (!empty($cat) || !empty($country))) {
                $sql .= " NATURAL JOIN acteur";
        } 
        
        
         $sql .= " WHERE ";

        if(!empty($cat)) {
            $sql .= "id_categorie = ?";
        }

        if(!empty($country) && empty($cat)) {
           $sql .="pays_film = ?";
         } else if(!empty($cat) && !empty($country)) {
            $sql .= " AND pays_film = ?";
        }
        
        if(!empty($actor) && empty($cat) && empty($country)) {
            $sql .="id_acteur";
        } else if((!empty($cat) || !empty($country)) && !empty($actor)) {
                $sql .= " AND id_acteur = ?";
            }
        var_dump($sql);

        // $sql = "SELECT id_film
        // FROM film
        // NATURAL JOIN lien_categorie
        // NATURAL JOIN lien_acteur
        // WHERE id_categorie = ? AND pays_film = ? AND id_acteur = ?
        // ";
        $stmt = $pdo->prepare($sql);
        
        if (!empty($cat)) {
            $all = $cat;
        }
        if (!empty($country) && !empty($cat)) {
            $all .= ", " . $country;
        } else if (!empty($country) && (empty($cat) && empty($actor))) {
            $all = $country;
        }
        if (!empty($actor) && (!empty($cat) || !empty($country))) {
            $all .= ", " . $actor;
        }   else if (!empty($actor) && (empty($cat) && empty($country))) {
            $all = $actor;
        }

        $stmt->execute([$all]);
        $film = $stmt->fetchAll();

        
    
    
    
    $result = $film;

    $_SESSION['filter'] = $result;

    var_dump($_SESSION['filter']);

    
?>