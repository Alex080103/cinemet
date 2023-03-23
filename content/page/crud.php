<?php include("../../config/connectBdd.php"); ?>
<?php include("../../config/functions.php"); ?>



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
        <script src="/cinemet/assets/js/connect.js" defer></script>

        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
    </head>
    <body class="bg-darkBlue h-screen">
    <?php 
  try {
       $film = showFilm();
        var_dump($film['nom_film']);

  } catch (Exception $e) {
      die('Erreur : '.$e->getMessage());
  }

?>
        <!--------------------INCLUDE NAVBAR--------------------->

        <header>
        <?php include('../include/navbar.html'); ?>
        </header>

        <!--------------------KRUD--------------------->

        <h2 class="text-3xl lg:text-4xl text-whitePrimary text-center underline decoration-sand font-bold italic pt-8">Page Administrateur</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 w-4/5 mx-auto pt-4">
          <div class="grid grid-rows-4 gap-4 items-center">
            <h3 class="text-2xl text-whitePrimary text-center">Page films</h3>
            <button class="bg-dark border-2 border-sand hover:scale-105 transition-all text-sand text-2xl w-4/5 px-3 py-1 mx-auto text-center block rounded-2xl">Ajouter un Film</button>
          </div>
            <h3 class="text-2xl text-whitePrimary text-center"><a href="">Gérer les utilisateurs</a></h3>
        </div>


        
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-8">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-dark uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                        Nom du film
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Date de sortie du film
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Pays d'origine du film
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Synopsis du film
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Affiche film
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Image du film
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Trailer
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Liste des acteur du film
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Réalisateur(s) du film
                      </th>
                      <th scope="col" class="px-6 py-3">
                          <span class="sr-only">Edit</span>
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr class="bg-dark border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-dark dark:hover:bg-gray-600">
                      <th scope="row" class="px-6 py-4 font-medium text-sand whitespace-nowrap">
                          <?php
                            echo $film['nom_film'];
                          ?>
                      </th>
                      <td class="px-6 py-4 text-whitePrimary">
                      <?php
                            echo $film['sortie_film'];
                          ?>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                      <?php
                            echo $film['pays_film'];
                          ?>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                        <?php
                            echo $film['synopsis_film'];
                          ?>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                          <?php
                            echo $film['affiche_film'];
                          ?>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                          <?php
                            echo $film['image_film'];
                          ?>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                          <?php
                            echo $film['nom_trailer'];
                          ?>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                          <?php
                            echo $film['id_realisateur'];
                          ?>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                          <?php
                            echo $film['nom_film'];
                          ?>
                      </td>
                      <td class="px-6 py-4 text-right flex place-items-center flex-wrap">
                          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                          <a href="#" class="font-medium text-red-600 dark:text-red-600 hover:underline">Delete</a>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>


        <!--------------------INCLUDE FOOTER--------------------->

        <?php include ('../include/footer.php');
        ?>
    </body>
</html>