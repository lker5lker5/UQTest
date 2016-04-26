<article id="p2" class="problem row">
    <div id="p2_content" class="problem-content col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
        <p><b>Q2.</b>Calculate a series of numbers' smallest multiple (<i id="p2_attempts">attempts</i>).</p>

        <!--Some random numbers-->
        <div class="form-group">
            <label for="p2Input_random">Type in some random numbers separated by dash(-)</label>
            <div class="input-group">
                <input type="text" class="form-control" id="p2Input_random" placeholder="number separated by dashes">
                <div class="input-group-addon">
                    <a href="javascript:;" onclick="showP2Answer(1)">Show Answer</a>
                </div>
            </div>
        </div>
        <!--//random numbers-->

        <!--a sequence of numbers-->
        <form class="form-horizontal">
            <div class="form-group">
                <label for="startNum" class="col-xs-2 control-label">Start No.</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="startNum" placeholder="The Start Number" />
                </div>
            </div>
            <div class="form-group">
                <label for="quantity" class="col-xs-2 control-label">Quantity</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="quantity" placeholder="The number of the sequence" />
                </div>
            </div>
            <div class="form-group">
                <label for="increment" class="col-xs-2 control-label">Increment</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="increment" placeholder="The Increment" />
                </div>
            </div>
            <div class="form-group">
                <div class="answer col-xs-10">
                    <b id="p2_answer" class="check-area blur-answer" title="Show answer">Click to see the right answer</b>
                </div>
                <div class="col-xs-2">
                    <input type="button" class="btn btn-primary" onclick="showP2Answer(2)" value="Show Ans." />
                </div>
            </div>
        </form>
        <!--//a sequence-->

        <div class="explain-indicator">
            <b><a href='javascript:;' onclick="showExplain('p2')">see explanation</a></b>
        </div>

        <div class="question-icon"></div>
    </div>

    <aside id="p2_explain" class="analysis hidden col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
        <div id="p2_solution" class="problem-explain">
            <div class="analysis-detail">
                <p>The calculation of the smallest multiple is shown in the picture .
                    <img src="assets/images/smallest-multiple.png" alt="the calculation of smallest multiple" />
                </p>
                <p>
                    So every time a prime is found, we can use the number divided by the first prime number to get the result,
                    and use the result divided the next prime until it cannot further decomposed.When the prime is found,
                    it is added into the result array. Finally, the last element of the array is the result of the question.
                </p>
<pre><code id="code">
<b>for</b>($i = 2; $i <= $number; $i++){
<b>while</b>($number != $i) {
<i>//a prime can only be divided exactly by 1 and itself;
    //remainder indicates that it can be further divided</i>
<b>if</b> (($number % $i)!= 0 )
break;
<b>array_push</b>($primeArray, $i);

<i>// assign the result to the original number</i>
$number = $number/$i;
}
}
array_push($primeArray, $number);
</code></pre>
            </div>
            <div class="answer-icon"></div>
            <div class="close-icon" title="close" onclick="closeExplain('p2')"></div>
        </div>
    </aside>
</article>