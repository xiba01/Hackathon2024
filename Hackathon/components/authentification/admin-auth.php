<section class="bg-gray-50 dark:bg-gray-900 px-auto h-full">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-20 lg:py-16 lg:grid-cols-12 h-full">

        <div class="mr-auto place-self-center lg:col-span-6">
            <img class="hidden mx-auto lg:flex" src="./asset/images/authentification/Database.png" alt="illustration">
        </div>
        <div class="w-full place-self-center lg:col-span-6">
            <div class="p-6 mx-auto bg-white rounded-lg shadow dark:bg-gray-800 sm:max-w-xl sm:p-8">
                <a href="#" class="inline-flex items-center mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                    <img class="h-8 mr-2" src="./asset/images/Logo/ofppt-logo.png" alt="logo">
                    OfpptCA
                </a>
                <h1 class="mb-2 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                    Connexion Administrateur
                </h1>
                <form class="space-y-4 md:space-y-6 mt-6" action="./php/signin2.php" method="POST">
                    <div>
                        <label for="matricule" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matricule</label>
                        <input type="email" name="matricule" id="matricule" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Tapez votre matricule" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                        <input type="password" name="password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Se souvenir de moi</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Connectez-vous en tant qu'administrateur</button>
                </form>
            </div>
        </div>
    </div>
</section>