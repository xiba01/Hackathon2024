<div class="relative grid grid-cols-4 overflow-y-hidden xl:grid-cols-4 xl:gap-4 feed-container">
    <div class=" hidden px-4 py-6 xl:pb-0 xl:mb-0 xl:flex xl:flex-col">

        <?php
        $sql = "SELECT * FROM Laureat WHERE Identifiant = ?";

        $laureats = $db->prepare($sql);
        $laureats->execute([$_SESSION['laureat_id']]);

        $laureat_signed = $laureats->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="p-6 mb-6 text-gray-500 rounded-lg border bg-gray-50 border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <a href="profil?id=<?php echo $laureat_signed['Identifiant']; ?>" class="flex items-center mb-4">
                <div class="mr-3 shrink-0">
                    <img class="mt-1 w-12 h-12 rounded-full" src="./asset/images/laureat/<?php echo $laureat_signed['img']; ?>" alt="Jese Leos">
                </div>
                <div class="mr-3">
                    <span class="block font-medium text-gray-900 dark:text-white"><?php echo $laureat_signed['nom']; ?> <?php echo $laureat_signed['Prenom']; ?></span>
                    <span class="text-sm"><?php echo $laureat_signed['Fonction']; ?> dans <?php echo $laureat_signed['Employeur']; ?></< /span>
                </div>
            </a>
            <p class="mb-4 text-sm text-gray-500 dark:text-gray-400"><?php echo $laureat_signed['about']; ?></p>
            <dl class="mb-5">
                <dt class="mb-2 text-sm font-bold text-gray-900 uppercase dark:text-white">Education</dt>
                <dd class="mb-3 text-sm text-gray-500 dark:text-gray-400"><?php echo $laureat_signed['Filiere']; ?>, <?php echo $laureat_signed['Etablissement']; ?></dd>
                <dt class="mb-2 text-sm font-bold text-gray-900 uppercase dark:text-white">Rejoint</dt>
                <dd class="text-sm text-gray-500 dark:text-gray-400">September 20, 2018</dd>
            </dl>
            <button type="button" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 w-full"><a href="profil?id=<?php echo $laureat_signed['Identifiant']; ?>">Mon Profile</a></button>
        </div>

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
    <div class="h-full max-w-3xl col-span-2 p-4 m-auto mb-5 space-y-6  overflow-y-auto lg:pt-6">
        <!-- New Post -->
        <div class="p-4 space-y-4 bg-white rounded-lg shadow dark:bg-gray-800 xl:p-6 2xl:p-8 lg:space-y-6">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <img class="w-10 h-10 rounded-full" src="./asset/images/laureat/<?php echo $laureat_signed['img']; ?>" alt="{{ .name }}">
                </div>
                <div class="w-full">
                    <input data-modal-target="new post" data-modal-toggle="new post" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Créer un nouveau post" required />
                </div>
            </div>
            <div class=" flex justify-between">
                <button data-modal-target="new post" data-modal-toggle="new post" class="relative inline-flex items-center justify-center p-0.5 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative px-16  py-2.5 flex flex-row justify-between space-x-2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 16l5-7l6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1" />
                            </svg>
                        </span>
                        <p>Media</p>
                    </span>
                </button>
                <button data-modal-target="event-modal" data-modal-toggle="event-modal" class="relative inline-flex items-center justify-center p-0.5 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">

                    <span class="relative px-16  py-2.5 flex flex-row justify-between space-x-2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1m3-7h.01v.01H8zm4 0h.01v.01H12zm4 0h.01v.01H16zm-8 4h.01v.01H8zm4 0h.01v.01H12zm4 0h.01v.01H16z" />
                            </svg>
                        </span>
                        <p>Event</p>
                    </span>
                </button>
                <button class="relative inline-flex items-center justify-center p-0.5  overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                    <a href="./create-article.php">
                        <span class="relative px-16  py-2.5 flex flex-row justify-between space-x-2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M156 92a12 12 0 0 1 12-12h64a12 12 0 0 1 0 24h-64a12 12 0 0 1-12-12m76 28h-64a12 12 0 0 0 0 24h64a12 12 0 0 0 0-24m0 40H80a12 12 0 0 0 0 24h152a12 12 0 0 0 0-24m0 40H80a12 12 0 0 0 0 24h152a12 12 0 0 0 0-24M96 144a12 12 0 0 0 0-24h-4V68h24v4a12 12 0 0 0 24 0V56a12 12 0 0 0-12-12H32a12 12 0 0 0-12 12v16a12 12 0 0 0 24 0v-4h24v52h-4a12 12 0 0 0 0 24Z" />
                                </svg>
                            </span>
                            <p>Article</p>
                        </span>
                    </a>
                </button>

            </div>


        </div>



        <!-- New Event -->
        <!-- Default Modal -->
        <div id="event-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-lg max-h-full">
                <!-- Modal content -->
                <form action="./php/events/create_event.php" method="post" enctype="multipart/form-data" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Créer un nouvel événement
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="event-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">


                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" name="event_img" type="file" class="hidden" />
                            </label>
                        </div>

                        <div class="mb-6">
                            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
                            <input type="text" id="default-input" placeholder="Tapez un titre ici" id="event_titre" name="event_titre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Localisation</label>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 12q.825 0 1.413-.587T14 10t-.587-1.412T12 8t-1.412.588T10 10t.588 1.413T12 12m0 10q-4.025-3.425-6.012-6.362T4 10.2q0-3.75 2.413-5.975T12 2t5.588 2.225T20 10.2q0 2.5-1.987 5.438T12 22" />
                                </svg>
                            </div>
                            <input type="text" id="input-group-1" name="event_localisation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tapez la localisation">
                        </div>


                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="event_desc" name="event_desc" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tapez la description ici..."></textarea>

                        <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de l'événement</label>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1a1 1 0 1 1 2 0a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1a1 1 0 1 1 2 0a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1a1 1 0 1 1 2 0a1 1 0 0 0 1 1a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2M3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2m6.01-6a1 1 0 1 0-2 0a1 1 0 0 0 2 0m2 0a1 1 0 1 1 2 0a1 1 0 0 1-2 0m6 0a1 1 0 1 0-2 0a1 1 0 0 0 2 0m-10 4a1 1 0 1 1 2 0a1 1 0 0 1-2 0m6 0a1 1 0 1 0-2 0a1 1 0 0 0 2 0m2 0a1 1 0 1 1 2 0a1 1 0 0 1-2 0" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="date" name="event_date" name="event_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selectionner la date">
                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="w-full flex space-x-2 p-4 md:p-5 border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="event-modal" type="submit" class="flex-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Créer l'événement
                        </button>
                        <button data-modal-hide="event-modal" type="button" class="flex-1 py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Annuler
                        </button>
                    </div>

                </form>
            </div>
        </div>
        <!-- EndNew Event -->


        <!-- New Post modal -->
        <div id="new post" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Créer un nouveau Post
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="new post">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" method="post" enctype="multipart/form-data" action="./php/posts/create_post.php">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Télécharger une image</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="post-img" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                        </div>
                                        <input id="post-img" name="post_img" type="file" class="hidden" />
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Text</label>
                                <textarea name="post_disc" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="La description du Post ici"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Ajouter un nouveau Post
                        </button>
                    </form>


                </div>
            </div>
        </div>
        <!-- End New Post modal -->

        <!-- End New Post -->



        <!-- Post -->
        <?php
        $sql = 'SELECT 
    Souvenir.*, 
    Laureat.nom, 
    Laureat.prenom, 
    Laureat.img,
    Laureat.fonction,
    Laureat.Identifiant as laureat_id,
    (SELECT COUNT(*) FROM Souvenir_reply WHERE Souvenir_reply.reply_souvenir = Souvenir.identifiant) AS reply_count
