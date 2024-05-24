<?php
// Start the session and include database connection if required
session_start();
include './php/connect.php'; // include your database connection

// Define the query and execute it
$query = isset($_GET['query']) ? $_GET['query'] : '';

$laureatRes = $db->prepare("SELECT Identifiant, nom, Prenom, promotion, Filiere, Etablissement, Fonction, Employeur, img FROM Laureat WHERE nom LIKE :search OR Prenom LIKE :search");
$search = "%" . $query . "%";
$laureatRes->bindParam(':search', $search, PDO::PARAM_STR);
$laureatRes->execute();
?>

<?php include './components/header.php'; ?>

<?php include './components/topnav.php'; ?>

<main class="max-w-[800px] mx-auto pt-[80x]">

    <!-- Laureats -->
    <h3 class=" text-gray-700"><?php echo $laureatRes->rowCount(); ?> Resultats</h3>
    <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 lg:space-y-6">

        <div class="p-4 space-y-4">
            <div class="flow-root">

                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <?php

                    while ($laureat = $laureatRes->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="./asset/images/laureat<?php echo $laureat['img']; ?>" alt="">
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


    </div>

    <!-- End Laureats -->


</main>

<?php include './components/footer.php'; ?>