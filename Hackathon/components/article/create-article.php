<form action="./php/create-article.php" method="post" enctype="multipart/form-data">

    <ol class="relative border-s border-gray-200 dark:border-gray-700">
        <li class="mb-10 ms-6">
            <span class="absolute flex items-center justify-center  w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </span>
            <h3 class="flex items-center mb-1 ml-4 text-lg font-semibold text-gray-900 dark:text-white">Introduction/Aperçu<span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">Obligratoire</span></h3>
            <div class="mb-2">
                <input type="text" id="article_titre" name="article_titre" placeholder="Titre" class="block border-none outline-none w-full p-4 text-gray-900 rounded-lg bg-transparent text-4xl" required>
            </div>



            <textarea id="message" name="message" rows="4" class=" mb-4 block p-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-none outline-none" placeholder="Tapez le contenu de l'Introduction ici..." required></textarea>


            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" name="article_img" class="hidden" />
                </label>
            </div>



        </li>
        <li class="mb-10 ms-6">
            <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </span>
            <h3 class="mb-1 text-lg font-semibold ml-4 text-gray-900 dark:text-white">Contenu Principal</h3>
            <div class="mb-">
                <input type="text" id="section1-titre" name="section1_titre" placeholder="Section 1" class="block border-none outline-none w-full p-4 text-gray-900 rounded-lg bg-transparent text-2xl">
            </div>



            <textarea id="section1-content" name="section1-content" rows="2" class=" mb-4 block p-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-none outline-none" placeholder="Tapez le contenu de section 1 ici..."></textarea>
            <div class="mb-">
                <input type="text" id="section2-titre" name="section2_titre" placeholder="Section 2" class="block border-none outline-none w-full p-4 text-gray-900 rounded-lg bg-transparent text-2xl">
            </div>



            <textarea id="section2-content" name="section2-content" rows="2" class=" mb-4 block p-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-none outline-none" placeholder="Tapez le contenu de section 2 ici..."></textarea>
            <div class="mb-">
                <input type="text" id="section3-titre" name="section3_titre" placeholder="Section 3" class="block border-none outline-none w-full p-4 text-gray-900 rounded-lg bg-transparent text-2xl">
            </div>



            <textarea id="section1-content" name="section3-content" rows="2" class=" mb-4 block p-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-none outline-none" placeholder="Tapez le contenu de section 3 ici..."></textarea>

        </li>
        <li class="ms-6">
            <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </span>
            <h3 class="mb-1 text-lg font-semibold ml-4 text-gray-900 dark:text-white">Conclusion/Résumé</h3>
            <textarea id="conclusion" name="conclusion" rows="3" class=" mb-4 block p-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-none outline-none" placeholder="Tapez le contenu du Conclusion ici..."></textarea>
        </li>

    </ol>
    <button type="submit" class="flex justify-between space-x-2 px-5 py-3 mt-10 text-base font-medium text-center items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
            <g fill="none">
                <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                <path fill="currentColor" d="m21.433 4.861l-6 15.5a1 1 0 0 1-1.624.362l-3.382-3.235l-2.074 2.073a.5.5 0 0 1-.853-.354v-4.519L2.309 9.723a1 1 0 0 1 .442-1.691l17.5-4.5a1 1 0 0 1 1.181 1.329ZM19 6.001L8.032 13.152l1.735 1.66L19 6Z" />
            </g>
        </svg>
        <p>Publier un nouvel article</p>
    </button>

</form>