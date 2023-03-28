<?php
include ('../../config/connectBdd.php');
require ('../../config/functions.php');
?>
<?php 
    function modifUser() {
        if(require("connectBdd.php")) {

        if (isset($_POST['mailIn']) && isset($_POST['passwordIn'])) {
        
        
            $mailIn = htmlspecialchars($_POST["mailIn"]);
            $nameIn = htmlspecialchars($_POST["nameIn"]);
            $prenomIn = htmlspecialchars($_POST["prenomIn"]);
            $adressIn = htmlspecialchars($_POST["adressIn"]);
            $roleIn = htmlspecialchars($_POST["roleIn"]);

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
                INSERT INTO client (nom_client, prenom_client, mail_client, adresse_client, id_role)
                VALUES (:nameIn, :prenomIn, :mailIn, :adressIn, :roleIn)
            ");
        
            $doing = $inscription->bindValue(':nameIn', $nameIn);
            $inscription->bindValue(':prenomIn', $prenomIn);
            $inscription->bindValue(':mailIn', $mailIn);
            $inscription->bindValue(':passIn', $passIn);
            $inscription->bindValue(':adressIn', $adressIn);
            $inscription->bindValue(':roleIn', $roleIn);

            $inscription->execute();
        
        
                }
            }
    }
    
    try {
        modifUser();
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }



?>