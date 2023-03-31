<?php include("../../config/connectBdd.php"); ?>
<?php include("../../config/functions.php"); ?>

<?php 
$id_film = $_POST['delete_id'];

$sql = $pdo->prepare("DELETE FROM film
    INNER JOIN lien_acteur.id_film = ?
    INNER JOIN lien_real.id_film = ?
    INNER JOIN lien_categorie.id_film = ?
    INNER JOIN lien_categorie.id_film = ?
    INNER JOIN image.id_film = ?
    INNER JOIN trailer.id_film = ?
    WHERE id_film = ? ");
$sql->execute([$id_film]);
?>