// (function($){
//     $(function(){
//         $('#p1_answer').on('click', function(){
//             $.ajax({
//                 url:window.location.href.replace('index.php','') + '/dataHandler/controllers/getLargestPrimeFactor.php',
//                 success: function(result){
//                     $('#p1_answer')
//                 }
//             });
//         });
//     });
// })(jQuery);

/**
 * The method of getting the number of attempts of a specific problem
 * @param pid: the id represents the problem
 */
function getAttempts(pid){
    var xmlHttp;
    if(window.XMLHttpRequest){
        xmlHttp = new XMLHttpRequest();
    }else{
        // for older browsers
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlHttp.onreadystatechange = function(){
        if(4 == xmlHttp.readyState && 200 == xmlHttp.status){
            document.getElementById('p'+ pid + '_attempts').innerHTML = xmlHttp.responseText + " attempts";
        }
    };
    xmlHttp.open("GET", window.location.href.replace('index.php','') + "dataHandler/controllers/getProblemAttempts.php?pid=" + pid,true);
    xmlHttp.send();
}

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
                proAns.innerHTML =  "The largest prime factor of " + value +" is <i style='text-decoration: underline;color: darkred'>" + result.result + "</i>." +
                    " The total execution time is <i style='text-decoration: underline;color: darkred'>" + result.time + "</i>.";
                proAns.classList.remove('blur-answer');
                console.log(result.insertInfo);
            }
        };
        xmlHttp.open("GET", window.location.href.replace('index.php','') + "dataHandler/controllers/getLargestPrimeFactor.php?number=" + value,true);
        xmlHttp.send();
    }else{
        alert("Number only");
    }
}

/**
 * Show several numbers' smallest multiple, and there are two cases
 * 1. some random numbers
 * 2. a series of numbers (e.g. 1,3,5,7)
 * @param id: indicators of telling it is a random input or a sequence input
 */
function showP2Answer(id){
    if(id === 1){
        var input = document.getElementById('p2Input_random').value;
        var value = input.replace(/\s/g, '');
        var tester = /[0-9]*[\-]*/;
        if(tester.test(value)){
            var xmlHttp;
            if(window.XMLHttpRequest){
                xmlHttp = new XMLHttpRequest();
            }else{
                // for older browsers
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlHttp.onreadystatechange = function() {
                var target = document.getElementById('p2_answer');
                var result = JSON.parse(xmlHttp.responseText);
                target.innerHTML = "The smallest multiple of input is <i style='text-decoration: underline;color: darkred'>" + result.result + "</i>." + " The total execution time is <i style='text-decoration: underline;color: darkred'>" + result.time + "</i>.";
                target.classList.remove("blur-answer");
                console.log(result.insertInfo);
            };
            xmlHttp.open("GET", window.location.href.replace('index.php','') + "dataHandler/controllers/getSmallestMultipleRandom.php?input=" + value,true);
            xmlHttp.send();
        }else{
            alert("Invalid! Format: Two numbers are separated by a dash!");
        }
    }else if(id === 2){
        var start = Number(document.getElementById('startNum').value.trim());
        var quan = Number(document.getElementById('quantity').value.trim());
        var inc = Number(document.getElementById('increment').value.trim());

        if( quan <= 0) {
            alert("Quantity number should be a integer greater than 0.");
        }
        if((!Number.isInteger(quan)) || (!Number.isInteger(start)) || (!Number.isInteger(inc))) {
            alert("Accepts integers only!");
        }

        var xmlHttp;
        if(window.XMLHttpRequest){
            xmlHttp = new XMLHttpRequest();
        }else{
            // for older browsers
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlHttp.onreadystatechange = function () {
            var target = document.getElementById('p2_answer');
            var result = JSON.parse(xmlHttp.responseText);
            target.innerHTML = "The smallest multiple of input is <i style='text-decoration: underline;color: darkred'>" + result.result + "</i>." + " The total execution time is <i style='text-decoration: underline;color: darkred'>" + result.time + "</i>.";
            target.classList.remove("blur-answer");
            console.log(result.insertInfo);
        };
        xmlHttp.open("GET", window.location.href.replace('index.php','') + "dataHandler/controllers/getSmallestMultipleSequence.php?start=" + start + "&quan=" + quan + "&inc=" + inc, true);
        xmlHttp.send();
    }

}

/**
 * Click and shows the analysis
 * @param id: problem id
 */
function showExplain(id){
    var explain = document.getElementById(id + "_explain");
    if(explain.classList.contains('hidden')) {
        explain.classList.remove('hidden');
        explain.classList.add('bounce');
    }
}

/**
 * Close corresponding explain section
 * @param id: indicator of problem
 */
function closeExplain(id){
    var explain = document.getElementById(id + "_explain");
    if(!explain.classList.contains('hidden')) {
        explain.classList.add('hidden');
        explain.classList.remove('bounce');
    }
}