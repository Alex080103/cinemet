<?php
include ('../../config/connectBdd.php');
require ('../../config/functions.php');
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://kit.fontawesome.com/eb7aa99f8d.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />

        <script src="/cinemet/assets/js/navbar.js" defer></script>
        <script src="../../assets/js/connect.js" defer></script>

        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
        
    </head>
    <body class="bg-darkBlue h-screen">

        <!--------------------INCLUDE NAVBAR--------------------->

        <header>
          <?php include('../../content/include/navbar.html'); ?>
        </header>

        <?php 
            $idClient = $_GET['id'];
            $user = showUser($idClient);
        ?>

        <div class="bg-opacity-50 py-8 relative w-11/12 mx-auto mb-8" id="popup-Form">
            <div class="bg-darkBlue border-2 border-sand shadow-whitePrimary rounded-lg shadow-md max-w-md w-full mx-auto">
            <h3 class="text-4xl text-whitePrimary underline decoration-sand italic font-bold text-center">Modifiez vos infos</h3>
            
            <div class="tab bg-darkBlue rounded-lg shadow-lg p-4 px-6">
                <form action="../../admin/modif/modifUser.php" class="form-container" method="POST" onsubmit="submit()">
                  <div class="mb-4">
                    <label for="email" class="block text-whitePrimary font-medium mb-2 text-2xl">E-mail</label>
                    <input type="mail" value="<?=$user['mail_client']?>" placeholder="Votre E-mail" name="mailIn" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                  </div>
                  <div class="mb-4">
                    <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Prénom</label>
                    <input type="text" value="<?=$user['prenom_client']?>" placeholder="Votre prénom" name="prenomIn" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                  </div>
                  <div class="mb-4">
                    <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Nom</label>
                    <input type="text" value="<?=$user['nom_client']?>" placeholder="Votre Nom" name="nameIn" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                  </div>
                  <div class="mb-4">
                    <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Adresse</label>
                    <input type="text" value="<?=$user['adresse_client']?>" placeholder="Votre adresse" name="adressIn" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                  </div>
                  <?php 
                    if (isset($_SESSION['admin'])) {
                  ?>
                  <div class="mb-4">
                    <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Adresse</label>
                    <select name="roleIn" class="w-full lg:w-64 px-3 py-2 border rounded-lg mx-auto focus:outline-none focus:shadow-outline-blue" required>
                        <?php if($user['id_role'] == 0) {
                            ?>
                        <option value="0">Utilisateur</option>
                        <option value="1">Admin</option>
                        <?php }
                        ?>
                        <?php if($user['id_role'] == 1) {
                            ?>
                        <option value="1">Admin</option>
                        <option value="0">Utilisateur</option>
                        <?php }
                        ?>
                    <select>
                  </div>
                  <?php
                   }
                  ?>
                  <div class="flex justify-center">
                    <button type="submit" class="bg-sand hover:scale-105 transition-all text-white font-medium py-2 px-4 rounded-lg mr-2">Valider   </button>
                  </div>
                </form>
              </div>
            </div>
            
              
          </div>
          


        <!--------------------INCLUDE FOOTER--------------------->

        <?php include ('../../content/include/footer.php');
        ?>
    </body>
</html>