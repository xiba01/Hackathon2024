<div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900">
    <a href="index.php" class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
        <img src=".\asset\images\Logo\ofppt-logo.png" class="mr-4 h-11">
        <span>Copains d'avant</span>
    </a>
    <!-- Card -->
    <div class=" py-16 items-center justify-center w-full bg-white rounded-lg shadow lg:flex md:mt-0 lg:max-w-screen-lg 2xl:max:max-w-screen-lg xl:p-0 dark:bg-gray-800">
        <div class="hidden w-2/3 h-full lg:flex">
            <img class="rounded-l-lg" src="/images/authentication/create-account.jpg" alt="signup image">
        </div>
        <div class="w-full p-6 space-y-8 sm:p-8 lg:p-16">
            <h2 class="text-2xl font-bold text-gray-900 lg:text-3xl dark:text-white">
                Créer votre compte
            </h2>
            <form class="mt-8 space-y-6" action="./php/signup.php" method="POST" onsubmit="return validateForm()">
                <div class="flex flex-row justify-between">
                    <div>
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                        <input type="text" name="nom" id="nom" placeholder="Votre nom" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    <div>
                        <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prenom</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Votre prenom" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="lauréat@email.com" required>
                </div>
                <div class="flex flex-row justify-between">
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmer votre mot de passe</label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                </div>
                <div class="flex flex-row justify-between">
                    <div>
                        <label for="promotion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Promotion</label>
                        <input type="text" name="promotion" id="promotion" placeholder="Votre promotion" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    <div>
                        <label for="filiere" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisir un filliere</label>
                        <select name="filiere" id="filiere" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choisir un filliere</option>
                            <?php
                            $sql = 'SELECT * FROM Filiere';
                            $fillieres = $db->prepare($sql);
                            $fillieres->execute();
                            while ($filliere = $fillieres->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $filliere['CodeF']; ?>"><?php echo $filliere['LibelleF']; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="flex flex-row justify-between">
                    <div>
                        <label for="etablissement" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choisir un etablissement</label>
                        <select name="etablissement" id="etablissement" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choisir un choisir un etablissement</option>
                            <?php
                            $sql = 'SELECT * FROM EFP';
                            $etablissements = $db->prepare($sql);
                            $etablissements->execute();
                            while ($etablissement = $etablissements->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $etablissement['CodeE']; ?>"><?php echo $etablissement['LibelleE']; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <label for="tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tel</label>
                        <input type="text" name="tel" id="tel" placeholder="Votre tel" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                </div>
                <div class="flex flex-row justify-between">
                    <div>
                        <label for="post-act" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poste actuel</label>
                        <input type="text" name="post-act" id="post-act" placeholder="Votre poste actuel" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    <div>
                        <label for="entreprise" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Entreprise</label>
                        <input type="text" name="entreprise" id="entreprise" placeholder="Votre entreprise" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                </div>




                <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Créer un nouveau compte</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                    Vous avez déjà un compte? <a href="signin.php" class="text-primary-700 hover:underline dark:text-primary-500">Connectez-vous ici</a>
                </div>
            </form>

            <script>
                function validateForm() {
                    var password = document.getElementById("password").value;
                    var confirmPassword = document.getElementById("confirm-password").value;
                    if (password !== confirmPassword) {
                        alert("Les mots de passe ne correspondent pas.");
                        return false;
                    }
                    return true;
                }
            </script>


        </div>
    </div>
</div>