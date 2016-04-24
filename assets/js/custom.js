// (function($){
//     $(function(){
//         $('#p1_answer').on('click', function(){
//             $.ajax({
//                 url:window.location.href.replace('index.html','') + '/dataHandler/controllers/getLargestPrimeFactor.php',
//                 success: function(result){
//                     $('#p1_answer')
//                 }
//             });
//         });
//     });
// })(jQuery);

function showAnswer(){
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if(4 == xmlHttp.readyState && 200 == xmlHttp.status){
            var response = xmlHttp.responseText;
        }
    }
    xmlHttp.open("GET", "../../dataHandler/controllers/getLargestPrimeFactor.php");
    xmlHttp.send();
}
