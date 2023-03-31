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
        <script src="/cinemet/assets/js/favori.js" defer></script>

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
            <form action="../../admin/filter/search.php" method="POST" class="flex justify-center items-center">
                <input name="search" type="text" placeholder="Search Bar" class="ml-2 bg-dark hover:bg-whitePrimary hover:placeholder:text-dark focus:bg-whitePrimary text-whitePrimary focus:text-dark w-5/6 text-center placeholder:text-whitePrimary">
                <button name="submit"><i class="fa-solid fa-magnifying-glass ml-4 text-2xl xl:text-3xl text-dark"></i></button>
            </form>
        </div>


        <!-------------------SEARCH BY TYPE/ACTOR------------------->
        <section >
            <form action="../../admin/filter/filter.php" method="POST" class="grid grid-rows-3 w-4/6 mx-auto lg:grid-rows-2 lg:grid-cols-3 lg:w-11/12 lg:mx-auto gap-4 justify-center mt-4 xl:mb-16">
                <div class="flex justify-between items-center border-2 border-sand p-4 rounded-2xl">
                    <p class="text-whitePrimary text-2xl mr-2">Type de film</p>
                    <select placeholder="Votre categorie" id="monSelectCat" name="category"  class="text-center bg-whitePrimary text-xl">
                    <option selected="selected" value="">Choisir</option>
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
                    value="<?php echo $cat['nom_categorie']; ?>">
                      <?php echo $cat['nom_categorie']; ?>
                    </option>
                    <?php
                        }
                
                    ?>
                  </select>
                </div>
                
                <div class="flex justify-between items-center border-2 border-sand p-4 rounded-2xl">
                    <p class="text-whitePrimary text-2xl mr-2">Pays d'origine</p>
                    <select id="monSelectReal" name="country"  class="text-center bg-whitePrimary text-xl">
                        <option selected="selected" value="">Choisir</option>
                        <?php
                            try {
                                $req = selectCountry();
                              } catch (Exception $e) {
                                die('Erreur : '.$e->getMessage());
                              }
                            foreach ($req as $req) {
                          ?>
                          <option
                          data-id-real="<?php echo $req?>"
                          value="<?php echo $req;?>"> 
                            <?php echo $req; ?>
                          </option>
                          <?php   ;
                              }
                          
                        ?>  
                    </select>
                </div>
                <div class="flex justify-between items-center border-2 border-sand p-4 rounded-2xl">
                    <p class="text-whitePrimary text-2xl mr-2">Acteurs connus</p>
                    <select id="monSelectActor" name="actor"  class="text-center bg-whitePrimary text-xl">
                    <option selected="selected" value="">Choisir</option>
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
                    value="<?php echo $actor['nom_acteur']; ?>">
                      <?php echo $actor['prenom_acteur'] ." ". $actor['nom_acteur']; ?>
                    </option>
                    <?php
                          }
                    ?>
                    </select>
                </div>
                <button type="submit" class="bg-sand w-4/5 sm:w-80 col-start-1 col-end-4 text-2xl py-2 mt-4 mb-4 mx-auto text-center text-whitePrimary block rounded-2xl">
                    Filtrer
                </button>
            </form>
            
        </section>

        <!-------------------CARDS------------------->
        <section class="grid gap-16 md:grid-cols-2 mt-8 mb-8 w-11/12 mx-auto">
                <?php 
                   if(isset($_SESSION['result'])) {
                    $results = $_SESSION['result'];
                   }
                   if(isset($_SESSION['filter'])) {
                    $results = $_SESSION['filter'];
                   }
                    try {
                        if (isset($_GET['page'])) {
                        $i = $_GET['page'];
                    } else {
                        $i = 1;
                    }
                    } catch (Exception $e) {
                        die('Erreur : '.$e->getMessage());
                    }
                        $records_per_page = 3; 
                        $current_page = $i; 
                                    
                        $offset = ($current_page - 1) * $records_per_page; 
 
                    //CHOISI LES ID FILMS, SOIT TOUT SOIT EN FONCTION DE LA RECHERCHE
                    if (isset($results) && !empty($results)) {
                        $idFilm = $results;

                        $countAllFilm = $idFilm;
                        $records_per_page = 3;
                    } else {         
                        $countAllFilm = GetIdFilm();
                        $idFilm = Get4IdFilm($records_per_page, $offset);
                    }
             
                    foreach ($idFilm as $id_film) {
                        $film = showAllFilm($id_film); 
                        $total_records = count($countAllFilm);

                        $total_pages = ceil($total_records / $records_per_page); 

                ?>
                <?php echo "<a href='film.php?id=".$film['id_film']."'>"; ?>
                    <div class="relative hover:border-2 border-[double_dashed] border-sand hover:scale-105 transition-all duration-500">
                        
                        <img 
                            src="../../upload/affiche/<?php echo $film['affiche_film'];?>"
                            class="aspect-[16/9] w-full h-auto object-cover">
                        <div class="absolute top-2 right-3">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-whitePrimary"></i>
                        </div>
                        <?php if(isset($_SESSION['session'])) {?>
                        <button id="<?=$film['id_film']?>" class="add_favori absolute bottom-2 z-50 right-3 text-3xl hover:text-sand hover:scale-105 translate-y-0 transition-all">
                            <i class="fa-solid fa-heart z-50 before:pointer-events-auto"></i>
                        </button>
                        <?php 
                        }
                        ?>
                        <div class="absolute left-3 bottom-4 text-whitePrimary">
                            <p class="text-3xl uppercase"><?php echo mb_strimwidth($film['nom_film'], 0, 25, "..."); ?></p>
                            <p class="text-md italic"><?php echo $film['sortie_film'] ?></p>
                        </div>
                    </div>
                </a><?php
                    }
                ?>
                
        </section>

        

        <section class="w-full flex justify-center mt-4 mb-4 xl:mb-16">
            <ul class="inline-flex space-x-2">
                    
                <li>
                    <?php if ($current_page > 1) {
                    ?>
                    <a href="?page=<?=$current_page-1?>" class="flex items-center justify-center w-10 h-10 text-sand transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-indigo-100">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd">     
                            </path>
                        </svg>
                    </a>
                    <?php
                    } 
                    ?>
                </li>
                <?php

                    for ($i = 1; $i <= $total_pages; $i++) {
                ?>

  
                    <li>
                        <a href="?page=<?=$i?>" 
                        class="text-sand items-center
                        <?php

                            if ($current_page == $i) {                   
                        ?>
                         bg-dark 
                        <?php
                            } 
                        ?>
                         justify-center transition-colors flex w-10 h-10 duration-150 rounded-full focus:shadow-outline hover:bg-dark">
                        <?=$i?>
                        </a>
                    </li>
                <?php 
                }
                ?>

                <li>
                    <?php if ($current_page < $total_pages) {
                    ?>
                    <a href="?page=<?=$current_page+1?>"  class="flex items-center justify-center w-10 h-10 text-sand transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-indigo-100">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd">
                            </path>
                        </svg>
                    </a>
                    <?php
                    }
                    ?>
                </li>
              </ul>
              
                
        </section>


        

            <!-------------------INCLUDE FOOTER------------------->
        <?php include ('../include\footer.php');
        ?>    
    <body>