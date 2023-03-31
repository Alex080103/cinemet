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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <script src="/cinemet/assets/js/navbar.js" defer></script>
        <script src="/cinemet/assets/js/connect.js" defer></script>
        <script src="/cinemet/assets/js/delete.js" defer></script>
        <script src="/cinemet/assets/js/changeAdmin.js" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
    </head>
    <body class="bg-darkBlue h-screen">
      <!--------------------INCLUDE NAVBAR--------------------->

        <header>
          <?php include('../include/navbar.html'); ?>
        </header>

        <!--------------------KRUD--------------------->

        <h2 class="text-3xl lg:text-5xl text-whitePrimary text-center underline decoration-sand font-bold italic pt-8">Page Administrateur</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 grid-rows-[auto_auto] w-4/5 mx-auto my-16">
          <div class="grid gap-4 items-start">
            <h3 onclick="changeAdmin(1)" class="justify-self-end cursor-pointer rounded-l-2xl uppercase py-4 text-2xl lg:text-4xl changeAdmin w-4/5 text-sand text-center bg-dark border-sand border-2 transition-all">Films</h3>
          </div>
            <div class="grid gap-4 items-start">
              <h3 onclick="changeAdmin(2)" class="text-2xl rounded-r-2xl uppercase py-4 cursor-pointer lg:text-4xl changeAdmin w-4/5 text-whitePrimary text-center bg-dark border-whitePrimary border-2 transition-all">Utilisateurs</h3>
            </div>
            <div class="action mt-8 grid-cols-2 justify-self-center grid gap-4 col-start-1 w-full col-end-3">
              <a href="../../admin/form/addFilm.php"><button class="bg-dark border-2 justify-self-start border-sand hover:scale-105 transition-all text-sand text-2xl w-4/5 px-3 py-1 mx-auto text-center block rounded-2xl">Ajouter un Film</button></a>
              <a href="../../admin/form/addActor.php"><button class="bg-dark border-2 justify-self-start border-sand hover:scale-105 transition-all text-sand text-2xl w-4/5 px-3 py-1 mx-auto text-center block rounded-2xl">Ajouter un Acteur</button></a>
              <a href="../../admin/form/addReal.php"><button class="bg-dark border-2 justify-self-start border-sand hover:scale-105 transition-all text-sand text-2xl w-4/5 px-3 py-1 mx-auto text-center block rounded-2xl">Ajouter un Réalisateur</button></a>
              <a href="../../admin/form/addCategory.php"><button class="bg-dark border-2 justify-self-start border-sand hover:scale-105 transition-all text-sand text-2xl w-4/5 px-3 py-1 mx-auto text-center block rounded-2xl">Ajouter une Catégorie</button></a>
            </div>
            <div class="action hidden mt-8 justify-self-center gap-4 col-start-1 w-full col-end-3">
              <button  class="bg-dark border-2 border-sand hover:scale-105 transition-all text-sand text-2xl w-1/2 px-3 py-1 mx-auto text-center block rounded-2xl">Ajouter un Utilisateur</button>
            </div>

        </div>

        <!--------------------FILM--------------------->

        
      <div id="film" class="relative overflow-x-auto shadow-md sm:rounded-lg mb-8 mt-16">
        <h3 class="text-center text-whitePrimary text-4xl mb-8 italic">Gérer vos films</h3>
          <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-dark uppercase bg-whitePrimary dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                        Nom du film
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Sortie du film
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
                        Acteur du film
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Réalisateur(s) du film
                      </th>
                      <th scope="col" class="px-6 py-3">
                          <span class="sr-only">Edit</span>
                      </th>
                  </tr>
              </thead>
              <tbody class="text-white">
                <div class="text-white">
                  <?php /**************BOUCLE FILMS**************** */
                      try {
                        $idFilm = GetIdFilm();

                        foreach ($idFilm as $id_film) {
                        $film = showAllFilm($id_film);
                        
                        
                    ?>
                </div>
                  
                  <tr id="<?=$film['id_film']?>" class="bg-dark border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-dark dark:hover:bg-gray-600">
                  
                    <th scope="row" class="text-2xl text-center uppercase px-6 py-4 font-medium text-sand">
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
                        <button 
                          data-modal-target="<?php echo $film['synopsis_film'];?>" 
                          data-modal-show="<?php echo $film['synopsis_film'];?>" 
                          class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                          type="button">
                          Voir
                        </button>
                        <div 
                          id="<?php echo $film['synopsis_film'];?>" 
                          tabindex="-1" 
                          aria-hidden="true" 
                          class=" overflow-x-hidden fixed top-6 grid grid-rows-[100px_auto] first-letter:overflow-y-auto text-xl md:inset-0 h-auto w-[calc(100%-1rem)] rounded-2xl md:h-3/4 hidden bg-darkBlue border-sand border-2 z-50">
                          <h3 class="block text-4xl text-center underline decoration-sand">Voici le synopsis de <?php echo $film['nom_film']?></h3>
                          <p class="block place-self-start w-3/4 mx-auto">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores, tempore eos facere rerum fugiat quae laudantium eligendi distinctio libero sint quidem aliquam repudiandae ipsum, harum iste! A autem amet id?<?php echo $film['synopsis_film'];?>
                          </p>
                          <button 
                          data-modal-target="<?php echo $film['synopsis_film'];?>" 
                          data-modal-hide="<?php echo $film['synopsis_film'];?>" 
                          class="block text-white bg-red-700 hover:bg-red-800 w-1/4 mx-auto focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-md px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                          type="button">
                          Fermer
                        </button>
                        </div>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                        <img 
                          src="../../upload/affiche/<?php echo $film['affiche_film'];?>"
                        >
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                        <img 
                          src="../../upload/image/<?php echo $film['image_film'];?>"
                        >
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                        <iframe 
                        src="<?php echo $film['nom_trailer'];?>" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share">
                        </iframe>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                          <button 
                          data-modal-target="<?php echo $film['sortie_film'];?>" 
                          data-modal-show="<?php echo $film['sortie_film'];?>" 
                          class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                          type="button">
                          Voir
                        </button>
                        <div 
                          id="<?php echo $film['sortie_film'];?>" 
                          tabindex="-1" 
                          aria-hidden="true" 
                          class=" overflow-x-hidden fixed top-6 grid grid-rows-[100px_auto_auto] first-letter:overflow-y-auto text-xl md:inset-0 h-auto w-[calc(100%-1rem)] rounded-2xl md:h-3/4 hidden bg-darkBlue border-sand border-2 z-50">
                          <h3 class="block text-4xl text-center underline decoration-sand">Voici les acteurs de <?php echo $film['nom_film']?></h3>
                          
                            <?php 
                              $id_acteur = $film['id_acteur'];
                              try {

                                $actors = findIdActor($id_film);
                                foreach ($actors as $actor) {
                                  $actor = findActor($actor);
                            ?> <p class="block place-self-start w-3/4 mx-auto">
                            <?php
                                  echo $actor['nom_acteur'];
                                  echo $actor['prenom_acteur'];
                                }   
                            ?>
                            </p>
                            <?php
                                
                                } catch (Exception $e) {
                                  die('Erreur : '.$e->getMessage());
                              }
                               
                            ?>
                          
                          <button 
                          data-modal-target="<?php echo $film['sortie_film'];?>" 
                          data-modal-hide="<?php echo $film['sortie_film'];?>" 
                          class="block text-white bg-red-700 hover:bg-red-800 w-1/4 mx-auto focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-md px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                          type="button">
                          Fermer
                        </button>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                          <?php
                            $real = findReal($film);
                            echo $real['nom_real'];
                          ?>
                      </td>
                      <td class="px-6 py-4 place-items-center h-full flex-wrap">
                          <?php echo "<a href='../../admin/form/modifFilm.php?id=".$film['id_film']."' class='font-medium text-blue-600 dark:text-blue-500 hover:underline  '>"; ?>
                          Edit</a>
                          
                          <button id="<?=$film['id_film']?>" class="font-medium text-red-600 dark:text-red-600 hover:underline delete_film">Delete</button>
                      </td>
                  </tr>
                  
                  <?php
                      } //END FOREACH
                      } catch (Exception $e) {
                          die('Erreur : '.$e->getMessage());
                      }?>
              </tbody>
          </table>
      </div>


      <!-------------------------------PART USERS------------------------------------>

      <div id="user" class="relative hidden overflow-x-auto shadow-md sm:rounded-lg mb-8 mt-16">
        <h3 class="text-center text-whitePrimary text-4xl mb-8 italic">Gérer vos utilisateurs</h3>
          <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-dark uppercase bg-whitePrimary dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                        Nom
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Prénom
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Mail
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Adresse
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Role
                      </th>
                      <th scope="col" class="px-6 py-3">
                          <span class="sr-only">Edit</span>
                      </th>
                  </tr>
              </thead>
              <tbody class="text-white">
                <div class="text-white">
                  <?php /**************BOUCLE USER**************** */
                      try {
                        $idFilm = GetIdUser();

                        foreach ($idFilm as $id_user) {
                        $film = showAllUser($id_user);
                        
                        
                    ?>
                </div>
                  
                  <tr id="<?=$film['id_client']?>" class="bg-dark border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-dark dark:hover:bg-gray-600">
                  
                    <th scope="row" class="text-2xl text-center uppercase px-6 py-4 font-medium text-sand">
                          <?php
                            echo $film['nom_client'];
                          ?>
                      </th>
                      <td class="px-6 py-4 text-whitePrimary">
                      <?php
                            echo $film['prenom_client'];
                          ?>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                      <?php
                            echo $film['mail_client'];
                          ?>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                      <?php
                            echo $film['adresse_client'];
                          ?>
                      </td>
                      <td class="px-6 py-4 text-whitePrimary">
                      <?php
                            if ($film['id_role'] == 1) {
                              echo 'Admin';
                            }
                            else {
                              echo 'Utilisateur';
                            }
                          ?>
                      </td>
                      
                      <td class="px-6 py-4 place-items-center h-full flex-wrap">
                          <?php echo "<a href='../../admin/form/modifUser.php?id=".$id_user['id_client']."' class='font-medium text-blue-600 dark:text-blue-500 hover:underline  '>"; ?>
                          Edit</a>
                          <button type="button" id="<?=$film['id_client']?>" class="font-medium text-red-600 dark:text-red-600 hover:underline delete_user">Delete</button>
                      </td>
                  </tr>
                  
                  <?php
                      } //END FOREACH
                      } catch (Exception $e) {
                          die('Erreur : '.$e->getMessage());
                      }?>
              </tbody>
          </table>
      </div>
<div id="myModal" class="modal hidden fixed z-10 inset-0 overflow-y-auto">
  <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
  <div class="modal-content fixed bg-darkBlue top-1/2 left-1/2 rounded-2xl border-2 border-sand transform -translate-x-1/2 -translate-y-1/2 shadow-lg px-4 py-6">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-medium text-sand">Confirm Deletion</h2>
      <span class="close cursor-pointer text-whitePrimary hover:text-white">&times;</span>
    </div>
    <p class="text-whitePrimary mb-6">Are you sure you want to delete this video?</p>
    <div class="flex justify-end">
      <button type="button" class="btn-yes mr-4 bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">Yes</button>
      <button type="button" class="btn-no bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg">No</button>
    </div>
  </div>
</div>

      <div id="user">salut</div>

        <!--------------------INCLUDE FOOTER--------------------->

        <?php include ('../include/footer.php');
        ?>
    </body>
</html>