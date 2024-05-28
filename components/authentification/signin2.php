<div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
    <a href="index.php" class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
        <img src=".\asset\images\Logo\ofppt-logo.png" class="mr-4 h-11">
        <span>Copains d'avant</span>
    </a>
    <!-- Card -->
    <div class="items-center justify-center w-full bg-white rounded-lg shadow lg:flex md:mt-0 lg:max-w-screen-lg 2xl:max:max-w-screen-lg xl:p-0 dark:bg-gray-800">
        <div class="hidden w-2/3 lg:flex">
            <img class="rounded-l-lg" src="https://images.unsplash.com/photo-1565034946487-077786996e27?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="login image">
        </div>
        <div class="w-full p-6 space-y-8 sm:p-8 lg:p-16 lg:py-0">
            <h2 class="text-2xl font-bold text-gray-900 lg:text-3xl dark:text-white">
                Connectez-vous
            </h2>
            <form class="mt-8 space-y-6" action="./php/signin2.php" method="POST">
                <div>
                    <label for="matricule" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matricule</label>
                    <input type="text" name="matricule" id="matricule" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="matricule" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                </div>
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" aria-describedby="remember" name="remember" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="remember" class="font-medium text-gray-900 dark:text-white">Remember me</label>
                    </div>
                </div>
                <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Connecter à Copains d'avant</button>

            </form>

        </div>
    </div>
</div>