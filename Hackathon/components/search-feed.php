<div class="relative grid grid-cols-4 overflow-y-hidden xl:grid-cols-4 xl:gap-4 feed-container">
    <div class=" px-4 py-6 xl:sticky xl:pb-0 xl:mb-0">

        <?php
        $sql = "SELECT * FROM Laureat WHERE Identifiant = ?";

        $laureats = $db->prepare($sql);
        $laureats->execute([$_SESSION['laureat_id']]);

        $laureat_signed = $laureats->fetch(PDO::FETCH_ASSOC);
        ?>

        <aside aria-labelledby="categories-label">
            <h3 id="categories-label" class="sr-only">Categories</h3>
            <nav class="p-6 mb-6 font-medium text-gray-500 bg-gray-50 rounded-lg border border-gray-200 dark:border-gray-700 dark:text-gray-400">
                <ul class="mb-6 space-y-4">
                    <li>
                        <a href="#" class="flex items-center text-primary-600 dark:text-primary-500">
                            <svg aria-hidden="true" class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg> Accueil</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center hover:text-primary-600 dark:hover-text-primary-500">
                            <svg class="mr-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                <path fill="currentColor" d="M216 40H40a16 16 0 0 0-16 16v144a16 16 0 0 0 16 16h176a16 16 0 0 0 16-16V56a16 16 0 0 0-16-16M64 92a8 8 0 0 1-16 0V80a8 8 0 0 1 8-8h72a8 8 0 0 1 8 8v12a8 8 0 0 1-16 0v-4h-20v48h4a8 8 0 0 1 0 16H80a8 8 0 0 1 0-16h4V88H64Zm136 92H80a8 8 0 0 1 0-16h120a8 8 0 0 1 0 16m0-32h-64a8 8 0 0 1 0-16h64a8 8 0 0 1 0 16m0-32h-48a8 8 0 0 1 0-16h48a8 8 0 0 1 0 16" />
                            </svg> Articles</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center hover:text-primary-600 dark:hover-text-primary-500">
                            <svg class="mr-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1a1 1 0 1 1 2 0a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1a1 1 0 1 1 2 0a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1a1 1 0 1 1 2 0a1 1 0 0 0 1 1a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2M3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2m6.01-6a1 1 0 1 0-2 0a1 1 0 0 0 2 0m2 0a1 1 0 1 1 2 0a1 1 0 0 1-2 0m6 0a1 1 0 1 0-2 0a1 1 0 0 0 2 0m-10 4a1 1 0 1 1 2 0a1 1 0 0 1-2 0m6 0a1 1 0 1 0-2 0a1 1 0 0 0 2 0m2 0a1 1 0 1 1 2 0a1 1 0 0 1-2 0" clip-rule="evenodd" />
                            </svg> Evenements</a>
                    </li>

                </ul>
                <h4 class="mb-4 text-gray-900 dark:text-white">Others</h4>
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="flex items-center hover:text-primary-600 dark:hover-text-primary-500"><svg class="mr-2 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z">
                                </path>
                                <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"></path>
                            </svg> Privacy policy</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center hover:text-primary-600 dark:hover-text-primary-500"><svg class="mr-2 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path>
                            </svg> Terms of use</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center hover:text-primary-600 dark:hover-text-primary-500"><svg class="mr-2 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg> Contact</a>
                    </li>
                </ul>
            </nav>
        </aside>

    </div>
    <div class="h-full w-full max-w-3xl col-span-2 p-4 m-auto mb-5 space-y-6  overflow-y-auto lg:pt-6">
        <!-- Laureats -->
        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 lg:space-y-6">

            <div class="p-4 space-y-4">
                <div class="flex mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Laureats</h5>

                </div>
                <div class="flow-root">

                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <?php

                        $query = isset($_GET['query']) ? $_GET['query'] : '';

                        $laureatRes = $db->prepare("SELECT Identifiant, nom, Prenom, promotion, Filiere, Etablissement, Fonction, Employeur FROM Laureat WHERE nom LIKE :search OR Prenom LIKE :search LIMIT 5");
                        $search = "%" . $query . "%";
                        $laureatRes->bindParam(':search', $search, PDO::PARAM_STR);

                        $laureatRes->execute();

                        while ($laureat = $laureatRes->fetch(PDO::FETCH_ASSOC)) {

                        ?>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full" src="./asset/images/laureat<? echo $laureat['img']; ?>" alt="">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            <?php echo $laureat['nom'] . ' ' . $laureat['Prenom'];  ?>
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            <?php echo $laureat['Fonction']; ?> dans <?php echo $laureat['Employeur']; ?>
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Profile</button>
                                    </div>
                                </div>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="m0 flex items-center p-4 space-x-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700">
                <p class="mx-auto text-md font-medium leading-none text-gray-800 dark:text-white"><a href="laureats?query=<?php echo $_GET['query']; ?>">Voir tous les résultats</a></p>
            </div>

        </div>

        <!-- End Laureats -->



        <?php




        $query = isset($_GET['query']) ? trim($_GET['query']) : '';


        $search = "%" . $query . "%";

        $laureatRes = $db->prepare("SELECT Identifiant, nom, Prenom, promotion, Filiere, Etablissement, Fonction, Employeur FROM Laureat WHERE nom LIKE :search OR Prenom LIKE :search");
        $laureatRes->bindParam(':search', $search, PDO::PARAM_STR);
        $laureatRes->execute();
        $laureats = $laureatRes->fetchAll(PDO::FETCH_ASSOC);


        $postQuery = "
        SELECT 
            Souvenir.*, 
            Laureat.nom, 
            Laureat.prenom, 
            Laureat.img,
            Laureat.fonction,
            (SELECT COUNT(*) FROM Souvenir_reply WHERE Souvenir_reply.reply_souvenir = Souvenir.identifiant) AS reply_count
        FROM 
            Souvenir
        JOIN 
            Laureat ON Souvenir.id_laureat = Laureat.Identifiant
        WHERE 
            Souvenir.disc LIKE :search OR Laureat.nom LIKE :search OR Laureat.prenom LIKE :search
        ORDER BY 
            Souvenir.created_time DESC
    ";
        $postRes = $db->prepare($postQuery);
        $postRes->bindParam(':search', $search, PDO::PARAM_STR);
        $postRes->execute();
        $souvenirs = $postRes->fetchAll(PDO::FETCH_ASSOC);

        ?>



        <!-- Display Posts -->
        <?php if ($souvenirs) : ?>
            <?php foreach ($souvenirs as $souvenir) : ?>
                <div class="p-4 space-y-4 bg-white rounded-lg shadow dark:bg-gray-800 xl:p-6 2xl:p-8 lg:space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="./asset/images/laureat<?php echo $souvenir['img']; ?>" alt="<?php echo $souvenir['nom']; ?>">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900 truncate dark:text-white">
                                <?php echo htmlspecialchars($souvenir['nom']) . ' ' . htmlspecialchars($souvenir['prenom']); ?>
                                <span class="text-gray-500 truncate font-normal dark:text-gray-400"> • <?php echo htmlspecialchars($souvenir['fonction']); ?></span>
                            </p>
                            <p class="text-sm font-normal text-gray-500 truncate dark:text-gray-400"><?php
                                                                                                        $originalTime = $souvenir['created_time'];
                                                                                                        $dateTime = new DateTime($originalTime);
                                                                                                        echo $dateTime->format('d F \a\t h:i A'); ?></p>
                        </div>
                        <button id="post-menu-button-<?php echo $souvenir['identifiant']; ?>" data-dropdown-toggle="post-menu-<?php echo $souvenir['identifiant']; ?>" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="post-menu-<?php echo $souvenir['identifiant']; ?>" class="z-auto hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="post-menu-button-<?php echo $souvenir['identifiant']; ?>">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Copier le lien</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rapport</a>
                                </li>
                            </ul>
                            <?php if ($souvenir['id_laureat'] == $_SESSION['laureat_id']) { ?>
                                <div class="py-2">
                                    <a href="#" class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white supprimer-post" data-id="<?php echo $souvenir['identifiant']; ?>">Supprimer</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400"><?php echo htmlspecialchars($souvenir['disc']); ?></p>
                        <div class="flex flex-wrap">
                            <img class=" mb-4 mr-4 rounded-lg" src="./asset/images/posts/<?php echo htmlspecialchars($souvenir['photo']); ?>" alt="task screenshot">
                        </div>
                    </div>
                    <div class="flex py-3 space-x-6 border-t border-b border-gray-200 dark:border-gray-700">
                        <button data-modal-target="reply-modal-<?php echo $souvenir['identifiant']; ?>" data-modal-toggle="reply-modal-<?php echo $souvenir['identifiant']; ?>" href="#" class="flex items-center text-sm font-medium text-gray-500 hover:underline hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            <?php echo $souvenir['reply_count']; ?> commentaires
                        </button>
                        <!-- Reply Modal -->
                        <div id="reply-modal-<?php echo $souvenir['identifiant']; ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-lg max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                            Commentaires (<?php echo $souvenir['reply_count']; ?>)
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="reply-modal-<?php echo $souvenir['identifiant']; ?>">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5 space-y-4 h-[600px] overflow-y-auto">
                                        <?php
                                        $souvenirId = $souvenir['identifiant'];
                                        include './components/replies-section.php';
                                        ?>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 space-x-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <div class="flex-shrink-0">
                                            <img class="w-10 h-10 rounded-full" src="./asset/images/laureat<?php echo $laureat_signed['img']; ?>" alt="<?php echo $laureat_signed['nom']; ?>">
                                        </div>
                                        <form method="post" class="w-full flex flex-row" action="./php/posts/create-post-reply.php?souvenir_id=<?php echo $souvenir['identifiant']; ?>">
                                            <input name="post_reply" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tapez votre commentaire" required />
                                            <button type="submit" class="text-white ml-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center justify-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                    <path fill="currentColor" d="m27.45 15.11l-22-11a1 1 0 0 0-1.08.12a1 1 0 0 0-.33 1L6.69 15H18v2H6.69L4 26.74A1 1 0 0 0 5 28a1 1 0 0 0 .45-.11l22-11a1 1 0 0 0 0-1.78" />
                                                </svg>
                                                <span class="sr-only">Icon description</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Reply Modal -->
                    </div>
                    <div>
                        <form method="post" class="w-full flex flex-row" action="./php/posts/create-post-reply.php?souvenir_id=<?php echo htmlspecialchars($souvenir['identifiant']); ?>">
                            <label for="write-message" class="sr-only">Comment</label>
                            <input type="text" name="post_reply" id="write-message" placeholder="Write comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No posts found.</p>
        <?php endif; ?>




    </div>
    <div class=" w-full px-4 py-6 space-y-10 xl:flex xl:flex-col xl:sticky">

    </div>
</div>