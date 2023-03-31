<?php include("../../config/connectBdd.php"); ?>
<?php include("../../config/functions.php"); ?>


<?php 
    session_start();
    
    $search = $_POST['search'];

    $result = searchAllFilm($search);

    if(!empty($result)) {
        echo'hello film';
        $_SESSION['result'] = $result;
        var_dump($result);
    }

    $result = searchAllActor($search);

    if(!empty($result)) {
        echo'hello';
        $_SESSION['result'] = $result;
        var_dump($result);
    
    }

    if(empty($result)) {
        session_destroy();
    }

    //header("Location: ../../content/page/catalogue.php");
    //exit;
?>