<?php include 'components/profil/header.php'; ?>
<?php include 'components/profil/topnav.php'; ?>
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
        <div class="bg-white rounded-lg shadow-xl pb-8">
            <div class="w-full h-[250px]">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg" class="w-full h-full rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center mt-20">
                <img src="
                <?php 
                            if (!empty($laureat['img']) && file_exists($laureat['img'])) {
                                echo 'asset/images/'.$laureat['img'];
                            } else {
                                echo 'asset/images/profile0.webp';
                            }
                ?>
                " class="w-40 border-4 border-white rounded-full">
                <div class="flex items-center space-x-2 mt-2 p-3">
                    <p class="text-2xl"><?php echo $laureat['Prenom'] . ' ' . $laureat['nom']; ?></p>
                    
                </div>
                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                    <?php if (!empty($laureat['Fonction'])) {
                        echo $laureat['Fonction'];
                    } else {
                        echo 'rien pour le moment';
                    }?>
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
                    <div class="bg-white rounded-lg shadow-xl my-4 p-8">
                        <h4 class="text-xl text-gray-900 font-bold">Personal <span class="underline underline-offset-3 decoration-6 decoration-green-500">Infos</span></h4>
                        <ul class="mt-4 text-gray-700">
                            <li class="flex border-y py-2">
                                <span class="font-bold w-40 ">Nom Complet:</span>
                                <span class="text-gray-700"><?php echo $laureat['Prenom'] . ' ' . $laureat['nom']; ?></span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-40 ">Promotion:</span>
                                <span class="text-gray-700"><?php echo $laureat['promotion']; ?></span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-40 ">Filière:</span>
                                <span class="text-gray-700"><?php echo $laureat['Filiere']; ?></span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-40 ">Etablissement:</span>
                                <span class="text-gray-700"><?php echo $laureat['Etablissement']; ?></span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-40 ">Email:</span>
                                <span class="text-gray-700"><?php echo $laureat['email']; ?></span>
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-40 ">Telephone:</span>
                                <span class="text-gray-700"><?php echo $laureat['Tel']; ?></span>
                            </li>
                            <?php if (!empty($laureat['Fonction'])) { ?>
                                <li class="flex border-b py-2">
                                    <span class="font-bold w-40 ">Poste:</span>
                                    <span class="text-gray-700"><?php echo $laureat['Fonction']; ?></span>
                                </li>
                            <?php } ?>
                            <?php if (!empty($laureat['Employeur'])) { ?>
                                <li class="flex border-b py-2">
                                    <span class="font-bold w-40 ">Entreprise:</span>
                                    <span class="text-gray-700"><?php echo $laureat['Employeur']; ?>  </span>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="bg-white rounded-lg shadow-xl my-4 p-8">
                        <h4 class="text-xl text-gray-900 font-bold">Statut</h4>
                        <div class="grid grid-cols-1 lg:grid-cols-1 gap-8 mt-4">
                            <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                                <div class="flex items-center justify-between">
                                    <?php
                                    $query_souvenirs = "select count(photo) as count_photo , max(created_time) as earliest_created_time from Souvenir where id_laureat=:id";
                                    $pdostmt2 = $db->prepare($query_souvenirs);
                                    $pdostmt2->execute([
                                        "id"=>$laureat['Identifiant']
                                    ]);
                                    $souvenir = $pdostmt2->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <span class="font-bold text-sm text-indigo-600">Souvenirs</span>
                                    <span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">
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
                                    <svg class="w-12 h-12 p-2.5 bg-indigo-400 bg-opacity-20 rounded-full text-indigo-600 border border-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m3 16l5-7l6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1"/></svg>
                                    </div>
                                            <span class="text-2xl 2xl:text-3xl font-bold"><?php echo $souvenir['count_photo'] ;?></span>          
                                </div>
                            </div>
                            <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                                <div class="flex items-center justify-between">
                                    <?php
                                    $query_avis = "select count(avis) as count_avis , max(dateA) as earliest_dateA from Avis where identifiant=:id";
                                    $pdostmt3 = $db->prepare($query_avis);
                                    $pdostmt3->execute([
                                        "id"=>$laureat['Identifiant']
                                    ]);
                                    $avis = $pdostmt3->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <span class="font-bold text-sm text-green-600">Avis</span>
                                    <span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">
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
                                        <svg class="w-12 h-12 p-2.5 bg-green-400 bg-opacity-20 rounded-full text-green-600 border border-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 9H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h6m0-6v6m0-6l5.419-3.87A1 1 0 0 1 18 5.942v12.114a1 1 0 0 1-1.581.814L11 15m7 0a3 3 0 0 0 0-6M6 15h3v5H6z"/></svg>
                                    </div>                             
                                            <span class="text-2xl 2xl:text-3xl font-bold"><?php echo $avis['count_avis'] ;?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl my-4 p-8">
                    <h4 class="text-xl text-gray-900 font-bold">À propos</h4>
                    <p class="mt-2 text-gray-700">
                        <?php 
                            if (!empty($laureat['about'])) {
                                echo $laureat['about'];
                            } else {
                                echo '...';
                            }
                        ?>
                    </p>
                </div>
            </div>
            
        </div>
        <div class="bg-white rounded-lg shadow-xl p-8 my-4">
            <h4 class="text-xl text-gray-900 font-bold">Souvenirs</h4>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
                <?php
                    $query_post = "select photo,created_time from Souvenir where id_laureat=:id order by created_time";
                    $pdostmt4 = $db->prepare($query_post);
                    $pdostmt4->execute([
                        "id"=>$laureat['Identifiant']
                    ]);
                    $i=0;
                    $i1=0;
                    while ($post = $pdostmt4->fetch(PDO::FETCH_ASSOC)) {
                            $i++;
                        if ($i<=5) {
                            $i1++;
                ?>
                <div class="relative w-full pb-[150%]">
                    <img class="absolute top-0 left-0 w-full h-full rounded-lg" src="<?php echo 'asset/images/posts/'.$post['photo'] ;?>" alt="">
                </div>
                <?php }
                if($i>5) { ?>
                <div>
                <p class="text-base text-gray-400 dark:text-white"><?php echo "+". $i1 ."souvenirs" ;?></p>
                </div>
                    <?php
                    break;
                } 
            } ?>
            </div>

        </div>
        </div>
    </div>
    <?php } ?>
<?php include 'components/profil/footer.php'; ?>