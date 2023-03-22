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
    <body class="bg-darkBlue h-full">
        <header>
                  <?php include('../include/navbar.html'); ?>
        </header>

        <h4 class="text-5xl text-white text-center mt-8">Contact</h4>
    <section class="px-4 py-2 sm:w-[500px] mx-auto">
        <form action="../../admin/contact.php" method="POST" class="bg-darkBlue border-2 border-sand shadow-md shadow-whitePrimary rounded-lg shadow-md  px-8 pt-6 pb-8 mb-4">
          <div class="mb-4">
            <label class="block text-sand font-bold mb-2" for="name">
              Votre Nom/Prénom :
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-sand leading-tight focus:outline-none focus:shadow-outline" 
                   id="name" 
                   type="text" 
                   placeholder="Nom/Prénom"
                   name="name"
                   required>
          </div>
          <div class="mb-4">
            <label class="block text-sand font-bold mb-2" for="email">
              Votre email :
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-sand leading-tight focus:outline-none focus:shadow-outline" 
                   id="email" 
                   type="email" 
                   placeholder="Email"
                   name="email"
                   required>
          </div>
          <div class="mb-6">
            <label class="block text-sand font-bold mb-2" for="comments">
              Votre message :
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-sand leading-tight focus:outline-none focus:shadow-outline" 
                      id="comments" 
                      placeholder="Votre message"
                      name="message"
                      required>
            </textarea>
          </div>
          <div class="flex items-center justify-center">
            <button name="submit" class="bg-sand hover:scale-105 transition-all text-white hover:scale-105 font-bold py-2 px-4 rounded-2xl focus:outline-none focus:shadow-outline" type="submit">
              Envoyer
            </button>
          </div>
        </form>
    </section>


        <!-------------------INCLUDE FOOTER------------------->

        <?php include ('../include/footer.php');
        ?>

    </body>