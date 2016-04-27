/**
 * When the input is focused, clear previous input values
 */
(function($){
    $(function(){
        $('#p1Input').focus(function(){
            resetP1Inputs();
        });

        $('#p3Input').focus(function(){
            resetP3Inputs();
        });

        $('#p2Input_random').focus(function(){
           resetP2Inputs();
        });

        $('#startNum').focus(function(){
            $('#p2Input_random').val('');
            $('#startNum').val('');

            // blur the answer area
            if(!$('#p2_answer').hasClass('blur-answer')) {
                $('#p2_answer').text("Click to see the right answer");
                $('#p2_answer').addClass("blur-answer");
                $('#p2_answer').removeClass("bounce");
                closeExplain('p2');
            }
        });

        $('#quantity').focus(function(){
            $('#p2Input_random').val('');
            $('#quantity').val('');

            // blur the answer area
            if(!$('#p2_answer').hasClass('blur-answer')) {
                $('#p2_answer').text("Click to see the right answer");
                $('#p2_answer').addClass("blur-answer");
                $('#p2_answer').removeClass("bounce");
                closeExplain('p2');
            }
        });

        $('#increment').focus(function(){
            $('#p2Input_random').val('');
            $('#increment').val('');

            // blur the answer area
            if(!$('#p2_answer').hasClass('blur-answer')) {
                $('#p2_answer').text("Click to see the right answer");
                $('#p2_answer').addClass("blur-answer");
                $('#p2_answer').removeClass("bounce");
                closeExplain('p2');
            }
        });
    });
})(jQuery);

/**
 * Showing the login popup window
 */
(function($){
    $(function(){
        $("#login_btn").on('click', function(){
            $('#cover').show();
            $("#admin_login").dialog({
                modal: true,
                draggable: true,
                resizable: false,
                //show: 'blind',
                //close: 'blind',
                width: 400,
                buttons: [
                    {
                        text: "Login",
                        "class":"btn btn-primary",
                        click: function() {
                            $('#info_indicator').css({"visibility":"hidden"});
                            $('#info_indicator').html("");
                            $.ajax({
                                url: window.location.href.replace(/\/index.*/g,'') + "/dataHandler/controllers/login.php",
                                type: 'POST',
                                data: $('#login_form').serialize(),
                                success:function(result) {
                                    console.log(result);
                                    if(result == 1){
                                        console.log('valid');
                                        window.location.href = window.location.href.replace(/\/index.*/g,'/admin.php');
                                    }else{
                                        $('#info_indicator').css({"visibility":"visible"});
                                        $('#info_indicator').html("<i>Not a valid username or password!</i>");
                                    }
                                }
                            });
                        }
                    },
                    {
                        text: "Cancel",
                        "class":"btn btn-default",
                        click: function() {
                            $(this).dialog('option','hide','explode');
                            $(this).dialog("close");
                            $('#cover').hide();
                        }
                    }
                ],
                close: function(){
                    $("#cover").hide();
                    $(this).dialog("close");
                    $('#cover').hide();
                }
            });
        });
    });
})(jQuery);

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
    xmlHttp.open("GET", window.location.href.replace(/\/index.*/g,'') + "/dataHandler/controllers/getProblemAttempts.php?pid=" + pid,true);
    xmlHttp.send();
}

/**
 * Click and show the correct answer
 */
function showP1Answer(){
    var input = document.getElementById('p1Input');
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
                getAttempts(1);
                resetExceptCurrent(1);
                var result = JSON.parse(xmlHttp.responseText);
                var proAns = document.getElementById('p1_answer');
//console.log(result);
                proAns.innerHTML =  "The largest prime factor of " + value +" is <i style='text-decoration: underline;color: darkred'>"
                    + result.result + "</i>." + " The total execution time is <i style='text-decoration: underline;color: darkred'>"
                    + result.time + "</i>s.";
                proAns.classList.remove('blur-answer');
                console.log(result.insertInfo);
            }
        };
        xmlHttp.open("GET", window.location.href.replace(/\/index.*/g,'') + "/dataHandler/controllers/getLargestPrimeFactor.php?number=" + value,true);
        xmlHttp.send();
    }else{
        alert("Number only");
    }
}

