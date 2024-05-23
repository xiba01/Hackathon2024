<!DOCTYPE html>
<html class="relative min-h-full h-full">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/custom.css">

</head>

<body class="bg-bg min-h-full h-full dark:bg-black">
    <?php include_once("./php/connect.php") ?>


    <?php include './components/topnav-landingpage.php'; ?>
    <?php
    $query_laureats = "select count(email) as cocnt_email from Laureat";
    $pdostmt2 = $db->prepare($query_laureats);
    $pdostmt2->execute();
    $laureats = $pdostmt2->fetch(PDO::FETCH_ASSOC);
    ?>

    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Copains d'avant- <span class="text-green-500">OFFPT</span></h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Rassembler les diplômés de l'OFPPT pour partager souvenirs, expériences et parcours professionnels.</p>
                <a href="signup.php" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:focus:ring-blue-100">
                    Registre
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="signin.php" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Se connecter
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="./asset/images/main.png" class="rounded-full size-[350px]" alt="main img">
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900" id="laureats">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">NOMBRES DES LAUREATS</h2>
            </div>
            <div class="max-w-screen-xl px-4 py-8 pt-4 mx-auto text-center lg:py-16 lg:px-6">
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-4xl md:text-4xl font-extrabold"><?php echo $laureats['count_email']; ?></dt>
                    <dd class="font-semibold text-gray-500 dark:text-gray-400">LAUREATS</dd>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-white dark:bg-gray-900" id="avis">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">AVIS DES <span class="underline underline-offset-3 decoration-6 decoration-green-500">LAUREATS</span></h2>
            </div>
            <!-- <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-5 md:space-y-0"> -->
            <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <?php
                    $query_avis = "select * from Avis order by dateA limit 10";
                    $pdostmt1 = $db->prepare($query_avis);
                    $pdostmt1->execute();
                    while ($avis = $pdostmt1->fetch(PDO::FETCH_ASSOC)) {
                        $query_user = "select * from Laureat where Identifiant=:id";
                        $pdostmt3 = $db->prepare($query_user);
                        $pdostmt3->execute([
                            "id" => $avis['identifiant']
                        ]);
                        $user = $pdostmt3->fetch(PDO::FETCH_ASSOC);
                    ?>
                        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <header class="mb-4 lg:mb-6 not-format">
                                <address class="flex items-center mb-6 not-italic">
                                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                        <img class="mr-4 size-10 rounded-full" src="<?php echo $user['img'] ?>" alt="profil img">
                                        <div>
                                            <a href="#" rel="author" class="text-base font-bold text-gray-900 dark:text-white"><?php echo $user['Prenom'] . ' ' . $user['nom']; ?></a>
                                            <p class="text-sm text-gray-500 dark:text-gray-400"><?php echo $user['Fonction']; ?></p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022"><?php echo $avis['dateA']; ?></time></p>
                                        </div>
                                    </div>
                                </address>
                            </header>
                            <p class="text-gray-500 dark:text-gray-400"><?php echo $avis['Avis']; ?></p>
                        </div>
                </div>
            <?php } ?>
            </div>

        </div>
    </section>


    <section class="bg-white dark:bg-gray-900" id="team">
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


    <footer class="p-4 bg-white sm:p-6 dark:bg-gray-800" id="footer">
        <div class="mx-auto max-w-screen-xl">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="#" class="flex items-center">
                        <img src="./asset/images/Logo/ofppt-logo.png" class="mr-3 h-8" alt="OFPPT Logo" />
                    </a>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="#" class="hover:underline">OFPPT</a>. All Rights Reserved.
                    </span>
                </div>
            </div>
    </footer>
    <?php include './components/footer.php'; ?>