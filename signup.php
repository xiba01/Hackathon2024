<?php include './components/header.php'; ?>

<script>
    function showStep(step) {
        var steps = document.getElementsByClassName('step');
        for (var i = 0; i < steps.length; i++) {
            steps[i].style.display = 'none';
        }
        document.getElementById(step).style.display = 'block';
    }

    function nextStep(current, next) {
        document.getElementById(current).style.display = 'none';
        document.getElementById(next).style.display = 'block';
    }

    // Initially show the first step
    document.addEventListener("DOMContentLoaded", function() {
        showStep('step1');
    });
</script>

<main>
    <section class="py-8 bg-white dark:bg-gray-900 lg:py-0">
        <div class="lg:flex">
            <?php include './components/authentification/signup/signupside.php'; ?>

            <form class="m-auto" id="mainForm" action="./php/signup.php" method="post" enctype="multipart/form-data">

                <div id="step1" class="step">
                    <?php include('components/authentification/signup/signup1.php'); ?>
                </div>

                <div id="step2" class="step" style="display: none;">
                    <?php include('components/authentification/signup/signup2.php'); ?>
                </div>

                <div id="step3" class="step" style="display: none;">
                    <?php include('components/authentification/signup/signup3.php'); ?>
                </div>

                <div id="step4" class="step" style="display: none;">
                    <?php include('components/authentification/signup/signup-confirm.php'); ?>
                </div>
            </form>
        </div>
    </section>
</main>

<script src="node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>