/**
 *
 */
(function($){
    $(function(){
        $('#p1_answer').on('click', function(){
            $.ajax({
                url:'/dataHandler/controllers/getLargestPrimeFactor.php',
                success: function(result){
                    alert(result);
                }
            });
        });
    });
})(jQuery);
