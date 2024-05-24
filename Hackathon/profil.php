<?php include './components/header.php'; ?>

<?php include './components/topnav.php'; ?>

<main class="max-w-[1000px] mx-auto pt-[56px]"></main>

<?php
if (!empty($_GET['id'])) {
    $query_laureats = "SELECT * FROM Laureat where identifiant=:email";
    $pdostmt1 = $db->prepare($query_laureats);
    $pdostmt1->execute([
        'email' => $_GET['id']
    ]);
    $laureat = $pdostmt1->fetch(PDO::FETCH_ASSOC);

?>
    <div class="p-8 w-full">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl pb-8">
            <div class="w-full h-[250px]">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg" class="w-full h-full rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center mt-20">
                <img src="
                <?php
                if (!empty($laureat['img'])) {
                    echo 'asset/images/laureat/' . $laureat['img'];
                } else {
                    echo 'asset/images/profile0.webp';
                }
                ?>
                " class="w-40 border-4 border-white rounded-full">
                <div class="flex items-center space-x-2 mt-2 p-3">
                    <p class="text-2xl dark:text-white"><?php echo $laureat['Prenom'] . ' ' . $laureat['nom']; ?></p>

                </div>
                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                    <?php if (!empty($laureat['Fonction'])) {
                        echo $laureat['Fonction'];
                    } else {
                        echo 'rien pour le moment';
                    } ?>
                </span>
            </div>
            <!-- <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
                <div class="flex items-center space-x-4 mt-2">
                    <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                        </svg>
                        <span>Abonner</span>
                    </button>
                </div>
            </div> -->
        </div>

        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <div class="w-full flex flex-col">
                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl my-4 p-8">
                        <h4 class="text-xl text-gray-900 dark:text-white font-bold">Personal <span class="underline underline-offset-3 decoration-6 decoration-green-500">Infos</span></h4>
                        <ul class="mt-4 text-gray-700 dark:text-white">
                            <li class="flex border-y py-2">
                                <span class="font-bold w-40 ">Nom Complet:</span>
                                <span class="text-gray-700 dark:text-white"><?php echo $laureat['Prenom'] . ' ' . $laureat['nom']; ?></span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-40 ">Promotion:</span>
                                <span class="text-gray-700 dark:text-white"><?php echo $laureat['promotion']; ?></span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-40 ">Filière:</span>
                                <span class="text-gray-700 dark:text-white"><?php echo $laureat['Filiere']; ?></span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-40 ">Etablissement:</span>
                                <span class="text-gray-700 dark:text-white"><?php echo $laureat['Etablissement']; ?></span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-40 ">Email:</span>
                                <span class="text-gray-700 dark:text-white"><?php echo $laureat['email']; ?></span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-40 ">Telephone:</span>
                                <span class="text-gray-700 dark:text-white"><?php echo $laureat['Tel']; ?></span>
                            </li>
                            <?php if (!empty($laureat['Fonction'])) { ?>
                                <li class="flex border-b py-2">
                                    <span class="font-bold w-40 ">Poste:</span>
                                    <span class="text-gray-700 dark:text-white"><?php echo $laureat['Fonction']; ?></span>
                                </li>
                            <?php } ?>
                            <?php if (!empty($laureat['Employeur'])) { ?>
                                <li class="flex border-b py-2">
                                    <span class="font-bold w-40 ">Entreprise:</span>
                                    <span class="text-gray-700 dark:text-white"><?php echo $laureat['Employeur']; ?> </span>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl my-4 p-8">
                        <h4 class="text-xl dark:text-white text-gray-900 font-bold">Statut</h4>
                        <div class="grid grid-cols-1 lg:grid-cols-1 gap-8 mt-4">
                            <div class="px-6 py-6 bg-gray-100 dark:bg-gray-900 dark:border-gray-800 border border-gray-300 rounded-lg shadow-xl">
                                <div class="flex items-center justify-between">
                                    <?php
                                    $query_souvenirs = "select count(photo) as count_photo , max(created_time) as earliest_created_time from Souvenir where id_laureat=:id";
                                    $pdostmt2 = $db->prepare($query_souvenirs);
                                    $pdostmt2->execute([
                                        "id" => $laureat['Identifiant']
                                    ]);
                                    $souvenir = $pdostmt2->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <span class="font-bold text-sm text-indigo-600">Souvenirs</span>
                                    <span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default dark:bg-gray-500 dark:hover:bg-gray-200 dark:text-gray-200 dark:hover:text-gray-500">
                                        <?php
                                        if (!empty($souvenir['earliest_created_time'])) {
                                            echo $souvenir['earliest_created_time'];
                                        } else {
                                            echo 'none';
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="flex items-center justify-between mt-6">
                                    <div>
                                        <svg class="w-12 h-12 p-2.5 bg-indigo-400 bg-opacity-20 rounded-full text-indigo-600 border border-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m3 16l5-7l6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1" />
                                        </svg>
                                    </div>
                                    <span class="text-2xl dark:text-white 2xl:text-3xl font-bold"><?php echo $souvenir['count_photo']; ?></span>
                                </div>
                            </div>
                            <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                                <div class="flex items-center justify-between">
                                    <?php
                                    $query_avis = "select count(avis) as count_avis , max(dateA) as earliest_dateA from Avis where identifiant=:id";
                                    $pdostmt3 = $db->prepare($query_avis);
                                    $pdostmt3->execute([
                                        "id" => $laureat['Identifiant']
                                    ]);
                                    $avis = $pdostmt3->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <span class="font-bold text-sm text-green-600">Avis</span>
                                    <span class="text-xs    dark:bg-gray-500 dark:hover:bg-gray-200 dark:text-gray-200 dark:hover:text-gray-500  bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">
                                        <?php
                                        if (!empty($avis['earliest_dateA'])) {
                                            echo $avis['earliest_dateA'];
                                        } else {
                                            echo 'none';
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="flex items-center justify-between mt-6">
                                    <div>
                                        <svg class="w-12 h-12 p-2.5 bg-green-400 bg-opacity-20 rounded-full text-green-600 border border-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 9H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h6m0-6v6m0-6l5.419-3.87A1 1 0 0 1 18 5.942v12.114a1 1 0 0 1-1.581.814L11 15m7 0a3 3 0 0 0 0-6M6 15h3v5H6z" />
                                        </svg>
                                    </div>
                                    <span class="text-2xl 2xl:text-3xl font-bold"><?php echo $avis['count_avis']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl my-4 p-8 dark:bg-gray-800 ">
                    <h4 class="text-xl text-gray-900 font-bold dark:text-white">À propos</h4>
                    <p class="mt-2 text-gray-700 dark:text-white">
                        <?php
                        if (!empty($laureat['about'])) {
                            echo $laureat['about'];
                        } else {
                            echo '...';
                        }
                        ?>
                    </p>
                </div>

                <div class="flex-1 bg-white rounded-lg shadow-xl my-4 p-8 dark:bg-gray-800 ">
                    <h4 class="text-xl text-gray-900 font-bold dark:text-white">Articles</h4>

                    <!-- Block start -->
                    <aside aria-label="Related articles" class="py-8 bg-white dark:bg-gray-900 lg:py-16">
                        <div class="px-4 w-full ">
                            <div id="animation-carousel" data-carousel="slide">
                                <div class="relative overflow-hidden rounded-lg h-[480px]">
                                    <div class="hidden bg-white duration-700 ease-in-out dark:bg-gray-900" data-carousel-item>
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
                                            <article class="p-4 mx-auto max-w-sm bg-white rounded-lg shadow-md border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                                <a href="#">
                                                    <img class="mb-5 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/office-laptops.png" alt="office laptop working">
                                                </a>
                                                <div class="flex items-center mb-3 space-x-2">
                                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar">
                                                    <div class="font-medium dark:text-white">
                                                        <div>Jese Leos</div>
                                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">Aug 15, 2021 · 16 min read</div>
                                                    </div>
                                                </div>
                                                <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                                    <a href="#">Our first office</a>
                                                </h3>
                                                <p class="mb-3 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.</p>
                                                <a href="#" class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 hover:no-underline">
                                                    Read more <svg class="mt-px ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </article>
                                            <article class="hidden p-4 mx-auto max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 border border-gray-200 dark:border-gray-800 sm:block">
                                                <a href="#">
                                                    <img class="mb-5 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/google-hq.png" alt="google hq">
                                                </a>
                                                <div class="flex items-center mb-3 space-x-2">
                                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png" alt="Roberta Casas avatar">
                                                    <div class="font-medium dark:text-white">
                                                        <div>Roberta Casas</div>
                                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">Aug 15, 2021 · 16 min read</div>
                                                    </div>
                                                </div>
                                                <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                                    <a href="#">We partnered up with Google</a>
                                                </h3>
                                                <p class="mb-3 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.</p>
                                                <a href="#" class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 hover:no-underline">
                                                    Read more <svg class="mt-px ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </article>
                                            <article class="hidden p-4 mx-auto max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 border border-gray-200 dark:border-gray-800 xl:block">
                                                <a href="#">
                                                    <img class="mb-5 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/office-laptops-2.png" alt="office laptop working">
                                                </a>
                                                <div class="flex items-center mb-3 space-x-2">
                                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/sofia-mcguire.png" alt="Sofia McGuire avatar">
                                                    <div class="font-medium dark:text-white">
                                                        <div>Sofia McGuire</div>
                                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">Aug 15, 2021 · 16 min read</div>
                                                    </div>
                                                </div>
                                                <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                                    <a href="#">Our first project with React</a>
                                                </h3>
                                                <p class="mb-3 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.</p>
                                                <a href="#" class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 hover:no-underline">
                                                    Read more <svg class="mt-px ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </article>
                                            <article class="hidden p-4 mx-auto max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 border border-gray-200 dark:border-gray-800 xl:block">
                                                <a href="#">
                                                    <img class="mb-5 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/office-laptops-2.png" alt="office laptop working">
                                                </a>
                                                <div class="flex items-center mb-3 space-x-2">
                                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/sofia-mcguire.png" alt="Sofia McGuire avatar">
                                                    <div class="font-medium dark:text-white">
                                                        <div>Sofia McGuire</div>
                                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">Aug 15, 2021 · 16 min read</div>
                                                    </div>
                                                </div>
                                                <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                                    <a href="#">Our first project with React</a>
                                                </h3>
                                                <p class="mb-3 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.</p>
                                                <a href="#" class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 hover:no-underline">
                                                    Read more <svg class="mt-px ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="hidden bg-white duration-700 ease-in-out dark:bg-gray-900" data-carousel-item>
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
                                            <article class="p-4 mx-auto max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 border border-gray-200 dark:border-gray-800">
                                                <a href="#">
                                                    <img class="mb-5 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/google-hq.png" alt="google hq">
                                                </a>
                                                <div class="flex items-center mb-3 space-x-2">
                                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png" alt="Roberta Casas avatar">
                                                    <div class="font-medium dark:text-white">
                                                        <div>Roberta Casas</div>
                                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">Aug 15, 2021 · 16 min read</div>
                                                    </div>
                                                </div>
                                                <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                                    <a href="#">We partnered up with Google</a>
                                                </h3>
                                                <p class="mb-3 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.</p>
                                                <a href="#" class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 hover:no-underline">
                                                    Read more <svg class="mt-px ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </article>
                                            <article class="hidden p-4 mx-auto max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 border border-gray-200 dark:border-gray-800 sm:block">
                                                <a href="#">
                                                    <img class="mb-5 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/office-laptops.png" alt="office laptop working">
                                                </a>
                                                <div class="flex items-center mb-3 space-x-2">
                                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar">
                                                    <div class="font-medium dark:text-white">
                                                        <div>Jese Leos</div>
                                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">Aug 15, 2021 · 16 min read</div>
                                                    </div>
                                                </div>
                                                <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                                    <a href="#">Our first office</a>
                                                </h3>
                                                <p class="mb-3 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.</p>
                                                <a href="#" class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 hover:no-underline">
                                                    Read more <svg class="mt-px ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </article>
                                            <article class="hidden p-4 mx-auto max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 border border-gray-200 dark:border-gray-800 xl:block">
                                                <a href="#">
                                                    <img class="mb-5 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/office-laptops-2.png" alt="office laptop working">
                                                </a>
                                                <div class="flex items-center mb-3 space-x-2">
                                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/sofia-mcguire.png" alt="Sofia McGuire avatar">
                                                    <div class="font-medium dark:text-white">
                                                        <div>Sofia McGuire</div>
                                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">Aug 15, 2021 · 16 min read</div>
                                                    </div>
                                                </div>
                                                <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                                    <a href="#">Our first project with React</a>
                                                </h3>
                                                <p class="mb-3 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.</p>
                                                <a href="#" class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 hover:no-underline">
                                                    Read more <svg class="mt-px ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="hidden bg-white duration-700 ease-in-out dark:bg-gray-900" data-carousel-item>
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
                                            <article class="p-4 mx-auto max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 border border-gray-200 dark:border-gray-800">
                                                <a href="#">
                                                    <img class="mb-5 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/office-laptops-2.png" alt="office laptop working">
                                                </a>
                                                <div class="flex items-center mb-3 space-x-2">
                                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/sofia-mcguire.png" alt="Sofia McGuire avatar">
                                                    <div class="font-medium dark:text-white">
                                                        <div>Sofia McGuire</div>
                                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">Aug 15, 2021 · 16 min read</div>
                                                    </div>
                                                </div>
                                                <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                                    <a href="#">Our first project with React</a>
                                                </h3>
                                                <p class="mb-3 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.</p>
                                                <a href="#" class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 hover:no-underline">
                                                    Read more <svg class="mt-px ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </article>
                                            <article class="hidden p-4 mx-auto max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 border border-gray-200 dark:border-gray-800 sm:block">
                                                <a href="#">
                                                    <img class="mb-5 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/google-hq.png" alt="google hq">
                                                </a>
                                                <div class="flex items-center mb-3 space-x-2">
                                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png" alt="Roberta Casas avatar">
                                                    <div class="font-medium dark:text-white">
                                                        <div>Roberta Casas</div>
                                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">Aug 15, 2021 · 16 min read</div>
                                                    </div>
                                                </div>
                                                <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                                    <a href="#">We partnered up with Google</a>
                                                </h3>
                                                <p class="mb-3 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.</p>
                                                <a href="#" class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 hover:no-underline">
                                                    Read more <svg class="mt-px ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </article>
                                            <article class="hidden p-4 mx-auto max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 border border-gray-200 dark:border-gray-800 xl:block">
                                                <a href="#">
                                                    <img class="mb-5 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/office-laptops.png" alt="office laptop working">
                                                </a>
                                                <div class="flex items-center mb-3 space-x-2">
                                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar">
                                                    <div class="font-medium dark:text-white">
                                                        <div>Jese Leos</div>
                                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">Aug 15, 2021 · 16 min read</div>
                                                    </div>
                                                </div>
                                                <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                                    <a href="#">Our first office</a>
                                                </h3>
                                                <p class="mb-3 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.</p>
                                                <a href="#" class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 hover:no-underline">
                                                    Read more <svg class="mt-px ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center mt-2">
                                    <button type="button" class="flex justify-center items-center mr-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                                        <span class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="hidden">Previous</span>
                                        </span>
                                    </button>
                                    <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                                        <span class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="hidden">Next</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Block end -->
                </div>

            </div>

        </div>

    </div>
    </div>
<?php } ?>
<?php include 'components/footer.php'; ?>