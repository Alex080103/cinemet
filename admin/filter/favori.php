<?php include("../../config/connectBdd.php"); ?>
<?php include("../../config/functions.php"); ?>

<?php 
session_start();
$prenom = $_SESSION['prenom'];
var_dump($prenom);

$sql = "SELECT id_client
            FROM client
            WHERE prenom_client = ?
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$prenom]);
            $film = $stmt->fetch(); 

            var_dump($film['id_client']);
            $id_client = $film['id_client'];
            $id_film = $_POST['delete_id'];

try {
    addFav($id_film, $id_client);
    $_SESSION['favori'] = $id_film;
}   catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}    
?>