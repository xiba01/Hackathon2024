<?php
if (isset($_GET['article_id'])) {
    $article_id = $_GET['article_id'];

    try {
        $sql = "SELECT a.*, l.* 
                FROM Article a 
                JOIN Laureat l ON a.article_by = l.Identifiant
                WHERE a.article_id = :article_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->execute();

        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($article) {
?>

            <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
                <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                    <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                        <header class="mb-4 lg:mb-6 not-format">
                            <address class="flex items-center mb-6 not-italic">
                                <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                    <img class="mr-4 w-16 h-16 rounded-full" src="./asset/images/laureat<?php echo $article['img']; ?>" alt="Jese Leos">
                                    <div>
                                        <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white"><?php echo $article['nom'] . ' ' . $article['Prenom']; ?></a>
                                        <p class="text-base text-gray-500 dark:text-gray-400"><?php echo $article['Fonction']; ?></p>
                                        <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                                    </div>
                                </div>
                            </address>
                        </header>
                        <h1 class=" text-4xl font-bold"><?php echo $article['article_titre']; ?></h1>
                        <p class=" my-5 text-xl font-normal text-gray-600"><?php echo $article['article_content1']; ?></p>
                        <figure class="mt-1"><img src="./asset/images/articles/<?php echo $article['article_intro_img']; ?>" alt="">
                            <figcaption class="mt-5 mx-auto text-md font-normal text-gray-500">Digital art by Anonymous</figcaption>
                        </figure>
                        <h2 class=" mt-8 text-2xl font-bold"><?php echo $article['article_section1']; ?></h2>
                        <p class=" mt-4 mb-7 text-lg font-normal text-gray-600"><?php echo $article['article_s1content']; ?></p>



                        <h2 class=" text-2xl font-bold"><?php echo $article['article_section2']; ?></h2>
                        <p class=" mt-4 mb-7 text-lg font-normal text-gray-600"><?php echo $article['article_s2content']; ?></p>


                        <h2 class=" mt-4 text-2xl font-bold"><?php echo $article['article_section3']; ?></h2>
                        <p class="text-lg font-normal text-gray-600"><?php echo $article['article_s3content']; ?></p>



                        <h3 class=" mt-10 text-4xl font-bold">Conclusion</h3>
                        <p class=" mt-4 text-xl font-normal text-gray-600">Before going digital, you might benefit from scribbling down some ideas in a sketchbook. This way,
                            you can think things through before committing to an actual design project.</p>

                        </section>
                    </article>
                </div>
            </main>

            <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
                <div class="px-4 mx-auto max-w-screen-xl">
                    <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Autres articles</h2>
                    <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                        <?php $sql = "SELECT * FROM Article LIMIT 4";
                        $articles = $db->prepare($sql);
                        $articles->execute();


                        while ($article = $articles->fetch(PDO::FETCH_ASSOC)) {

                        ?>

                            <article class="max-w-xs">
                                <a href="article?article_id=<?php echo $article['article_id']; ?>">
                                    <img src=" ./asset/images/articles/<?php echo $article['article_intro_img']; ?>" class="mb-5 rounded-lg" alt="">
                                </a>
                                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                                    <a href="#"><?php echo $article['article_titre']; ?></a>
                                </h2>
                                <p class="mb-4 text-gray-500 dark:text-gray-400"><?php echo $article['article_content1']; ?></p>
                                <a href="article?article_id=<?php echo $article['article_id']; ?>" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                                    Lire cette article
                                </a>
                            </article>

                        <?php } ?>

                    </div>
                </div>
            </aside>


            <footer class="bg-gray-50 dark:bg-gray-800 antialiased">
                <div class="p-4 py-6 mx-auto max-w-screen-xl md:p-8 lg:p-10">

                    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
                    <div class="text-center">
                        <a href="#" class="flex justify-center items-center mb-5 text-2xl font-semibold text-gray-900 dark:text-white">
                            <img class="mr-2 h-8" src="./asset/images/logo/ofppt-logo.png" alt="">
                            OfpptCA
                        </a>
                        <span class="block text-sm text-center text-gray-500 dark:text-gray-400">© 2021-2022 <a href="#" class="hover:underline">OfpptCA</a>. All Rights Reserved.
                        </span>
                        <ul class="flex justify-center mt-5 space-x-5">
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path fill="currentColor" d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>


<?php
        } else {
            echo "No article found with the given ID.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $db = null; // Close the dmbase connection
} else {
    echo "No article ID specified.";
}
?>