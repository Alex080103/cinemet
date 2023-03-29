<?php include("../../config/connectBdd.php"); ?>
<?php include("../../config/functions.php"); ?>

<?php 
$id_film = $_POST['delete_id'];

$sql = $pdo->prepare("DELETE FROM film WHERE id_film = ? ");
$sql->execute([$id_film]);
?>