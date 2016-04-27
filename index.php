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
            <?php
                include 'views/web-footer.php';
            ?>
        </footer>
        <!--Footer-->
        <a href="javascript:;" id="toTop"></a>
        <div id="cover"></div>
        <script>
            window.onload =  function(){
                getAttempts(1);
                getAttempts(2);
                getAttempts(3);
            };

            $(document).ready(function() {
                $( window ).scroll(function() {
                    var scroll = $(window).scrollTop();
                    if(scroll > 20){
                        $('#toTop').show();
                        $('#toTop').click(function(e){
                            e.preventDefault();
                            $('html,body').stop(true, false).animate ({scrollTop:0}, 500);
                        });
                    }else{
                        $('#toTop').hide();
                    }
                });
            });
        </script>
    </body>
</html>
