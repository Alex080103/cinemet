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
        <script src="/cinemet/assets/js/slider.js" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
        <script>
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              colors: {
                'sand' : '#FFD500 ',
                'whitePrimary': '#FDF6E3',
                'darkBlue' : '#081929',
                'dark': '#05090E',
              }
    
            }
          }
        }
      </script>
    </head>
    <body class="bg-darkBlue">
        <!-------------------NAVBAR------------------->
        <header class="">
            <?php include('../include/navbar.html') ?>
        </header>
        <!-------------------SEARCH BAR------------------->
        <div class="bg-sand w-3/5 mx-auto  text-whitePrimary mt-8 xl:mt-16 xl:mb-16 py-2 rounded-2xl">
            <form action="../../admin/search.php" class="flex justify-center items-center">
                <input name="search" type="text" placeholder="Search Bar" class="ml-2 bg-dark hover:bg-whitePrimary hover:placeholder:text-dark focus:bg-whitePrimary text-dark w-5/6 text-center placeholder:text-whitePrimary">
                <button name="submit"><i class="fa-solid fa-magnifying-glass ml-4 text-2xl xl:text-3xl text-dark"></i></button>
            </form>
        </div>


        <!-------------------SEARCH BY TYPE/ACTOR------------------->
        <section class="grid grid-rows-3 w-4/6 mx-auto lg:grid-rows-1 lg:grid-cols-3 lg:w-11/12 lg:mx-auto gap-4 justify-center mt-4 xl:mb-16">
            <div class="flex justify-between items-center border-2 border-sand p-4 rounded-2xl">
                <p class="text-whitePrimary text-2xl mr-2">Type de film</p>
                <select name="type de film" class="text-center bg-whitePrimary text-xl">
                    <option>Action</option>
                    <option>Romance</option>
                    <option>Animation</option>
                    <option>Policier</option>
                </select>
            </div>
            <div class="flex justify-between items-center border-2 border-sand p-4 rounded-2xl">
                <p class="text-whitePrimary text-2xl mr-2">Pays d'origine</p>
                <select name="type de film" class="text-center bg-whitePrimary text-xl">
                    <option>France</option>
                    <option>Etats-Unis</option>
                    <option>Japon</option>
                    <option>Inde</option>
                </select>
            </div>
            <div class="flex justify-between items-center border-2 border-sand p-4 rounded-2xl">
                <p class="text-whitePrimary text-2xl mr-2">Acteurs connus</p>
                <select name="type de film" class="text-center bg-whitePrimary text-lg">
                    <option>Tom Cruise</option>
                    <option>Christian Clavier</option>
                    <option>Brad Pitt</option>
                    <option>Gerard Jugnot</option>
                </select>
            </div>
        </section>

        <!-------------------CARDS------------------->
        <section class="grid gap-16 md:grid-cols-2 mt-8 mb-8 w-11/12 mx-auto">
                <?php 
                    try {
                        $idFilm = GetIdFilm();
                         
                    //END FOREACH
                    } catch (Exception $e) {
                        die('Erreur : '.$e->getMessage());
                    }
                    foreach ($idFilm as $id_film) {
                        $film = showAllFilm($id_film); 

                ?>
                <?php echo "<a href='film.php?id=".$film['id_film']."'>"; ?>
                    <form action="film.php" method="GET">
                        <input type="text" name="session" class="hidden" value="<?php $_SESSION['nom_film'] = $film['nom_film']?>">
                        <button type="submit"></button>
                    </form>
                    <div class="relative hover:border-2 border-[double_dashed] border-sand hover:scale-110 transition-all duration-500">
                        
                            <img 
                          src="../../upload/affiche/<?php echo $film['affiche_film'];?>"
                        >
                        <div class="absolute top-2 right-3">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-whitePrimary"></i>
                        </div>
                        <div class="absolute left-3 bottom-4 text-whitePrimary">
                            <p class="text-3xl uppercase"><?php echo $film['nom_film'] ?></p>
                            <p class="text-md italic"><?php echo $film['sortie_film'] ?></p>
                        </div>
                    </div>
                </a>
                <?php
                    }
                ?>
                
        </section>

        <section class="w-full flex justify-center mt-4 mb-4 xl:mb-16">
            <ul class="inline-flex space-x-2">
                <li><button class="flex items-center justify-center w-10 h-10 text-sand transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-indigo-100">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg></button>
                </li>
                <li><button class="w-10 h-10 text-sand transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-indigo-100">1</button></li>
                <li><button class="w-10 h-10 text-sand transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-indigo-100">2</button></li>
                <li><button class="w-10 h-10 text-white transition-colors duration-150 bg-sand border border-r-0 border-sand rounded-full focus:shadow-outline">3</button></li>
                <li><button class="flex items-center justify-center w-10 h-10 text-sand transition-colors duration-150 bg-white rounded-full focus:shadow-outline hover:bg-indigo-100">
                  <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg></button>
                </li>
              </ul>
        </section>

            <!-------------------INCLUDE FOOTER------------------->
        <?php include ('../include\footer.php');
        ?>    
    <body>