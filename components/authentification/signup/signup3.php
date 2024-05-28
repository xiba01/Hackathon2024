<div class="flex items-center mx-auto md:w-[42rem] px-4 md:px-8 xl:px-0">
    <div class="w-full">
        <div class="flex items-center justify-center mb-8 space-x-4 lg:hidden">
            <a href="#" class="flex items-center text-2xl font-semibold">
                <img class="h-8 mr-2" src="./asset/images/Logo/ofppt-logo.png" />
                <span class="text-gray-900 dark:text-white">OfpptCA</span>
            </a>
        </div>
        <ol class="flex items-center mb-6 text-sm font-medium text-center text-gray-500 dark:text-gray-400 lg:mb-12 sm:text-base">
            <li class="flex items-center text-primary-600 dark:text-primary-500 sm:after:content-[''] after:w-12 after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                <div class="flex items-center sm:block after:content-['/'] sm:after:hidden after:mx-2 after:font-light after:text-gray-200 dark:after:text-gray-500">
                    <svg class="w-4 h-4 mr-2 sm:mb-2 sm:w-6 sm:h-6 sm:mx-auto shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    Info <span class="hidden sm:inline-flex">Personnelles</span>
                </div>
            </li>
            <li class="flex items-center text-primary-600 dark:text-primary-500 after:content-[''] after:w-12 after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
                <div class="flex items-center sm:block after:content-['/'] sm:after:hidden after:mx-2 after:font-light after:text-gray-200 dark:after:text-gray-500">
                    <svg class="w-4 h-4 mr-2 sm:mb-2 sm:w-6 sm:h-6 sm:mx-auto shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    Info <span class="hidden sm:inline-flex">d'études</span>
                </div>
            </li>
            <li class="flex items-center sm:block">
                <div class="mr-2 sm:mb-2 sm:mx-auto">3</div>
                Profession
            </li>
        </ol>
        <h1 class="mb-4 text-2xl font-extrabold tracking-tight text-gray-900 sm:mb-6 leding-tight dark:text-white">Détails sur votre profession</h1>
        <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Votre profession?</p>

        <ul class="mb-6 space-y-4 sm:space-y-6">
            <li>
                <input type="text" name="post-act" id="post-act" placeholder="Poste Actuel" class="block w-full p-5 text-bas text-gray-500 border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-primary-500 peer-checked:border-primary-600 peer-checked:text-primary-600 bg-gray-50 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                </input>
            </li>
            <li>
                <input type="text" name="entreprise" id="entreprise" placeholder="Entreprise" class="block w-full p-5 text-bas text-gray-500 border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-primary-500 peer-checked:border-primary-600 peer-checked:text-primary-600 bg-gray-50 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                </input>
            </li>
        </ul>


        <div class="flex space-x-3">
            <button type="button" onclick="nextStep('step3', 'step2')" class="text-center items-center w-full py-2.5 sm:py-3.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Précédent: Info d'études</button>
            <button type="button" onclick="nextStep('step3', 'step4')" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 sm:py-3.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Suivant: Cofirmation d'insription</button>
        </div>

        <p class="mt-4 text-sm font-light text-gray-500 dark:text-gray-400">
            Vous avez déjà un compte? <a href="signin.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Connectez-vous.</a>
        </p>

    </div>
</div>