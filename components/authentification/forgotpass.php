<div class="flex flex-col justify-center items-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
    <a href="index.php" class="flex justify-center items-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
        <img src=".\asset\images\Logo\ofppt-logo.png" class="mr-4 h-11">
        <span>Copains d'avant</span>
    </a>
    <!-- Card -->
    <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-screen-sm xl:p-0 dark:bg-gray-800">
        <div class="p-6 w-full sm:p-8 md:p-16">
            <h2 class="mb-3 text-2xl font-bold text-gray-900 lg:text-3xl dark:text-white">
                Mot de passe oublié
            </h2>
            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                Tapez votre email et nous vous enverrons un code pour réinitialiser votre mot de passe !
            </p>
            <form class="mt-8 space-y-6" action="#">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="lauréat@email.com" required>
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" aria-describedby="remember" name="remember" type="checkbox" class="w-4 h-4 bg-gray-50 rounded border-gray-300 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" required>
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="remember" class="font-medium text-gray-900 dark:text-white">J'accepte <a href="#" class="text-primary-700 hover:underline dark:text-primary-500">les termes et conditions</a></label>
                    </div>
                </div>
                <button type="submit" class="py-3 px-5 w-full text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Réinitialiser le mot de passe</button>
            </form>
        </div>
    </div>
</div>