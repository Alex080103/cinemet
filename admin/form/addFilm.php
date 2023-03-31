<?php include("../../config/connectBdd.php"); ?>
<?php include("../../config/functions.php"); ?>
<script src="../../assets/js/addSelect.js" defer></script>


<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://kit.fontawesome.com/eb7aa99f8d.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <script src="/cinemet/assets/js/navbar.js" defer></script>
        <script src="/cinemet/assets/js/multiSelect.js" defer></script>


        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
        
  </head>
  <body class="bg-darkBlue h-screen">

      <!--------------------INCLUDE NAVBAR--------------------->

    <header>
      <?php include('../../content/include/navbar.html'); ?>
    </header>
    <form action="../../admin/add/add_Film.php" class="form-container" enctype="multipart/form-data" method="POST" onsubmit="submit()">

      <div class="bg-darkBlue border-2 border-sand shadow-md  shadow-whitePrimary rounded-lg max-w-5xl  mx-auto relative w-11/12 mb-8 mt-16" id="popup-Form">
        
        <div class="tab bg-darkBlue rounded-lg grid-cols-2 gap-32 items-center grid shadow-lg p-4 px-6">
          <div>
            <div class="mb-4">
              <label for="email" class="block text-whitePrimary font-medium mb-2 text-2xl">Nom du film</label>
              <input type="mail" placeholder="Le nom du film  " name="name"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
            </div>
            <div class="mb-4">
              <label for="date" class="block text-whitePrimary font-medium mb-2 text-2xl">Date de sortie du film</label>
              <input type="date" placeholder="Date de sortie du film" name="date"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
            </div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Pays d'origine du film</label>
              <input type="text" placeholder="Le pays d'origine du film" name="country"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
            </div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Synopsis du film</label>
              <textarea name="synopsis" class="rounded-2xl w-full p-2"></textarea>
            </div>
            
          </div>
          <div>
            
          
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Votre affiche:</label>
              <input type="file" name="poster" placeholder="image"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue placeholder:text-white" />
            </div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Une image de votre film:</label>
              <input type="file" title=" " name="image" placeholder="image"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue placeholder:text-white" />
            </div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Lien de votre bande-annonce <br>
                <span class="text-[20px] underline decoration-blue-500 text-blue-500 cursor pointer">
                  <a target="_blank" href="https://support.google.com/youtube/answer/171780?hl=fr">(Comment l'avoir)</a></span>
              </label>
              <input type="text" placeholder="Lien de la bande annonce" name="trailer"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
            </div>
          </div>
          </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 items-start justify-center">
              <div class="mb-4 grid justify-center items-start justify-items-stretch">
                <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl text-center">Acteurs</label>
                <select id="monSelectActor" name="director"  class="w-full lg:w-64 px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                <?php
                   try {
                       $req = selectActor();
                   } catch (Exception $e) {
                       die('Erreur : '.$e->getMessage());
                   }
                   foreach ($req as $actor) {
                ?>
                <option
                data-id-acteur="<?php echo $actor['id_acteur']?>"
                value="<?php echo $actor['id_acteur'].'-'.$actor['nom_acteur']; ?>">
                  <?php echo $actor['prenom_acteur'] ." ". $actor['nom_acteur']; ?>
                </option>
                <?php
                      }
                ?>
                </select>
                <p onclick="addSelectActor()" class="cursor-pointer mb-1 w-full mx-auto lg:w-52 items-center flex justify-center bg-dark border-sand border-2 hover:scale-105 transition-all text-white font-medium py-2 px-4 rounded-lg">
                  Ajouter un acteur
                </p>
                <div id="conteneurActor">
                </div>
              </div>
              <div class="mb-4 grid justify-center items-start">
                <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl text-center">Realisateur</label>
                <select placeholder="Votre adresse" id="monSelectReal" name="director"  class="w-full lg:w-64 px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                  <?php
                    try {
                        $req = selectReal();
                      } catch (Exception $e) {
                        die('Erreur : '.$e->getMessage());
                      }
                      $i = 0;
                    foreach ($req as $real) {
                  ?>
                  <option
                  data-id-real="<?php echo $real['id_realisateur']?>"
                  value="<?php echo $real['id_realisateur'].'-'.$real['nom_real']; ?>">
                    <?php echo $real['nom_real']; ?>
                  </option>
                  <?php    $i++;
                      }
                    
                  ?>
                </select>
                <p onclick="addSelectReal()" class="cursor-pointer mb-1 w-full mx-auto lg:w-52 items-center flex justify-center bg-dark border-sand border-2 hover:scale-105 transition-all text-white font-medium py-2 px-4 rounded-lg">
                  Ajouter un réalisateur
                </p>
                <div id="conteneurReal" class="">
                </div>
              </div>
            <div class="mb-4 grid justify-center col-start-1 col-end-3 items-start">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl text-center">Categories</label>
              <select placeholder="Votre categorie" id="monSelectCat" name="director"  class="w-full lg:w-64 px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
                <?php
                  try {
                      $req = selectCat();
                    } catch (Exception $e) {
                      die('Erreur : '.$e->getMessage());
                    }

                  foreach ($req as $cat) {
                ?>
                <option
                data-id-cat="<?php echo $cat['id_categorie']?>"
                value="<?php echo $cat['id_categorie'].'-'.$cat['nom_categorie']; ?>">
                  <?php echo $cat['nom_categorie']; ?>
                </option>
                <?php
                    }
                  
                ?>
              </select>
              <p onclick="addSelectCat()" class="cursor-pointer mb-1 w-full mx-auto lg:w-52 items-center flex justify-center bg-dark border-sand border-2 hover:scale-105 transition-all text-white font-medium py-2 px-4 rounded-lg">
                Ajouter une catégorie
              </p>
              <div id="conteneurCat" class="">
              </div>
            </div>
            </div>
            <div class="flex justify-center mb-8">
              <button type="submit" class="bg-sand hover:scale-105 transition-all text-white font-medium py-2 px-4 rounded-lg mr-2">Ajouter votre Film</button>
            </div>
           </form>
          
          
                  
    </div>
</div>
        <!--------------------INCLUDE FOOTER--------------------->

        <?php include ('../../content/include/footer.php');
        ?>
    </body>
</html>