/**
 * Show several numbers' smallest multiple, and there are two cases
 * 1. some random numbers
 * 2. a series of numbers (e.g. 1,3,5,7)
 * @param: indicators of telling it is a random input or a sequence input
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
                getAttempts(2);
                resetExceptCurrent(2);
                var target = document.getElementById('p2_answer');
                var result = JSON.parse(xmlHttp.responseText);
                target.innerHTML = "The smallest multiple of input is <i style='text-decoration: underline;color: darkred'>"
                    + result.result + "</i>." + " The total execution time is <i style='text-decoration: underline;color: darkred'>"
                    + result.time + "</i>s.";
                target.classList.remove("blur-answer");
                console.log(result.insertInfo);
            };
            xmlHttp.open("GET", window.location.href.replace(/\/index.*/g,'') +
                "/dataHandler/controllers/getSmallestMultipleRandom.php?input=" + value,true);
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
            getAttempts(2);
            resetExceptCurrent(2);
            var target = document.getElementById('p2_answer');
            var result = JSON.parse(xmlHttp.responseText);
            target.innerHTML = "The smallest multiple of input is <i style='text-decoration: underline;color: darkred'>"
                + result.result + "</i>." + " The total execution time is <i style='text-decoration: underline;color: darkred'>"
                + result.time + "</i>s.";
            target.classList.remove("blur-answer");
            console.log(result.insertInfo);
        };
        xmlHttp.open("GET", window.location.href.replace(/\/index.*/g,'') + "/dataHandler/controllers/getSmallestMultipleSequence.php?start="
            + start + "&quan=" + quan + "&inc=" + inc, true);
        xmlHttp.send();
    }

}

function showP3Answer(){
    var input = document.getElementById('p3Input');
    var value = Number(input.value.trim());
    if(value < 1 || (!Number.isInteger(value))){
        alert("Please give an integer greater than 0.");
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
                getAttempts(3);
                resetExceptCurrent(3);
                var result = JSON.parse(xmlHttp.responseText);
                var proAns = document.getElementById('p3_answer');
//console.log(result);
                proAns.innerHTML =  "The position of " + value + " in the prime's list is <i style='text-decoration: underline;color: darkred'>"
                    + result.result + "</i>." + " The total execution time is <i style='text-decoration: underline;color: darkred'>"
                    + result.time + "</i>s.";
                proAns.classList.remove('blur-answer');
                console.log(result.insertInfo);
            }
        };
        xmlHttp.open("GET", window.location.href.replace(/\/index.*/g,'') + "/dataHandler/controllers/getNthPrime.php?pos=" + value,true);
        xmlHttp.send();
    }else{
        alert("Number only! ");
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

/**
 * After click, the inputs of other two problems should be reset
 * @param pid
 */
function resetExceptCurrent(pid){
    if(pid === 1){
        resetP2Inputs();
        resetP3Inputs();
    }else if(pid === 2){
        resetP1Inputs();
        resetP3Inputs();
    }else if(pid === 3){
        resetP1Inputs();
        resetP2Inputs();
    }
}

/**
 * reset related info of problem 1
 */
function resetP1Inputs(){
    document.getElementById('p1Input').value = "";

    document.getElementById('p1_answer').innerHTML = "Click to see the right answer";
    document.getElementById('p1_answer').classList.add('blur-answer');

    if(!document.getElementById('p1_explain').classList.contains('hidden'))
        closeExplain('p1');
}

/**
 * reset related info of problem 2
 */
function resetP2Inputs(){
    // reset random input
    document.getElementById('p2Input_random').value = "";

    // reset sequence input
    document.getElementById('startNum').value = "";
    document.getElementById('quantity').value = "";
    document.getElementById('increment').value = "";

    // blur the answer area
    document.getElementById('p2_answer').innerHTML = "Click to see the right answer";
    document.getElementById('p2_answer').classList.add("blur-answer");

    if(!document.getElementById('p2_explain').classList.contains('hidden'))
        closeExplain('p2');
}

/**
 * reset related info of problem 2
 */
function resetP3Inputs(){
    document.getElementById('p3Input').value = "";

    document.getElementById('p3_answer').innerHTML = "Click to see the right answer";
    document.getElementById('p3_answer').classList.add('blur-answer');

    if(!document.getElementById('p3_explain').classList.contains('hidden'))
        closeExplain('p3');
}