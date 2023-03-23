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

        <script src="/cinemet/assets/js/navbar.js" defer></script>

        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
        
  </head>
  <body class="bg-darkBlue h-screen">

      <!--------------------INCLUDE NAVBAR--------------------->

    <header>
      <?php include('../../content/include/navbar.html'); ?>
    </header>
    <form action="../../admin/add_Film.php" class="form-container" method="POST" onsubmit="submit()">

      <div class="bg-darkBlue border-2 border-sand shadow-md  shadow-whitePrimary rounded-lg max-w-5xl  mx-auto relative w-11/12 mb-8 mt-16" id="popup-Form">
        
        <div class="tab bg-darkBlue rounded-lg grid-cols-2 gap-32 items-center grid shadow-lg p-4 px-6">
          <div>
            <div class="mb-4">
              <label for="email" class="block text-whitePrimary font-medium mb-2 text-2xl">Nom du film</label>
              <input type="mail" placeholder="Votre E-mail" name="name"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
            </div>
            <div class="mb-4">
              <label for="email" class="block text-whitePrimary font-medium mb-2 text-2xl">Date de sortie du film</label>
              <input type="mail" placeholder="Votre E-mail" name="date"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
            </div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Pays d'origine du film</label>
              <input type="password" placeholder="Votre mot de passe" name="country"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
            </div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Synopsis du film</label>
              <input type="text" placeholder="Votre prénom" name="synopsis"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
            </div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Acteurs</label>
              <select id="monSelectActor" placeholder="Votre adresse" name="director"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">          

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
                <?php echo $actor['nom_acteur']; ?>
              </option>
              <?php    
                    }
              ?>
              </select>
              <p onclick="addSelectActor()" class="cursor-pointer w-1/2 bg-sand hover:scale-105 transition-all text-white font-medium py-2 px-4 rounded-lg mr-2">
                Ajouter un acteur
              </p>
              <div id="conteneurActor">
              </div>
            </div>
          </div>
          <div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Realisateur</label>
              <select placeholder="Votre adresse" id="monSelectReal" name="director"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">          
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
              <p onclick="addSelectReal()" class="cursor-pointer w-1/2 bg-sand hover:scale-105 transition-all text-white font-medium py-2 px-4 rounded-lg mr-2">
                Ajouter un acteur
              </p>
              <div id="conteneurReal">
              </div>
            </div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Catégories</label>
              <input type="text" placeholder="Votre adresse" name="category"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
            </div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Votre affiche:</label>
              <input type="file" name="poster"placeholder="image"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue placeholder:text-white" />
            </div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Une image de votre film:</label>
              <input type="file" name="image" placeholder="image"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue placeholder:text-white" />
            </div>
            <div class="mb-4">
              <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl">Le lien de votre trailer:</label>
              <input type="file" name="trailer" placeholder="image"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue placeholder:text-white" />
            </div>
          </div>
          </div>
             <div class="flex justify-center mb-8">
               <button type="submit" class="bg-sand hover:scale-105 transition-all text-white font-medium py-2 px-4 rounded-lg mr-2">Ajouter</button>
             </div>
           </form>
          
          
                  
    </div>
</div>
        <!--------------------INCLUDE FOOTER--------------------->

        <?php include ('../../content/include/footer.php');
        ?>
    </body>
</html>