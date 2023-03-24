<!DOCTYPE html>
<html lang="en" class="scroll-smooth overflow-x-hidden">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://kit.fontawesome.com/eb7aa99f8d.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />

        <script src="/cinemet/assets/js/view.js" defer></script>

        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
    </head>
    <body class="bg-darkBlue">
            <!-------------------INCLUDE NAVBAR------------------->
        <header class="h-[70vh] xl:h-[80vh] bg-[url('/cinemet/assets/img/gladiator.jpg')] w-[100vw]   md:bg-none bg-cover bg-center relative">
            <video autoplay muted loop class="hidden md:block h-[70vh] xl:h-[80vh] min-w-[100vw] object-cover object-center absolute top-0 left-0">
                <source src="../../assets/video/pexels-stefano-barbieri-5912638.mp4">
            </video>
            <?php include ('../include/navbar.html');
            ?>
        </header>
    <?php $filmName = $_SESSION['nom_film'];
    var_dump($filmName) ;
          session_destroy();
    ?>
    

        <button id="openModal" data-modal-toggle="trailerModal" data-modal-target="trailerModal" class="bg-sand w-4/5 sm:w-96  text-2xl py-2 mt-4 mb-4 mx-auto text-center text-whitePrimary block rounded-2xl md:hidden">Voir la bande annonce du film</button>

            <!-----------------TRAILER------------------->
        <section>
            <div id="trailerModal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
              <i data-modal-toggle="filmModal" class="fa-solid fa-xmark z-10 text-5xl lg:text-5xl xl:text-5xl text-whitePrimary cursor-pointer absolute right-10 top-32  sm:top-20" onclick="closeNav()"></i> 
                
              <video mute controls class="w-screen h-64 sm:h-[50vh]" id="trailer">
                </video>
            </div>
        </section>

            <!-----------------DESCRIPTION------------------->

        <section class="grid grid-rows-[auto_auto] w-11/12 mx-auto mt-8">
            <div class="grid grid-rows-[auto_auto]">
                <div class="grid grid-cols-1 grid-rows-[50px_auto] gap-4 items-baseline content-center sm:grid-cols-2 lg:grid-cols-2 lg:w-3/6 lg:mx-auto lg:gap-8">
                    <p class="col-start-1 col-end-2 sm:col-end-3 lg:col-end-3 text-center self-center text-2xl text-sand">Casting :</p>
                    <div>
                        <div class="flex justify-center">
                            <div
                              class="block w-4/5 lg:w-full rounded-lg bg-whitePrimary shadow-lg dark:bg-neutral-700">
                              <a href="#!" data-te-ripple-init data-te-ripple-color="light">
                                <img
                                  class="rounded-t-lg h-40 min-[500px]:h-52 w-full"
                                  src="../../assets/img/acteur/tom.png"
                                  alt="" />
                              </a>
                              <div class="p-4">
                                <h5
                                  class="mb-2 text-base font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                  TOM HOLLAND
                                </h5>
                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    née le 17 avril 1947.
                                </p>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <div
                              class="block  w-4/5  lg:w-full rounded-lg bg-whitePrimary shadow-lg dark:bg-neutral-700">
                              <a href="#!" data-te-ripple-init data-te-ripple-color="light">
                                <img
                                  class="rounded-t-lg h-40 min-[500px]:h-52 w-full"
                                  src="../../assets/img/acteur/chris.jpg"
                                  alt="" />
                              </a>
                              <div class="p-4">
                                <h5
                                  class="mb-2 text-base font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                  CHRIS HEMSWORTH
                                </h5>
                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    née le 17 avril 1947.
                                </p>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <div
                              class="block h-auto w-4/5  lg:w-full rounded-lg bg-whitePrimary shadow-lg dark:bg-neutral-700">
                              <a href="#!" data-te-ripple-init data-te-ripple-color="light">
                                <img
                                  class="rounded-t-lg h-40 min-[500px]:h-52 w-full"
                                  src="../../assets/img/acteur/leo.jpg"
                                  alt="" />
                              </a>
                              <div class="p-4">
                                <h5
                                  class="mb-2 text-base font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                  LEONARDO DI CAPRIO
                                </h5>
                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    née le 17 avril 1947.
                                </p>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <div
                              class="block  w-4/5 h-auto lg:w-full rounded-lg bg-whitePrimary shadow-lg dark:bg-neutral-700">
                              <a href="#!" data-te-ripple-init data-te-ripple-color="light">
                                <img
                                  class="rounded-t-lg h-40 min-[500px]:h-52 w-full"
                                  src="../../assets/img/acteur/tom.png"
                                  alt="" />
                              </a>
                              <div class="p-4">
                                <h5
                                  class="mb-2 text-base font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                  TOM HOLLAND
                                </h5>
                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    née le 17 avril 1947.
                                </p>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
                <div>
                    <p class="text-center text-2xl text-sand my-8">Réalisé par :</p>
                    <div class="flex flex-wrap justify-center">
                        <div class="flex justify-center">
                            <div
                              class="block  w-full h-auto lg:w-full rounded-lg bg-whitePrimary shadow-lg dark:bg-neutral-700">
                              <a href="#!" data-te-ripple-init data-te-ripple-color="light">
                                <img
                                  class="rounded-t-lg h-40 min-[500px]:h-52 w-full"
                                  src="../../assets/img/acteur/tom.png"
                                  alt="" />
                              </a>
                              <div class="p-4">
                                <h5
                                  class="mb-2 text-base font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                  TOM HOLLAND
                                </h5>
                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    Le film est sorti le 19 juillet 2047.
                                </p>
                              </div>
                            </div>
                          </div>
                        <div class="my-4 ml-4">
                            <p class="text-center text-2xl mb-2 text-sand w-full">Avis du public :</p>
                            <div class="text-center">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                                <i class="fa-solid fa-star text-yellow-400"></i>
                                <i class="fa-solid fa-star text-yellow-400"></i>
                                <i class="fa-solid fa-star text-yellow-400"></i>
                                <i class="fa-solid fa-star text-black"></i>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="mt-8 lg:w-1/2 lg:mx-auto my-8">
                <p class="text-center text-2xl text-sand mb-2 mb-8">Synopsis :</p>
                <p class="text-justify text-whitePrimary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed magna non libero finibus semper nec nec est. Etiam non interdum est. Sed sodales nisi quis dui tempus venenatis. Quisque efficitur lacus a viverra commodo. Ut tincidunt eget tellus nec gravida. Phasellus vitae purus in nisi ornare eleifend quis et sem. Vivamus blandit luctus dolor. Nunc sit amet feugiat felis. Donec sit amet metus id massa egestas dignissim. Proin sed erat eget dui posuere dictum vitae vel metus. Sed suscipit neque quis nunc suscipit hendrerit. Donec quis mi non nibh rutrum dapibus. Aliquam vehicula purus in ultricies maximus.
                    Suspendisse aliquam commodo lobortis. Pellentesque non ipsum nec risus fermentum tincidunt.</p>
            </div>
        </section>

            <!-----------------FILM------------------->

        <button id="openModal" data-modal-toggle="filmModal" data-modal-target="filmModal" class="bg-sand w-4/5 sm:w-96  text-2xl py-2 mt-4 mb-4 mx-auto text-center text-whitePrimary block rounded-2xl">Voir le film</button>

        <!-----------------TRAILER------------------->
        <section class="relative">

            <div id="filmModal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <i data-modal-toggle="filmModal" class="fa-solid fa-xmark z-10 text-5xl lg:text-5xl xl:text-5xl text-sand cursor-pointer absolute right-10 top-5" onclick="closeNav()"></i>
                
                <iframe class="w-screen h-[50vh] md:h-[80vh]" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </section>

         <!-------------------INCLUDE FOOTER------------------->

         <?php include ('../include/footer.php');
         ?>

    </body>
</html>