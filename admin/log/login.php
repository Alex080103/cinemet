<?php
include ('../../config/connectBdd.php');
require ('../../config/functions.php');

/******************************************CONNEXION**************************************** */

if(isset($_POST["mail"]) && isset($_POST["password"])) {

    $mail = htmlspecialchars(strip_tags($_POST["mail"]), ENT_QUOTES);
        
    $sql = "SELECT * FROM client WHERE nom_client = '$mail'"; 

    
    session_start();
    
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $utilisateur = $stmt->fetch(); 

    $pass = password_verify(htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES), $utilisateur['mdp']);

    //si l'utilisateur est trouvé
    if($utilisateur) {
        // On check le mot de passe
        if($utilisateur['mdp'] == $pass) {
            $_SESSION['prenom'] = $utilisateur['prenom_client'];
            echo "Vous êtes connectés";
            $_SESSION['session'] = 1;
            var_dump($utilisateur['id_client'] );
            if ($utilisateur['id_role'] == 1) {
                $_SESSION['admin'] = $utilisateur['id_client'];
            }
        } else {
            echo "mdp incorrect";
            $_SESSION['error'] = 1;
        }
    } else {
        echo "Utiliisateur non trouvé";
        $_SESSION['error'] = 1;
    }
}
else {
    echo ("Données erronnées");
}

header('Location: ../../index.php');
exit();

?>
