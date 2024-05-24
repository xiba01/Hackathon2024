<?php include './components/header.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    $sql = "SELECT Events.*, Laureat.nom, Laureat.Prenom
            FROM Events
            INNER JOIN Laureat ON Events.created_by = Laureat.Identifiant
            WHERE Events.event_id = :event_id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':event_id' => $event_id]);

    $event = $stmt->fetch(PDO::FETCH_ASSOC);

    $event_date = strtotime($event['event_date']);
    $formatted_date = date("F j, Y", $event_date);

    $datetime = new DateTime($event['created_at']);
    $formatted_date2 = $datetime->format('F j, g:i A');
} else {
    header("location: 404.php");
}
?>



<main class="h-full">

    <main class="h-full pb-16 lg:pb-24 bg-white dark:bg-gray-900">
        <header style="background-image: url('./asset/images/events/<?php echo $event['event_img']; ?>');" class="w-full h-[460px] xl:h-[537px] bg-no-repeat bg-cover bg-center bg-blend-darken relative">
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
            <div class="absolute top-24 left-1/2 px-4 mx-auto w-full max-w-screen-xl -translate-x-1/2 xl:top-1/2 xl:-translate-y-1/6 xl:px-0">
                <span class="block mb-4 text-gray-300">Publié par <a href="#" class="font-semibold text-white hover:underline"><?php echo $event['nom']; ?> <?php echo $event['Prenom']; ?></a></span>
                <h1 class="mb-6 max-w-4xl text-2xl font-extrabold leading-none text-white sm:text-3xl lg:text-4xl"><?php echo $event['event_name']; ?></h1>
                <div class="mt-auto text-white" ;>

                    <p class="text-gray-500 dark:text-gray-400">
                        <a href="#" class="flex flex-row space-x-2 items-center font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="window.history.back(); return false;">

                            <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10" transform="scale(-1, 1)">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>

                            <span class="text-white">
                                Page précédente
                            </span>
                        </a>
                    </p>

                </div>
            </div>
        </header>

        <div class="flex relative z-20 justify-between p-6 -m-36 mx-4 max-w-screen-xl bg-white dark:bg-gray-800 rounded xl:-m-32 xl:p-9 xl:mx-auto">
            <article class="xl:w-[828px] w-full max-w-none format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <div class="flex flex-row justify-between">
                    <h2 class="text-xl text-gray-900 dark:text-white font-bold mb-2">En savoir plus</h2>
                    <aside aria-label="Share">
                        <div class="not-format">


                            <button data-tooltip-target="tooltip-link" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                </svg>
                            </button>
                            <div id="tooltip-link" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                Share link
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <button data-tooltip-target="tooltip-save" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                            </button>
                            <div id="tooltip-save" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                Save this article
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownDotsHorizontal" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">

                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="flex items-center space-x-4 rtl:space-x-reverse mb-3">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-900 dark:text-white text-base font-medium"><?php echo $formatted_date;; ?></span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-900 dark:text-white text-base font-medium"><?php echo $event['location']; ?></span>
                    </div>
                </div>
                <!-- <div class="flex items-start space-x-4 rtl:space-x-reverse mb-5">
                    <div>
                        <div class="text-base font-normal text-gray-500 dark:text-gray-400 mb-2">Participants</div>
                        <div class="flex -space-x-4 rtl:space-x-reverse">
                            <img class="w-8 h-8 border border-white rounded-full dark:border-gray-800" src="/docs/images/people/profile-picture-5.jpg" alt="">
                            <img class="w-8 h-8 border border-white rounded-full dark:border-gray-800" src="/docs/images/people/profile-picture-2.jpg" alt="">
                            <img class="w-8 h-8 border border-white rounded-full dark:border-gray-800" src="/docs/images/people/profile-picture-3.jpg" alt="">
                            <a class="flex items-center justify-center w-8 h-8 text-xs font-medium text-white bg-gray-700 border border-white rounded-full hover:bg-gray-600 dark:border-gray-800" href="#">+99</a>
                        </div>
                    </div>
                </div> -->
                <div class="flex flex-col lg:flex-row justify-between lg:items-center">
                    <div class="flex items-center space-x-3 text-gray-500 dark:text-gray-400 text-base mb-2 lg:mb-0">
                        <span>Par <a href="#" class="text-gray-900 dark:text-white hover:underline no-underline font-semibold"><?php echo $event['nom']; ?> <?php echo $event['Prenom']; ?></a></span>
                        <span class="bg-gray-300 dark:bg-gray-400 w-2 h-2 rounded-full"></span>
                        <span><time class="font-normal text-gray-500 dark:text-gray-400" pubdate class="uppercase" datetime="2022-03-08" title="August 3rd, 2022"><?php echo $formatted_date2; ?></time></span>
                    </div>

                </div>
                <p class="lead">
                    <?php echo $event['description']; ?>
                </p>


            </article>
            <aside class="hidden xl:block" aria-labelledby="sidebar-label">
                <div class="xl:w-[336px] sticky top-6">
                    <h3 id="sidebar-label" class="sr-only">Sidebar</h3>
                    <div class="mb-8">
                        <button type="button" data-event-id="1" data-user-id="1" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 text-center w-full" id="attend-button">
                            Attend l'événement
                        </button>
                    </div>
                    <div class="mb-12">
                        <h4 class="mb-4 text-sm font-bold text-gray-900 dark:text-white uppercase">Autres événements</h4>
                        <?php
                        $sql = "SELECT * FROM Events ORDER BY created_at DESC LIMIT 3";
                        $events = $db->prepare($sql);
                        $events->execute();

                        while ($event = $events->fetch(PDO::FETCH_ASSOC)) {;
                        ?>

                            <div class="mb-6 flex items-center">
                                <a href="event?event_id=<?php echo $event['event_id']; ?>" class="shrink-0">
                                    <img src="./asset/images/events/<?php echo $event['event_img']; ?>" class="mr-4 max-w-full w-24 h-24 rounded-lg" alt="">
                                </a>
                                <div>
                                    <?php
                                    if (!function_exists('truncateText')) {
                                        function truncateText($text, $maxLength = 10)
                                        {
                                            if (strlen($text) > $maxLength) {
                                                return substr($text, 0, $maxLength) . '...';
                                            } else {
                                                return $text;
                                            }
                                        }
                                    }

                                    $eventName = $event['event_name'];
                                    $truncatedEventName = truncateText($eventName);
                                    ?>

                                    <h5 class="mb-2 text-lg font-bold leading-tight dark:text-white text-gray-900"><?php echo htmlspecialchars($truncatedEventName, ENT_QUOTES, 'UTF-8'); ?></h5>
                                    <p class="mb-2 font-light text-gray-500 dark:text-gray-400">
                                        <?php
                                        $event_name = $event['event_name'];
                                        if (strlen($event_name) > 52) {
                                            $event_name = substr($event_name, 0, 52) . '...';
                                        }
                                        echo htmlspecialchars($event_name, ENT_QUOTES, 'UTF-8');
                                        ?>
                                    </p>

                                    <a href="event?event_id=<?php echo $event['event_id']; ?>" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                                        Accéder à l'événement
                                    </a>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </aside>
        </div>
    </main>


</main>


<script src="node_modules/flowbite/dist/flowbite.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#attend-button').on('click', function() {
            var eventId = $(this).data('event-id');

            $.ajax({
                url: './php/events/rsvp_event.php',
                type: 'POST',
                data: {
                    event_id: eventId,
                    status: 'attending'
                },
                success: function(response) {
                    alert(response);
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred: ' + error);
                    console.error('Response: ' + xhr.responseText);
                    alert('An error occurred: ' + error);
                }
            });
        });
    });
</script>

</body>

</html>