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
    </head>
    <body class="bg-darkBlue">

        <!--------------------INCLUDE NAVBAR--------------------->

        <header class="">
            <?php include('../include/navbar.html'); ?>
        </header>

        <!-------------------------PROFIL------------------------------>

        <section class="grid grid-cols-1 md:grid-cols-2 pt-8 pb-8 lg:w-3/4 lg:mx-auto xl:2/3">
            <div class="shadow-xl rounded-2xl border-2 py-4 w-11/12 md:w-96 mx-auto">
                <img src="../../assets/img/bucket.png" class="h-[150px] mx-auto mb-4" alt="un bucket de popcorn">
                <div class="grid grid-cols-1 gap-4 grid-rows-3 w-5/6 mx-auto text-center items-end">
                    <p class="text-sand italic text-2xl">Nom :</p>
                    <p class="text-xl text-whitePrimary">Gérard MACHIN</p>
                    <p class="text-sand italic text-2xl">Mail :</p>
                    <p class="text-xl text-whitePrimary">Gérardmachin@gmail.com</p>
                    <p class="text-sand italic text-2xl">Adresse :</p>
                    <p class="text-xl text-whitePrimary">3 rue Lorem ipsum</p>
                </div>
            </div>
            <div class="grid items-center flex-wrap justify-center">
                <p class="text-sand underline text-center text-2xl my-4">Modifiez votre mail</p>
                <p class="text-sand underline text-center text-2xl my-4">Modifiez votre mot de passe</p>
                <p class="text-sand underline text-center text-2xl my-4">Modifiez votre adresse</p>

            </div>
        </section>




        <!--------------------INCLUDE FOOTER--------------------->

        <?php include ('../include/footer.php');
        ?>
    </body>
</html>