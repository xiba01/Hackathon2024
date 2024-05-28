<!-- Block start -->
<div class="max-w-2xl mx-6 ">
    <?php
    $sql = 'SELECT 
            Souvenir_reply.*, 
            Laureat.nom, 
            Laureat.prenom, 
            Laureat.img,
            Laureat.fonction
        FROM 
            Souvenir_reply
        JOIN 
            Laureat ON Souvenir_reply.reply_by = Laureat.Identifiant
        WHERE 
            Souvenir_reply.reply_souvenir = :souvenir_id
        ORDER BY 
            Souvenir_reply.dateR DESC';

    $replies = $db->prepare($sql);
    $replies->bindParam(':souvenir_id', $souvenirId, PDO::PARAM_INT);
    $replies->execute();

    while ($reply = $replies->fetch(PDO::FETCH_ASSOC)) {
        $originalReplyTime = $reply['dateR'];
        $RdateTime = new DateTime($originalReplyTime);
        $formattedReplyTime = $RdateTime->format('d F \a\t h:i A');
    ?>
        <article class="p-6 mb-6 text-base bg-gray-50 rounded-lg dark:bg-gray-700">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img class="mr-2 w-6 h-6 rounded-full" src="./asset/images/laureat/<?php echo $laureat_signed['img']; ?>" alt="Michael Gough"><?php echo $reply['nom'] . ' ' . $reply['prenom']; ?></p>
                    <p class="text-sm text-gray-600 dark:text-gray-400"><?php echo $formattedReplyTime; ?></p>
                </div>
                <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-gray-50 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600" type="button">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownComment1" class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                        </li>
                    </ul>
                </div>
            </footer>
            <p class="text-gray-500 dark:text-gray-400"><?php echo $reply['reply_text']; ?></p>
            <div class="flex items-center mt-4 space-x-4">
                <button type="button" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                    <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                    </svg>
                    Reply
                </button>
            </div>
        </article>
    <?php } ?>
</div>
<!-- Block end -->