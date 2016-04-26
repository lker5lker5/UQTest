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
                    So what we need to do is to decompose each number recording the occurrences of each prime of that number;
                    then, we need to compare among them and find the highest occurrences of each prime appeared, and the result
                    is the multiple of exponentiation.
                </p>
<pre><code class="code">
<b>function</b> getPrimeAndOccurrence($number){
    $return = <b>getPrimeNumber</b>($number); <i>// see previous snippet</i>
    $result = array();
    <b>for</b>($i = 0; $i < count($return); $i++){ <i>examine returns one by one</i>
        <b>if</b> (array_key_exists($return[$i],$result)){
            <i>//if a number has appeared, occurrence need to increase one</i>
            $result[$return[$i]] += 1;
        }<b>else</b>{
            <i>//if not, set the occurrence to 1</i>
            $result[$return[$i]] = 1;
        }
    }
    <b>return</b> $result;
}

// this snippet is used for dealing with the result
<b>for</b>($i = 0; $i < count($numbers); $i++){
    $current = getPrimeAndOccurrence($numbers[$i]); <i>see above</i>
    <b>foreach</b> ($current <b>as</b> $key => $value) {
        <b>if</b> (array_key_exists($key, $result)) {
            <b>if</b> ($result[$key] < $value)
                <i>//always update to store the prime with highest occurrence</i>
                $result[$key] = $value;
            <b>else</b>
                <i>//set the occurrence to one if it appears as 1st time</i>
                $result[$key] = 1;
        }
    }

    $smallestMultiple = 1;
    <b>foreach</b>($result <b>as</b> $key => $value){
        <i>//multiple the exponentiation</i>
        $smallestMultiple *= <b>pow</b>($key, $value);
    }
}
</code></pre>
            </div>
            <div class="answer-icon"></div>
            <div class="close-icon" title="close" onclick="closeExplain('p2')"></div>
        </div>
    </aside>
</article>