FROM 
    Souvenir
JOIN 
    Laureat ON Souvenir.id_laureat = Laureat.Identifiant
ORDER BY 
    Souvenir.created_time DESC';

        $souvenirs = $db->prepare($sql);
        $souvenirs->execute();

        while ($souvenir = $souvenirs->fetch(PDO::FETCH_ASSOC)) {
            $originalTime = $souvenir['created_time'];
            $dateTime = new DateTime($originalTime);
            $formattedTime = $dateTime->format('d F \a\t h:i A');
        ?>
            <div class="p-4 space-y-4 bg-white rounded-lg shadow dark:bg-gray-800 xl:p-6 2xl:p-8 lg:space-y-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <img class="w-10 h-10 rounded-full" src="./asset/images/laureat/<?php echo $souvenir['img']; ?>" alt="<?php echo $souvenir['nom']; ?>">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate dark:text-white"><?php echo $souvenir['nom'] . ' ' . $souvenir['prenom']; ?><span class="text-gray-500 truncate font-normal dark:text-gray-400"> • <?php echo $souvenir['fonction']; ?></span></p>
                        <p class="text-sm font-normal text-gray-500 truncate dark:text-gray-400"><?php echo $formattedTime; ?></p>
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
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400"><?php echo $souvenir['disc']; ?></p>
                    <div class="flex flex-wrap">
                        <img class="mb-4 mr-4 rounded-lg" src="./asset/images/posts/<?php echo $souvenir['photo']; ?>" alt="task screenshot">
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
                                        <img class="w-10 h-10 rounded-full" src="./asset/images/laureat/<?php echo $laureat_signed['img']; ?>" alt="<?php echo $laureat_signed['nom']; ?>">
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
                    <form method="post" class="w-full flex flex-row" action="./php/posts/create-post-reply.php?souvenir_id=<?php echo $souvenir['identifiant']; ?>">
                        <label for="write-message" class="sr-only">Comment</label>
                        <input type="text" name="post_reply" id="write-message" placeholder="Write comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </form>
                </div>
            </div>
            <!-- End Post -->
        <?php } ?>




    </div>
    <div class=" hidden w-full px-4 py-6 space-y-6 xl:flex xl:flex-col xl:sticky">

        <div class="p-6 font-medium text-gray-500 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
            <h4 class="mb-6 font-bold text-gray-900 uppercase dark:text-white">Autres lauréats</h4>
            <ul class="space-y-4 font-light text-gray-500 dark:text-gray-400">
                <?php
                $sql = "SELECT * FROM Laureat LIMIT 3";
                $laureats = $db->prepare($sql);
                $laureats->execute();

                while ($laureat = $laureats->fetch(PDO::FETCH_ASSOC)) {
                ?>

                    <li class="flex justify-between items-start">
                        <div class="mr-3 shrink-0">
                            <a href="profil?id=<?php echo $laureat['Identifiant']; ?>">
                                <img class="mt-1 w-8 h-8 rounded-full" src="./asset/images/laureat/<?php echo $laureat['img']; ?>" alt="">
                            </a>
                        </div>
                        <div class="mr-auto">
                            <?php
                            $fullName = $laureat['nom'] . ' ' . $laureat['Prenom'];
                            if (strlen($fullName) > 12) {
                                $truncatedName = substr($fullName, 0, 12) . '..';
                            } else {
                                $truncatedName = $fullName;
                            }
                            ?>

                            <span class="block font-medium text-gray-900 dark:text-white"><?php echo htmlspecialchars($truncatedName, ENT_QUOTES, 'UTF-8'); ?></span>
                            <span class="text-sm"><?php echo $laureat['Fonction']; ?></span>
                        </div>
                        <div>
                            <buttoype="button" class="py-2 px-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <a href="profil?id=<?php echo $laureat['Identifiant']; ?>">Profile</a>
                                </buttoype=>
                        </div>
                    </li>

                <?php } ?>

            </ul>
        </div>

        <aside class="hidden xl:block xl:w-80" aria-labelledby="sidebar-label">
            <h3 id="sidebar-label" class="sr-only">Sidebar</h3>


            <div class="p-5 mb-6 font-medium text-gray-500 bg-white-50 bg-white rounded-lg border border-gray-200 divide-y divide-gray-200 shadow dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:divide-gray-700">
                <h4 class="mb-4 text-sm font-bold text-gray-900 uppercase dark:text-white">Derniers articles</h4>
                <?php
                $sql = "SELECT * 
            FROM Article 
            ORDER BY article_date DESC LIMIT 5";
                $articles = $db->prepare($sql);
                $articles->execute();

                while ($article = $articles->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="flex items-center py-4">
                        <a href="#" class="shrink-0">
                            <img src="./asset/images/articles/<?php echo $article['article_intro_img'] ?>" class="mr-4 w-12 max-w-full h-12 rounded-lg" alt="">
                        </a>
                        <a href="article?article_id=<?php echo $article['article_id']; ?>">
                            <h5 class="font-semibold leading-tight text-gray-900 dark:text-white hover:underline"><?php echo $article['article_titre']; ?></h5>
                        </a>
                    </div>
                <?php } ?>
            </div>


        </aside>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('.supprimer-post').forEach(button => {
            button.addEventListener('click', function() {
                const souvenirId = this.getAttribute('data-id');

                if (confirm('Are you sure you want to delete this souvenir?')) {
                    fetch(`./php/posts/delete-post.php?souvenir_id=${souvenirId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: `souvenir_id=${souvenirId}`
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Remove the deleted souvenir from the DOM
                                document.querySelector(`#post-menu-${souvenirId}`).closest('.p-4').remove();
                            } else {
                                alert('Failed to delete the souvenir. Please try again.');
                            }
                        });
                }
            });
        });
    });
</script>