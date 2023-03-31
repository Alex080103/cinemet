<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth overflow-x-hidden">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="assets/img/bandeFilm.png"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://kit.fontawesome.com/eb7aa99f8d.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
        <script src="assets/js/texte.js" defer></script>
        <script src="assets/js/scrollReveal.js" defer></script>



        <script src="/cinemet/assets/js/navbar.js" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        
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
      <title>Accueil</title>
    </head>
    <body class="overflow-x-hidden w-screen">

            <!-------------------INCLUDE NAVBAR------------------->
        <header class="h-[70vh] bg-[url('assets/img/photoIndexBlack3.jpg')] lg:bg-[url('assets/img/photoIndexBlack2.jpg')] bg-cover bg-fixed bg-bottom relative lg:h-[80vh]">
            
                
          <nav class="relative z-50 top-4" id="nav">
            <div class="w-5/6 grid grid-cols-2 mx-auto items-center">
                <div>
                    <a href="#"><img src="assets/img/logoBlanc.png" class="w-32 lg:w-44 xl:w-52 justify-self-start cursor-pointer"></a>
                </div>
                <div class="justify-self-end items-center flex">
                  <?php if(isset($_SESSION['session'])) {?>
                    <p class="text-whitePrimary uppercase mr-4 text-2xl invisible sm:flex sm:visible items-center">Bonjour <?php echo ($_SESSION['prenom']);?><span class=" text-sm absolute right-[16%] sm:static top-5 text-green-400 visible ml-2 animate-pulse"><i class="fa-solid fa-circle"></i></span></p>
                  <?php 
                  }
                  ?>
                    <i class="fa-solid fa-bars z-10 text-2xl lg:text-3xl xl:text-5xl text-whitePrimary cursor-pointer hamburger relative" onclick="openNav()"></i>
                    <i class="fa-solid fa-xmark z-10 text-2xl lg:text-3xl xl:text-5xl text-whitePrimary cursor-pointer hidden cross relative" onclick="closeNav()"></i>
                </div>
            </div>
            <div>
                <ul class="bg-darkBlue border-b-2 border-sand absolute -top-4 w-full z-0 hidden displayNav lg:hidden lg:h-[75vh] lg:justify-around">
                    <li class="justify-center items-center flex text-2xl py-10 lg:text-4xl">
                      <a href="#"><i class="fa-solid fa-film text-sand mr-3"></i></a>
                      <p class="text-whitePrimary">
                        <a href="content/page/catalogue.php">Notre catalogue</a>
                      </p>
                    </li>
                    <li class="justify-center items-center flex text-2xl py-10 lg:text-4xl">
                        <i class="fa-solid fa-clapperboard text-sand mr-3"></i>
                        <p class="text-whitePrimary">
                          <?php if(isset($_SESSION['session'])) {?>
                            <a href="content/page/profil.php">Votre compte</a>
                          <?php 
                          } else { ?>
                            <a href="content/page/connect.php">Connexion/Inscription</a>
                          <?php 
                          };
                          ?>
                        </p>
                    </li>
                    <li class="justify-center items-center flex text-2xl py-10 lg:text-4xl">
                      <i class="fa-solid fa-envelope text-sand mr-3"></i>
                      <p class="text-whitePrimary"> 
                        <a href="content/page/contact.php">Nous contacter</a>
                      </p>
                    </li>
                    <?php if(isset($_SESSION['session'])) {?>
                      <li class="justify-center items-center flex text-2xl py-10 lg:text-4xl">
                        <p class="text-sand"> 
                          <a href="admin/logout.php">Se déconnecter</a>
                        </p>
                      </li>
                    <?php 
                    };
                    ?>
                </ul> 
            </div>
          </nav>
        
        
                <p class="ml3 text-sand absolute top-[40%] w-screen text-center text-4xl md:text-5xl md:top-[40%] lg:text-6xl xl:top-[35%]">Redécouvrez le cinéma<br> en toute simplicité</p>
                  <?php if(!isset($_SESSION['session'])) {?>
                    <a href="content/page/connect.php">
                      <div class="hidden md:block">
                        <p class="text-whitePrimary absolute xl:right-24 right-16 bottom-32 text-lg animate-pulse">Connectez-vous</p>
                        <img class="text-whitePrimary absolute xl:right-32 right-24  bottom-10 w-[60px] h-[90px] animate-pulse" src="/cinemet/assets/img/bucket.png">
                      </div>
                    </a>
                  <?php
                  }
                  ?>

                  <?php if(isset($_SESSION['session'])) {?>
                    <a href="admin/logout.php">
                      <div class="hidden md:block">
                        <p class="text-whitePrimary absolute xl:right-24 right-16 bottom-32 text-lg animate-pulse">Se déconnecter</p>
                        <img class="text-whitePrimary absolute xl:right-32 right-24 bottom-10 w-[60px] h-[90px] animate-pulse" src="/cinemet/assets/img/bucket.png">
                      </div>
                    </a>
                  <?php
                  }
                  ?>
        </header>

            <!-------------------FILMS A L AFFICHE------------------->

        
        <div class="bg-darkBlue bg-fixed pb-8 bg-center bg-cover">
          <a href="content/page/crud.php" class="text-sand mx-auto bg-dark text-center">PAGE ADMIN</a>


          <h3 class="text-whitePrimary w-4/5 text-2xl pt-8 pb-8 mx-auto text-center md:text-3xl lg:text-4xl xl:w-3/5 lg:pt-16 title">Retrouvez les meilleurs films du moment</h3>
          
            <!-------------------BACK TO TOP------------------->

          <a href="#nav" class="md:hidden fixed top-[92%] left-[85%] bg-sand w-10 flex justify-center py-3 mr-0 z-50 animate-bounce opacity-80 rounded-2xl">
              <i class="fa-solid fa-arrow-up text-whitePrimary text-center"></i>
          </a>

            <!-------------------SLIDER VIDEO HIDE ON MOBILE------------------->
            <section class="mb-8 lg:w-10/12 lg:mx-auto lg:mb-16 ">
                <div id="default-carousel" class="relative" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-[40vh] w-[98%] mx-auto overflow-hidden rounded-lg right-0 md:h-96 lg:h-[70vh] xl:h-[75vh]">
                         <!-- Item 1 -->
                        <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                                <img src="assets/img/afficheMini1.jpg" class="absolute block md:grid md:grid-cols-2 items-center  h-full w-full xl:w-10/12 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-3000 ease-in-out" data-carousel-item>
                            <img src="assets/img/afficheMini2.png" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 xl:w-10/12" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-3000 ease-in-out" data-carousel-item>
                            <img src="assets/img/afficheMini3.jpg" class="absolute block w-full  h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 xl:w-10/12" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-3000 ease-in-out" data-carousel-item>
                            <img src="assets/img/afficheMini4.jpg" class="absolute block w-full  h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 xl:w-10/12" alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-3000 ease-in-out" data-carousel-item>
                            <img src="assets/img/affichemini2.png" class="absolute block w-full  h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 xl:w-10/12" alt="...">
                        </div>
                    </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand group-hover:bg-sand dark:group-hover:bg-sand group-focus:ring-sand dark:group-focus:ring-sand">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand dark:bg-whitePrimary group-hover:bg-sand dark:group-hover:bg-sand group-focus:ring-4 group-focus:ring-sand dark:group-focus:ring-sand group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
                </div>
            </section>
        </div>
        
               <!-------------------CARDS------------------->
    <div class="bg-dark pb-8 border-sand border-t-2 border-b-2 border-dotted">
        <section class="grid grid-rows-3 lg:grid-rows-1 lg:grid-cols-3 lg:items-baseline lg:w-10/12 lg:mx-auto lg:py-32">
          <div class="w-5/6 mx-auto">
            <img src="assets/img/clapFilm.png" class="h-[150px] md:h-[200px] md:w-auto mx-auto pt-8">
            <h4 class="text-center font-semibold text-whitePrimary text-3xl pt-4 pb-4">Un divertissement sans fin</h4>
            <p class="text-center text-lg text-whitePrimary">Découvrez des milliers d'heures de séries, films et productions originales.</p>
          </div>
          <div class="w-5/6 mx-auto">
            <img src="assets/img/bandeFilm.png" class="h-[150px] md:h-[200px] md:w-auto mx-auto pt-8">
            <h4 class="text-center font-semibold text-whitePrimary text-3xl pt-4 pb-4">Une variété sans précédent</h4>
            <p class="text-center text-lg text-whitePrimary">Retrouvez tout les styles que vous aimez, du cinéma traditionnel au film d'animation.</p>
          </div>
          <div class="w-5/6 mx-auto">
            <img src="assets/img/phone.png" class="h-[150px] mx-auto md:h-[200px] md:w-auto pt-8">
            <h4 class="text-center font-semibold text-whitePrimary text-3xl pt-4 pb-4">Une intéractivité hors du commun</h4>
            <p class="text-center text-lg text-whitePrimary">Disponible sur tout vos supports, quand vous voulez.</p>
          </div>    
        </section>
    </div>

        <div class="bg-darkBlue">
            <h3 class="text-whitePrimary w-4/5 text-2xl pt-8 pb-8 mx-auto text-center md:text-3xl lg:text-4xl title">Découvrez notre sélection de films au hasard</h3>
                 <!-------------------SLIDER POSTER------------------->
            <section class="lg:w-11/12 lg:mx-auto">
                    <div id="default-carousel" class="relative" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-[40vh] w-[98%] mx-auto overflow-hidden rounded-lg right-0  md:h-72 lg:h-96">
                             <!-- Item 1 -->
                            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2  items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                        <img src="assets/img/afficheMini1.jpg" class="h-full mx-auto">
                                        <img src="assets/img/afficheMini4.jpg" class="hidden md:block h-full">
                                    </div>
                            </div>
                            <!-- Item 2 -->
                            <div class="hidden duration-3000 ease-in-out" data-carousel-item>
                                <div class="absolute block md:gap-2 md:grid md:grid-cols-2 items-center h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <img src="assets/img/afficheMini2.png" class="h-full mx-auto">
                                    <img src="assets/img/afficheMini3.jpg" class="hidden md:block h-full">
                                </div>
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-3000 ease-in-out" data-carousel-item>
                                <div class="absolute block md:gap-2 md:grid md:grid-cols-2 items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <img src="assets/img/afficheMini1.jpg" class="h-full mx-auto">
                                    <img src="assets/img/afficheMini3.jpg" class="hidden md:block h-full">
                                </div>
                            </div>
                            <!-- Item 4 -->
                            <div class="hidden duration-3000 ease-in-out" data-carousel-item>
                                <div class="absolute block md:gap-2 md:grid md:grid-cols-2 items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <img src="assets/img/afficheMini2.png" class="h-full mx-auto">
                                    <img src="assets/img/afficheMini4.jpg" class="hidden md:block h-full">
                                </div>
                            </div>
                            <!-- Item 5 -->
                            <div class="hidden duration-3000 ease-in-out" data-carousel-item>
                                <div class="absolute block md:gap-2 md:grid md:grid-cols-2 items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <img src="assets/img/afficheMini1.jpg" class="h-full mx-auto">
                                    <img src="assets/img/afficheMini3.jpg" class="hidden md:block h-full">
                                </div>
                            </div>
                        </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="5"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="6"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="7"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="8"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="9"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand group-hover:bg-sand dark:group-hover:bg-sand group-focus:ring-sand dark:group-focus:ring-sand">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand dark:bg-whitePrimary group-hover:bg-sand dark:group-hover:bg-sand group-focus:ring-4 group-focus:ring-sand dark:group-focus:ring-sand group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
                </div>
            </section>
                <!-------------------CALL TO ACTION------------------->
            <div class="pb-8 lg:pb-16">
            <p class="text-xl pt-4 pb-2 text-whitePrimary w-4/5 mx-auto text-center">Ou recherchez votre bonheur parmi notre</p>
            <a href="content/page/catalogue.php">
              <button
                  data-te-ripple-color="light" class="bg-sand text-darkBlue hover:scale-105 transition-all text-2xl px-3 py-2 mx-auto text-center block rounded-2xl md:text-3xl">
                  Bibliothèque
              </button>
            </a>
            </div>
        </div>

        <!-------------------INCLUDE FOOTER------------------->

        <?php include('content/include/footer.php') ?>

        


        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    </body>
</html>