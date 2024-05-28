<?php
include './components/header_admin.php';
include 'components/sidebar.php';
$query = "SELECT 
Identifiant,
nom,
Prenom,
email,
Tel,
img,
promotion,
Fonction,
Employeur,
valide,
Filiere.LibelleF AS Filiere,
EFP.LibelleE AS Etablissement
FROM 
Laureat
INNER JOIN 
Filiere ON Laureat.Filiere = Filiere.CodeF
INNER JOIN 
EFP ON Laureat.Etablissement = EFP.CodeE
where Laureat.valide=1";
$t = $db->prepare($query);
$t->execute();
$laureats = $t->fetchall(PDO::FETCH_ASSOC);
?>
<main class="max-w-[1300px] mx-auto">
    <div class=" h-auto pt-13 ">
        <section class=" p-3 ">
            <div class="mx-auto max-w-screen-xl  ">
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <div class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                                </div>
                            </div>

                        </div>

                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

                            <button type="button" id='download' class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                        <path stroke-linejoin="round" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2" />
                                        <path d="M12 15.5V4" />
                                        <path stroke-linejoin="round" d="m8 12l4 4l4-4" />
                                    </g>
                                </svg>

                                Telecharger
                            </button>
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                                </svg>
                                Search By
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                    Columns
                                </h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                    <li class="flex items-center">
                                        <input id="apple" type="radio" value="nom" name="searchType" checked class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Nom
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="fitbit" type="radio" value="Etablissement" name="searchType" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Etablissement
                                        </label>
                                    </li>

                                    <li class="flex items-center">
                                        <input id="asus" type="radio" value="promotion" name="searchType" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="asus" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Promotion
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto min-h-[350px]">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>

                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        tel
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Promotion
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Filiere
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Etablissement
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="list_laureat">
                                <?php
                                foreach ($laureats as $key => $laureat) {
                                ?>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                        <th scope="row" class="px-6 py-4">
                                            <a href='profil_admin.php?email=<?= $laureat['email'] ?>' class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img class="w-10 h-10 rounded-full" src="<?= './asset/images/laureat/' . $laureat['img'] ?>" alt="">
                                                <div class="ps-3">
                                                    <div class="text-base font-semibold">
                                                        <?= $laureat['nom'] . ' ' . $laureat['Prenom'] ?></div>
                                                    <div class="font-normal text-gray-500"><?= $laureat['email'] ?></div>
                                                </div>
                                        </th>

                                        <td class="px-6 py-4">
                                            <?= $laureat['Tel'] ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $laureat['promotion'] ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $laureat['Filiere'] ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $laureat['Etablissement'] ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#search').on('input', function() {
                                    var selectedRadio = document.querySelector('input[name="searchType"]:checked');
                                    var searchType = selectedRadio ? selectedRadio.value : 'name';
                                    let query = $(this).val();
                                    $.ajax({
                                        url: './php/search_laureat.php',
                                        type: 'GET',
                                        data: {
                                            search: query,
                                            type: searchType
                                        },
                                        success: function(data) {
                                            $('#list_laureat').html('');
                                            let results = JSON.parse(data);
                                            results.forEach(function(result) {
                                                $('#list_laureat').append(`
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4">
                                            <a href='profil.php?email=${result.email}' class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img class="w-10 h-10 rounded-full" src="./asset/images/laureat/${result.img}" alt="Image">
                                                <div class="ps-3">
                                                    <div class="text-base font-semibold">${result.nom} ${result.Prenom}</div>
                                                    <div class="font-normal text-gray-500">${result.email}</div>
                                                </div>
                                            </a>
                                        </th>
                                        <td class="px-6 py-4">${result.Tel}</td>
                                        <td class="px-6 py-4">${result.promotion}</td>
                                        <td class="px-6 py-4">${result.Filiere}</td>
                                        <td class="px-6 py-4">${result.Etablissement}</td>
                                    </tr>
                                `);
                                            });
                                        }
                                    });

                                });
                                $('#download').on('click', function() {
                                    window.location.href = './php/download_laureat.php';
                                })
                            });
                        </script>
                    </div>

                </div>
            </div>
        </section>
    </div>
</main>
</div>
<?php include './components/footer_admin.php'; ?>