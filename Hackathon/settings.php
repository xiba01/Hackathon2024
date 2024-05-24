<?php include './components/header.php'; ?>

<?php include './components/topnav.php'; ?>

<main class="max-w-[1000px] mx-auto pt-[56px]">
    <?php
    if (!empty($_GET['email'])) {
        $query_laureats = "SELECT * FROM Laureat where email=:email";
        $pdostmt1 = $db->prepare($query_laureats);
        $pdostmt1->execute([
            'email' => $_GET['email']
        ]);
        $laureat = $pdostmt1->fetch(PDO::FETCH_ASSOC);

    ?>
        <div class="p-8 w-full">
            <?php
            if (isset($_SESSION['error'])) {
                if ($_SESSION['error'] == 0) {
                    echo '<div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-100 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                    Une erreur est survenue lors de la mise à jour de vos informations. Veuillez réessayer.
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                      <span class="sr-only">Close</span>
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                    </button>
                  </div>';
                } else {
                    echo '<div id="alert-2" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                    Vos informations ont été mises à jour avec succès.
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                      <span class="sr-only">Close</span>
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                    </button>
                  </div>';
                }
                unset($_SESSION['error']);
            }
            ?>

            <div class=col-span-full xl:col-auto bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 dark:bg-gray-800 mb-4">
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 dark:bg-gray-800 mb-4">
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profil-tab" data-tabs-target="#profil" type="button" role="tab" aria-controls="profil" aria-selected="false">Profil</button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="password-tab" data-tabs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">Mot de passe</button>
                            </li>
                        </ul>
                    </div>
                    <div id="default-tab-content">
                        <div class="hidden p-4 rounded-lg" id="profil" role="tabpanel" aria-labelledby="profil-tab">
                            <h3 class="mb-4 text-xl font-bold dark:text-white">General information</h3>
                            <form method="POST" action="components/settings/modif_infos.php" enctype="multipart/form-data">
                                <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                                    <img class="mb-4 w-28 h-28 rounded-lg sm:mb-0 xl:mb-4 2xl:mb-0" src="
                            <?php
                            if (!empty($laureat['img']) && file_exists($laureat['img'])) {
                                echo 'asset/images/laureat/' . $laureat['img'];
                            } else {
                                echo 'asset/images/profile0.webp';
                            }
                            ?>
                            " alt="profil image">
                                    <div class='mb-4'>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Modifier image de profil</label>
                                        <input class="block w-50 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" name="image" type="file">
                                    </div>
                                </div>

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
                                        <input type="text" name="tel" id="tel" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?php
                                                                                                                                                                                                                                                                                                                                                                                            if (!empty($laureat['Tel'])) {
                                                                                                                                                                                                                                                                                                                                                                                                echo $laureat['Tel'];
                                                                                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                                                                                echo '';
                                                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                                                            ?>" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="poste" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poste actuel</label>
                                        <input type="text" name="poste" id="poste" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?php
                                                                                                                                                                                                                                                                                                                                                                                                if (!empty($laureat['Fonction'])) {
                                                                                                                                                                                                                                                                                                                                                                                                    echo $laureat['Fonction'];
                                                                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                                                                    echo '';
                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                ?>" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="entrep" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Entreprise</label>
                                        <input type="text" name="entrep" id="entrep" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?php
                                                                                                                                                                                                                                                                                                                                                                                                    if (!empty($laureat['Employeur'])) {
                                                                                                                                                                                                                                                                                                                                                                                                        echo $laureat['Employeur'];
                                                                                                                                                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                                                                                                                                                        echo '';
                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                    ?>" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="about" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">À propos</label>
                                        <textarea id="about" name="about" rows="4" class="resize-none shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"><?php
                                                                                                                                                                                                                                                                                                                                                                                                    if (!empty($laureat['about'])) {
                                                                                                                                                                                                                                                                                                                                                                                                        echo $laureat['about'];
                                                                                                                                                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                                                                                                                                                        echo '';
                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                    ?></textarea>
                                    </div>
                                    <input type="hidden" name="old-img" value="<?php echo $laureat['img']; ?>">
                                    <div class="col-span-6 sm:col-full">
                                        <button id="confirmButton" data-modal-target="changer_infos" data-modal-toggle="changer_infos" class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
                                            modifier
                                        </button>
                                    </div>
                                    <div id="changer_infos" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Vous êtes sûr vous voulez modifier ces infos?</p>
                                                <div class="flex justify-center items-center space-x-4">
                                                    <button data-modal-toggle="changer_infos" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        Non, annuler
                                                    </button>
                                                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-900">
                                                        Oui, changer
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="hidden p-4 rounded-lg" id="password" role="tabpanel" aria-labelledby="password-tab">
                            <h3 class="mb-4 text-xl font-bold dark:text-white">Password information</h3>
                            <form method="POST" action="components/settings/modif_pass.php" onsubmit="return confirmChange();">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="current-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current password</label>
                                        <input type="text" name="current-password" id="current-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="••••••••" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="new-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New password</label>
                                        <input type="text" name="new-password" id="new-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="••••••••" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                                        <input type="text" name="confirm-password" id="confirm-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="••••••••" required>
                                    </div>
                                    <input type="hidden" name="old-password" value="<?php echo $laureat['mdp']; ?>">
                                    <div class="col-span-6 sm:col-full">
                                        <button data-modal-target="changer_mdp" data-modal-toggle="changer_mdp" class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
                                            modifier
                                        </button>
                                    </div>
                                    <div id="changer_mdp" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                <p class="mb-4 text-gray-500 dark:text-gray-300">Vous êtes sûr vous voulez modifier le mot de passe?</p>
                                                <div class="flex justify-center items-center space-x-4">
                                                    <button data-modal-toggle="changer_mdp" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        Non, annuler
                                                    </button>
                                                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-900">
                                                        Oui, changer
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <script>
                                function confirmChange() {
                                    var newPassword = document.getElementById('new-password').value;
                                    var confirmPassword = document.getElementById('confirm-password').value;
                                    if (newPassword !== confirmPassword) {
                                        alert("Lors de la confirmation du nouveau mot de passe, une erreur s'est produite. Veuillez vérifier et réessayer!!");
                                        return false;
                                    };
                                    return true;
                                }
                            </script>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    <?php } ?>

</main>

<?php include './components/footer.php'; ?>