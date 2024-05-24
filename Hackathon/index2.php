<!DOCTYPE html>
<html class="relative min-h-full h-full scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/custom.css">
    <style>
        /* Apply smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-bg min-h-full h-full dark:bg-black">
    <?php include_once("./php/connect.php") ?>


    <?php include './components/topnav-landingpage.php'; ?>
    <?php
    $query_stats = "
            SELECT
                (SELECT count(email) FROM Laureat WHERE valide = 1) AS nb_laureats,
                (SELECT count(identifiant) FROM Souvenir) AS nb_souvenirs,
                (SELECT count(avis_id) FROM Avis) AS nb_avis
    ";
    $pdostmt2 = $db->prepare($query_stats);
    $pdostmt2->execute();
    $stats = $pdostmt2->fetch(PDO::FETCH_ASSOC);
    ?>
<div class="bg-gray-100">
    <section class="w-auto h-screen overflow-hidden relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:left-0 before:z-10 before:opacity-30 bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 dark:bg-gray-800 mb-4">
        <img src="asset/images/background.jpg" class="absolute top-0 left-0 right-0 min-h-full object-cover z-0" alt="Background Image">
        <div class="absolute inset-0 flex items-center justify-center z-20">
            <div class="py-8 px-4 mx-auto text-center max-w-full lg:py-16 lg:px-12 z-50">
                <a href="#" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700" role="alert">
                    <span class="text-xs bg-green-500 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span class="text-sm font-medium">HACKATHON 2024</span> 
                    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </a>
                <h1 class="mb-4 text-4xl font-extrabold leading-none text-white md:text-5xl lg:text-6xl dark:text-white tracking-widest">COPAINS D'AVANT</h1>
                <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Rassembler les diplômés de l'OFPPT pour partager souvenirs, expériences et parcours professionnels.</p>
                <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                    <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                        Registre
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-gray-300 hover:text-black hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Se connecter
                    </a>  
                </div>
            </div>
        </div>
    </section>
<div class="p-8 w-full">
    <section class="data-twe-smooth-scroll-init bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 dark:bg-gray-800 mb-4" id='stats'>
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">LES STATISTIQUES</h2>
                </div>
                
                    <div class="mx-auto max-w-7xl p-6 lg:p-8">
                        <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                            <dt class="text-base leading-7 text-gray-600">Nombres Des Avis</dt>
                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl"><?php echo $stats['nb_avis'] ?></dd>
                        </div>
                        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                            <dt class="text-base leading-7 text-gray-600">Nombres Des Inscrits</dt>
                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl"><?php echo $stats['nb_laureats'] ?></dd>
                        </div>
                        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                            <dt class="text-base leading-7 text-gray-600">Nombres Des Souvenirs</dt>
                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl"><?php echo $stats['nb_souvenirs'] ?></dd>
                        </div>
                        </dl>
                    </div>
                
            </div>
    </section>

    <section class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 dark:bg-gray-800 mb-4" id="avis"> 
        <div class="px-4 mx-auto w-full max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">AVIS DES LAURÉATS</h2>
            <?php
            $query_avis = "SELECT * FROM Avis ORDER BY dateA LIMIT 10";
            $pdostmt1 = $db->prepare($query_avis);
            $pdostmt1->execute();
            $rows = $pdostmt1->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {?>
            <div id="animation-carousel" data-carousel="slide">
                <div class="relative overflow-hidden rounded-lg h-[480px]">
                    <?php
                    foreach ($rows as $avis) {
                        $query_user = "SELECT * FROM Laureat WHERE Identifiant=:id";
                        $pdostmt3 = $db->prepare($query_user);
                        $pdostmt3->execute([
                            "id" => $avis['identifiant']
                        ]);
                        $user = $pdostmt3->fetch(PDO::FETCH_ASSOC);
                    ?>
                        <div class="hidden bg-white duration-700 ease-in-out dark:bg-gray-900 p-5" data-carousel-item>
                            <div class="rounded-lg border border-transparent bg-blue-500 p-8 dark:bg-blue-600">
                                <p class="leading-loose text-white"><?php echo $avis['Avis'] ?></p>

                                <div class="-mx-2 mt-8 flex items-center">
                                    <img class="mx-2 h-14 w-14 shrink-0 rounded-full object-cover ring-4 ring-blue-200" src="<?php 
                                    if (!empty($user['img']) && file_exists($user['img'])) {
                                        echo 'asset/images/laureat/'.$user['img'];
                                    } else {
                                        echo 'asset/images/profile0.webp';
                                    }
                                    ?>" alt="" />
                                    <div class="mx-2">
                                        <h1 class="font-semibold text-white"><?php echo $user['Prenom'] . ' ' . $user['nom']; ?></h1>
                                        <span class="text-sm text-blue-200"><?php echo $user['Fonction']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>               
                    <?php } ?>
                </div>
            </div>
            <?php 
            } else { ?>
                <small class="ms-2 font-semibold text-gray-500 dark:text-gray-400">Aucun avis pour le moment</small>
            <?php } ?>
        </div>
    </section>


    <section class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 dark:bg-gray-800 mb-4" id="team">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our team</h2>
            </div>
            <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="./asset/images/profile0.webp" alt="Bonnie Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">CHIBA MOSTAFA</a>
                    </h3>
                    <p>CEO/Co-founder</p>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="./asset/images/profile0.webp" alt="Helene Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">Aamar Mohammed Amine</a>
                    </h3>
                    <p>CEO/Co-founder</p>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="./asset/images/profile0.webp" alt="Jese Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">EL MAZALI OUSSAMA</a>
                    </h3>
                    <p>CEO/Co-founder</p>
                </div>
            </div>
        </div>
    </section>
    </div>
    <footer class="p-4 bg-black sm:p-6 dark:bg-gray-800" id="footer">
        <div class="mx-auto max-w-screen-xl">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="#" class="flex items-center">
                        <img src="./asset/images/ofppt-logo.png" class="mr-3 h-20" alt="OFPPT Logo" />
                    </a>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="#" class="hover:underline">OFPPT</a>. All Rights Reserved.
                    </span>
                </div>
            </div>
    </footer>
</div>
<script src="node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>