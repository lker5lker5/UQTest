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

var p1xmlHttp;
if(window.XMLHttpRequest){
    p1xmlHttp = new XMLHttpRequest();
}else{
    // for older browsers
    p1xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
}

p1xmlHttp.onreadystatechange = function(){
    if(4 == p1xmlHttp.readyState && 200 == p1xmlHttp.status){
        document.getElementById('p1_attempts').innerHTML = p1xmlHttp.responseText + " attempts";
    }
};
p1xmlHttp.open("GET", window.location.href.replace('index.html','') + "dataHandler/controllers/getProblemAttempts.php?pid=" + 1,true);
p1xmlHttp.send();

/**
 * Click and show the correct answer
 * @param id: the problem id
 */
function showAnswer(id){
    var input = document.getElementById(id + 'Input');
    var value = Number(input.value.trim());
    if(value === 0 || (!Number.isInteger(value))){
        alert("Please give a natural number other than 0.");
    }else if (value > Number.MAX_SAFE_INTEGER){
        alert("The number is too large!");
    }else if(Number.isInteger(value)){
        var xmlHttp;
        if(window.XMLHttpRequest){
            xmlHttp = new XMLHttpRequest();
        }else{
            // for older browsers
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlHttp.onreadystatechange = function(){
            if(4 == xmlHttp.readyState && 200 == xmlHttp.status){
                var result = JSON.parse(xmlHttp.responseText);
                var proAns = document.getElementById(id + '_answer');
//console.log(result);
                proAns.innerHTML =  "The largest prime factor of " + value +" is <i style='text-decoration: underline;color: darkred'>" + result.largest + "</i>." +
                    " The total execution time is <i style='text-decoration: underline;color: darkred'>" + result.time + "</i>.";
                proAns.classList.remove('blur-answer');
                insertAttempt(id.charAt(1),value,result.largest,result.time);
            }
        };
        xmlHttp.open("GET", window.location.href.replace('index.html','') + "dataHandler/controllers/getLargestPrimeFactor.php?number=" + value,true);
        xmlHttp.send();
    }else{
        alert("Number only");
    }
}

/**
 * Each attempt will be recorded
 * @param pid: the problem id
 * @param num: the input
 * @param ans: the answer of the input
 * @param time: the execution time of the program
 */
function insertAttempt(pid,num,ans,time){
    var xmlHttp;
    if(window.XMLHttpRequest){
        xmlHttp = new XMLHttpRequest();
    }else{
        // for older browsers
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlHttp.onreadystatechange = function(){
        if(4 == xmlHttp.readyState && 200 == xmlHttp.status){
            console.log(xmlHttp.responseText);
        }
    };
    xmlHttp.open("GET", window.location.href.replace('index.html','') + "dataHandler/models/insertAttemptInfo.php?pid=" + pid +
        "&num=" + num + "&ans=" + ans + "&time=" + time, true);
    xmlHttp.send();
}

/**
 * Click and shows the analysis
 * @param id: problem id
 */
function explain(id){

}