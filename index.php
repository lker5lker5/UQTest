<!DOCTYPE html>
<html lang="en">
    <?php
        require 'views/head.php';
    ?>
    <body>
        <!--Web navigation-->
        <?php
            include 'views/web-nav.php';
        ?>
        <!--//Web navigation-->

        <!--Main content-->
        <section id="main_content" class="container">
            <?php
                // the section of calculating primes
                include 'views/largestPrime.php';

                // the section of calculating smallest multiple
                include 'views/smallestMultiple.php';

                // the section of calculating Nth prime number
                include 'views/nthPrime.php';
            ?>
        </section>
        <!--//main content-->

        <!--Footer-->
        <footer id="web_footer">
            <nav id="problem_list_footer">
                <ul>
                    <li><a href="index.html#p1">Largest Prime</a></li>
                    <li><a href="index.html#p2">Smallest Multiple</a></li>
                    <li><a href="index.html#p3">The Nth Prime</a></li>
                </ul>
            </nav>
        </footer>
        <!--Footer-->
        <script>
            window.onload =  function(){
                getAttempts(1);
                getAttempts(2);
                getAttempts(3);
            }
        </script>
    </body>
</html>
