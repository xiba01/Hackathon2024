<?php
include './php/connect.php';
$query1 = 'SELECT numbre_created , creation_date FROM count_Laureat WHERE valid=1 AND creation_date BETWEEN CURDATE() - INTERVAL 15 DAY AND CURDATE();';
$result = $db->query($query1);
$count = 0;
$data = [];

while ($laureat_valider = $result->fetch(PDO::FETCH_ASSOC)) {
    $data1[$count]['y'] = $laureat_valider['numbre_created'];
    $dateTime = new DateTime($laureat_valider['creation_date']);
    $formattedTime = $dateTime->format('d F');
    $data1[$count]['label'] = $formattedTime;
    $count++;
}

$query2 = 'SELECT creation_date , numbre_created FROM count_Laureat WHERE valid=0 AND creation_date BETWEEN CURDATE() - INTERVAL 15 DAY AND CURDATE();';
$result = $db->query($query2);
$count = 0;
$data = [];
while ($laureat_nonvalider = $result->fetch(PDO::FETCH_ASSOC)) {
    $data2[$count]['y'] = $laureat_nonvalider['numbre_created'];
    $dateTime = new DateTime($laureat_nonvalider['creation_date']);
    $formattedTime = $dateTime->format('d F');
    $data2[$count]['label'] = $formattedTime;
    $count++;
}

include 'components/header_admin.php';
include 'components/sidebar.php';
?>
<div class=" h-auto pt-13 ">
    <div class=" h-auto pt-13 ">
        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 h-fit md:h-fit ">
                <h3 class="text-4xl sm:text-4xl leading-none font-bold text-green-800"> NB des Laureats Inscrits </h2>
                    <h4 class="text-base font-normal text-gray-500">Laureats Valider
                </h3>
                <br>
                <?php
                $query = 'SELECT SUM(numbre_created) as sum FROM count_Laureat WHERE valid = 1';
                $result = $db->query($query);
                $laureat_valid = $result->fetch();
                ?>
                <div class="flex items-center justify-center">
                    <div class="flex-shrink-0 h-fit">

                        <span class="text-6xl sm:text-6xl leading-none font-bold text-gray-900" id="counter1">
                        </span>

                    </div>
                    <svg class=" ml-5 mt-2 w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                            clip-rule="evenodd" />
                    </svg>




                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 h-fit md:h-fit ">
                <h3 class="text-4xl sm:text-4xl leading-none font-bold text-blue-900">Demandes D'Inscription
                    </h2>
                    <h4 class="text-base font-normal text-gray-500">Laureats en attente du Valider
                </h3>
                <br>
                <div class="flex items-center justify-center">
                    <div class="flex-shrink-0 h-fit">
                        <?php
                        $query = 'SELECT count(*) as count  FROM Laureat WHERE valide = 0';
                        $result = $db->query($query);
                        $laureat_nonvalid = $result->fetch();
                        ?>
                        <span
                            class="text-6xl sm:text-6xl leading-none font-bold text-gray-900" id="counter2">0</span>

                    </div>
                    <svg class="ml-10 mt-2 w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd" />
                    </svg>

                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 h-fit md:h-fit col-span-2">
                <h3 class="text-4xl sm:text-4xl leading-none font-bold text-gray-800">Nombre des Souvenirs poster
                    </h2>
                    <h4 class="text-base font-normal text-gray-500">Tous les souvenirs des laureats
                </h3>
                <br>
                <div class="flex items-center justify-center">
                    <div class="flex-shrink-0 h-fit">
                        <?php
                        $query = 'SELECT count(*) as count FROM Souvenir';
                        $result = $db->query($query);
                        $Souvenir = $result->fetch();
                        ?>
                        <span
                            class="text-6xl sm:text-6xl leading-none font-bold text-gray-900" id="counter3">0</span>

                    </div>
                    <svg class="ml-5 mt-2  w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z"
                            clip-rule="evenodd" />
                    </svg>


                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 h-64 md:h-[500px] ">
                <div class="h-full w-full" id="chartContainer"></div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 h-64 md:h-[500px] ">
                <div class="h-full w-full" id="chartContainer2"></div>

            </div>
        </div>
        <script>
        function countToN(elementId, n) {
            let count = 0;
            const $counterElement = $('#' + elementId);
            const intervalTime = 1000 / n; // Calculate interval time for 3 seconds to reach n

            const interval = setInterval(() => {
                $counterElement.text(count);
                if (count === n) {
                    clearInterval(interval);
                } else {
                    count++;
                }
            }, intervalTime);
        }

        $(document).ready(function() {
            // Example usage: count to different numbers on different elements
            countToN('counter1', <?php echo $laureat_valid['sum']; ?>);
            countToN('counter2', <?php echo $laureat_nonvalid['count']; ?>);
            countToN('counter3', <?= $Souvenir['count']; ?>);
        });
    </script>


        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        <?php include './components/footer_admin.php'; ?>