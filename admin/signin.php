<?php

include ('../config/connectBdd.php');
require ('../config/functions.php');


/*************************************INSCRIPTION**************************************** */

if (isset($_POST['mailIn']) && isset($_POST['passwordIn'])) {


    $mailIn = htmlspecialchars($_POST["mailIn"]);
    $nameIn = htmlspecialchars($_POST["nameIn"]);
    $prenomIn = htmlspecialchars($_POST["prenomIn"]);
    $adressIn = htmlspecialchars($_POST["adressIn"]);


    $hash = password_hash(htmlspecialchars(strip_tags($_POST['passwordIn']), ENT_QUOTES), PASSWORD_DEFAULT);
    $passIn = $hash;
     
    $sql = "SELECT * FROM client WHERE mail_client = '$mailIn'";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    $utilisateur = $stmt->fetch();

    var_dump($utilisateur);



    session_start();

    if ($utilisateur) {
        $_SESSION['errorIn'] = 3;
       //header('Location: http://codesimplon/portfolio/projets/voyage/index.php');
        exit();
    }

    $inscription = $pdo->prepare("
        INSERT INTO client (nom_client, prenom_client, mail_client, mdp, adresse_client)
        VALUES (:nameIn, :prenomIn, :mailIn, :passIn, :adressIn)
    ");

    $doing = $inscription->bindValue(':nameIn', $nameIn);
    $inscription->bindValue(':prenomIn', $prenomIn);
    $inscription->bindValue(':mailIn', $mailIn);
    $inscription->bindValue(':passIn', $passIn);
    $inscription->bindValue(':adressIn', $adressIn);
    $inscription->execute();


    if (isset($doing)) {
        echo "<p>Le contact a été ajouté</p>";
        $_SESSION['inscription'] = 1;
   } else {
        echo "<p>Erreur</p>";
}
}

?>