<?php
include './components/header_admin.php';
include 'components/sidebar.php';
$query = "SELECT 
    Identifiant,
    nom,
    Prenom,
    email,
    Tel,
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
    where Laureat.valide=0";
$t = $db->prepare($query);
$t->execute();
$laureats = $t->fetchall(PDO::FETCH_ASSOC);
?>
<main class="max-w-[1300px] mx-auto">
    <div class="p-4 h-auto pt-13 ">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <?php
                if (isset($_GET['refuser'])) {echo '
                    <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Alert!</span> La demande a etait refuser avec succes.
                    </div>
                </div>  ';
                }
                if (isset($_GET['accepter'])) {echo '<div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="font-medium">Success alert!</span> La demande a etait accepter avec succes.
                    </div>
                  </div>';
                }
                ?>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <div class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Search" required="">
                                </div>
                            </div>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <div class="flex items-center space-x-3 w-full md:w-auto">


                                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                    class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                        class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Order By
                                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                    </svg>
                                </button>
                                <div id="filterDropdown"
                                    class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">column</h6>
                                    <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                        <li class="flex items-center">
                                            <input id="apple" type="radio" name="order" value="nom" checked
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="apple"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">nom</label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="fitbit" type="radio" name="order" value="promotion"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="fitbit"
                                                class="flex ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                <svg class="w-[19px] h-[19px] text-gray-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2.1"
                                                        d="M12 6v13m0-13 4 4m-4-4-4 4" />
                                                </svg>
                                                <p>promotion</p>
                                            </label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="razor" type="radio" name="order" value="promotion_d"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="razor"
                                                class="flex ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"><svg
                                                    class="w-[19px] h-[19px] text-gray-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2.1"
                                                        d="M12 19V5m0 14-4-4m4 4 4-4" />
                                                </svg>
                                                Promotion</label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="nikon" type="radio" name="order" value="etab"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="nikon"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Etablissement</label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="benq" type="radio" name="order" value="fili"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="benq"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Filiere</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto min-h-[350px]">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                    <th scope="col" class="px-4 py-3">Email</th>
                                    <th scope="col" class="px-4 py-3">Tel</th>
                                    <th scope="col" class="px-4 py-3">Promotion</th>
                                    <th scope="col" class="px-4 py-3">Filiere</th>
                                    <th scope="col" class="px-4 py-3">Etablissement</th>
                                    <th scope="col" class="px-4 py-3 flex justify-center">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="list_demandes">
                                <?php
                        foreach ($laureats as $key => $laureat) {
                        ?>
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $laureat['nom'] . ' ' . $laureat['Prenom'] ?></th>
                                    <td class="px-4 py-3"><?= $laureat['email'] ?></td>
                                    <td class="px-4 py-3"><?= $laureat['Tel'] ?></td>
                                    <td class="px-4 py-3"><?= $laureat['promotion'] ?></td>
                                    <td class="px-4 py-3"><?= $laureat['Filiere'] ?></td>
                                    <td class="px-4 py-3"><?= $laureat['Etablissement'] ?> </td>
                                    <td class="px-4 py-3 flex items-center ">
                                        <a
                                            onclick="return confirm('Refuser ?')"href="php/refus_laureat.php?id=<?= $laureat['Identifiant'] ?>">
                                            <button type="button"
                                                class="mr-2 flex  items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                                Refuser
                                            </button>
                                        </a>
                                        <a onclick="return confirm('Accepter ?')"
                                            href="php/accept_laureat.php?id=<?= $laureat['Identifiant'] ?>">
                                            <button type="button"
                                                class="mr-2 flex  items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                                Accepter
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>



                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                function fetchAndRenderResults(query, orderType) {
                                    $.ajax({
                                        url: './php/search_demandes.php',
                                        type: 'GET',
                                        data: {
                                            search: query,
                                            order: orderType
                                        },
                                        success: function(data) {
                                            $('#list_demandes').html('');
                                            let results = JSON.parse(data);
                                            if (results.length > 0) {
                                                results.forEach(function(result) {
                                                    $('#list_demandes').append(`
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                ${result.nom} ${result.Prenom}</th>
                            <td class="px-4 py-3">${result.email}</td>
                            <td class="px-4 py-3">${result.Tel}</td>
                            <td class="px-4 py-3">${result.promotion}</td>
                            <td class="px-4 py-3">${result.Filiere}</td>
                            <td class="px-4 py-3">${result.Etablissement} </td>
                            <td class="px-4 py-3 flex items-center ">
                                <a onclick="return confirm('Refuser ?')" href="php/refus_laureat.php?id=${result.Identifiant}">
                                    <button type="button"
                                        class="mr-2 flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                        Refuser
                                    </button>
                                </a>
                                <a onclick="return confirm('Accepter ?')" href="php/accept_laureat.php?id=${result.Identifiant}">
                                    <button type="button"
                                        class="mr-2 flex items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                        Accepter
                                    </button>
                                </a>
                            </td>
                        </tr>
                        `);
                                                });
                                            } else {
                                                $('#list_demandes').append(
                                                    '<tr><td colspan="7" class="text-center py-3">No results found</td></tr>'
                                                    );
                                            }
                                        }
                                    });
                                }

                                $('#search').on('input', function() {
                                    var selectedRadio = document.querySelector('input[name="order"]:checked');
                                    var orderType = selectedRadio ? selectedRadio.value : 'nom';
                                    let query = $(this).val();
                                    fetchAndRenderResults(query, orderType);
                                });

                                $('input[name="order"]').on('change', function() {
                                    var selectedRadio = document.querySelector('input[name="order"]:checked');
                                    var orderType = selectedRadio ? selectedRadio.value : 'nom';
                                    let query = $('#search').val();
                                    fetchAndRenderResults(query, orderType);
                                });
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
