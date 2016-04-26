<article id="p1" class="problem row">
    <div id="p1_content" class="problem-content col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
        <p><b>Q1.</b>Calculate a number's largest prime factor (<i id="p1_attempts">attempts</i>).</p>
        <div class="form-group">
            <label for="p1Input">Type in a number</label>
            <div class="input-group">
                <input type="text" class="form-control" id="p1Input" placeholder="Type in a number">
                <div class="input-group-addon">
                    <a href="javascript:;" onclick="showP1Answer()">Show Answer</a>
                </div>
            </div>
        </div>

        <div class="answer col-xs-12">
            <b id="p1_answer" class="check-area blur-answer" title="Show answer">Click to see the right answer</b>
        </div>

        <div class="explain-indicator">
            <b><a href='javascript:;' onclick="showExplain('p1')">see explanation</a></b>
        </div>

        <div class="question-icon"></div>
    </div>

    <aside id="p1_explain" class="analysis hidden col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
        <div id="p1_solution" class="problem-explain">
            <div class="analysis-detail">
                <p>A number is the multiple of several prime factors.
                    <img src="assets/images/primes-analysis.jpg" alt="multiple of prime factors" />
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
            <div class="close-icon" title="close" onclick="closeExplain('p1')"></div>
        </div>
    </aside>
</article>