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

        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
        
    </head>
    <body class="bg-darkBlue h-screen">

        <!--------------------INCLUDE NAVBAR--------------------->

        <header>
          <?php include('../../content/include/navbar.html'); ?>
        </header>
        <form action="../../admin/add_Category.php" class="form-container" method="POST" onsubmit="submit()">

          <div class="bg-opacity-50 py-8 relative mt-24 h-[70vh] grid items-center w-11/12 mx-auto bg-darkBlue border-2  border-sand shadow-md  shadow-whitePrimary rounded-lg max-w-2xl mb-8" id="popup-Form">
              <h3 class="text-4xl text-whitePrimary underline decoration-sand italic font-bold text-center">Ajouter une catégorie</h3>

            <div class="tab bg-darkBlue rounded-lg gap-32 items-center grid shadow-lg p-4 px-6">
                <div>
                    <div class="mb-4">
                      <label for="email" class="block text-whitePrimary font-medium mb-2 text-2xl text-center">Ajoutez votre nouvelle catégorie</label>
                      <input type="mail" placeholder="Votre Category" name="name"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:shadow-outline-blue">
            </div>
            <div class="mb-4 grid justify-center items-start">
            <label for="psw" class="block text-whitePrimary font-medium mb-2 text-2xl text-center">Categories existantes</label>
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
              data-id-real="<?php echo $cat['id_categorie']?>"
              value="<?php echo $cat['id_categorie'].'-'.$cat['nom_categorie']; ?>">
                <?php echo $cat['nom_categorie']; ?>
              </option>
              <?php
                  }
          
              ?>
            </select>
          
                      </div>
                     <div class="flex justify-center mb-8">
                       <button type="submit" class="bg-sand hover:scale-105 transition-all text-white font-medium py-2 px-4 rounded-lg mr-2">Ajouter</button>
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