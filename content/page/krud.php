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
        <script>
            tailwind.config = {
              darkMode: "class",
              theme: {
                extend: {
                  colors: {
                    'sand' : '#C82626',
                    'whitePrimary': '#FAF9FF',
                  }
                }
              }
            }
          </script>
    </head>
    <body class="bg-sand h-screen">

        <!--------------------INCLUDE NAVBAR--------------------->

        <header>
        <?php include('../include/navbarWhite.html'); ?>
        </header>

        <!--------------------KRUD--------------------->

        <h2 class="text-3xl text-whitePrimary text-center underline pt-8">Page Administrateur</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 w-4/5 mx-auto  pt-4">
          <div class="grid grid-rows-4 gap-4 flex items-center">
            <h3 class="text-2xl text-whitePrimary text-center">Gérer les films</h3>
            <button class="bg-whitePrimary text-sand text-2xl w-4/5 px-3 py-1 mx-auto text-center block rounded-2xl">Ajouter un Film</button>
            <button class="bg-whitePrimary text-sand text-2xl w-4/5 px-3 py-1 mx-auto text-center block rounded-2xl">Modifier un film</button>
            <button class="bg-whitePrimary text-sand text-2xl w-4/5 px-3 py-1 mx-auto text-center block rounded-2xl">Supprimer un film</button>
          </div>
          <div class="grid grid-rows-4 gap-4 flex items-center pt-8 pb-8">
            <h3 class="text-2xl text-whitePrimary text-center">Gérer les utilisateurs</h3>
            <button class="bg-whitePrimary text-sand text-2xl w-11/12 px-3 py-1 mx-auto text-center block rounded-2xl">Ajouter un utilisateur</button>
            <button class="bg-whitePrimary text-sand text-2xl w-11/12 px-3 py-1 mx-auto text-center block rounded-2xl">Modifier un utilisateur</button>
            <button class="bg-whitePrimary text-sand text-2xl w-11/12 px-3 py-1 mx-auto text-center block rounded-2xl">Supprimer un utilisateur</button>
          </div>
        </div>

        <!--------------------INCLUDE FOOTER--------------------->

        <?php include ('../include/footerWhite.php');
        ?>
    </body>
</html>