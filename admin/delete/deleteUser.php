<?php include("../../config/connectBdd.php"); ?>
<?php include("../../config/functions.php"); ?>

<?php 
$id_client = $_POST['delete_id'];

$sql = $pdo->prepare("DELETE FROM client WHERE id_client = ? ");
$sql->execute([$id_client]);
?>