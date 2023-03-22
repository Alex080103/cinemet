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
          <?php include('../include/navbar.html'); ?>
        </header>

        <div class="bg-opacity-50 py-8 relative w-11/12 mx-auto mb-8" id="popup-Form">
            <div class="bg-darkBlue border-2 border-sand shadow-md shadow-whitePrimary rounded-lg shadow-md max-w-md w-full mx-auto">
              <div class="flex justify-between items-center px-4 py-2 border-b">
                <button class="text-sand font-medium py-2 px-4 border-b-2 border-sand focus:outline-none connectInput" onclick="connexion(0)">CONNEXION</button>
                <button class="font-medium py-2 px-4 border-b-2 text-whitePrimary focus:outline-none connectInput" onclick="connexion(1)">INSCRIPTION</button>
              </div>
              <div class="px-6 py-4 tab">
                <form action="../../admin/login.php" method="POST" onsubmit="submit()">
                  <label for="email" class="block text-whitePrimary font-medium mb-2 text-2xl">E-mail</label>
                  <input type="text" placeholder="Votre Email" name="mail" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue mb-4">
                  <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Mot de passe</label>
                  <input type="password" placeholder="Votre mot de passe" name="password" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue mb-4">
                  <div class="flex justify-center">
                    <button type="submit" class="bg-sand hover:scale-105 transition-all text-white font-medium py-2 px-4 rounded-lg mr-2">Se connecter</button>
                  </div>
                </form>
                <div class="flex justify-center items-center mt-4">
                  <img src="https://img.icons8.com/fluency/48/null/google-logo.png" class="mr-4 cursor-pointer" alt="Google logo">
                  <img src="https://img.icons8.com/fluency/48/null/facebook-new.png" class="mr-4 cursor-pointer" alt="Facebook logo">
                  <img src="https://img.icons8.com/fluency/48/null/twitter.png" class="cursor-pointer" alt="Twitter logo">
                </div>
              </div>
              <div class="tab bg-darkBlue rounded-lg shadow-lg p-4 px-6">
                <form action="../../admin/signin.php" class="form-container" method="POST" onsubmit="submit()">
                  <div class="mb-4">
                    <label for="email" class="block text-whitePrimary font-medium mb-2 text-2xl">E-mail</label>
                    <input type="mail" placeholder="Votre E-mail" name="mailIn" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                  </div>
                  <div class="mb-4">
                    <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Mot de passe</label>
                    <input type="password" placeholder="Votre mot de passe" name="passwordIn" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                  </div>
                  <div class="mb-4">
                    <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Prénom</label>
                    <input type="text" placeholder="Votre prénom" name="prenomIn" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                  </div>
                  <div class="mb-4">
                    <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Nom</label>
                    <input type="text" placeholder="Votre Nom" name="nameIn" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                  </div>
                  <div class="mb-4">
                    <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Adresse</label>
                    <input type="text" placeholder="Votre adresse" name="adressIn" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                  </div>
                  <div class="flex justify-center">
                    <button type="submit" class="bg-sand hover:scale-105 transition-all text-white font-medium py-2 px-4 rounded-lg mr-2">S'inscrire</button>
                  </div>
                </form>
                <div class="connectLogo flex justify-center items-center mt-4">
                  <img src="https://img.icons8.com/fluency/48/null/google-logo.png" class="mr-4" alt="Google logo">
                  <img src="https://img.icons8.com/fluency/48/null/facebook-new.png" class="mr-4" alt="Facebook logo">
                  <img src="https://img.icons8.com/fluency/48/null/twitter.png" alt="Twitter logo">
                </div>
              </div>
            </div>
            
              
          </div>
          


        <!--------------------INCLUDE FOOTER--------------------->

        <?php include ('../include/footer.php');
        ?>
    </body>
</html>