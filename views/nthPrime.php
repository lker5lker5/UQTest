<article id="p3" class="problem row">
    <div id="p3_content" class="problem-content col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
        <p><b>Q3.</b>Calculate the Nth Prime Number (<i id="p3_attempts">attempts</i>).</p>
        <div class="form-group">
            <label for="p3Input">Get the Nth prime</label>
            <div class="input-group">
                <input type="text" class="form-control" id="p3Input" placeholder="Type in a number">
                <div class="input-group-addon">
                    <a href="javascript:;" onclick="showP3Answer()">Show Answer</a>
                </div>
            </div>
        </div>

        <div class="answer col-xs-12">
            <b id="p3_answer" class="check-area blur-answer" title="Show answer">Click to see the right answer</b>
        </div>

        <div class="explain-indicator">
            <b><a href='javascript:;' onclick="showExplain('p3')">see explanation</a></b>
        </div>

        <div class="question-icon"></div>
    </div>

    <aside id="p3_explain" class="analysis hidden col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
        <div id="p3_solution" class="problem-explain">
            <div class="analysis-detail">
                <p> If a number is prime, and it can be only divided exactly by 1 and itself.
                <p>
                    If a number is not a prime, and it must be the form of multiple of two numbers; in this case, between
                    these two smaller numbers, one of them must be smaller or equal to the square root of the original number.
                    For example, the square root of 100 is
                    <code class="code-inline">√100 = <mark>10</mark></code>:
                    <code class="code-inline">
                        100 = <b>2</b> * 50
                            = <b>4</b> * 25
                            = <b>5</b> * 20
                            = <b>10</b> * 10;
                    </code>
                    As you can see, one of the factor must be smaller or equal to the square root if the number is not a prime.
                </p>
<pre><code class="code">
<i>//The function is used to test whether a number is prime</i>
<b>function</b> isPrime($num){
    $sqrt = <b>floor</b>(<b>sqrt</b>($num)); <i>// get the square root</i>
    $isPrime = true;
    <i>//Test from 2 to the square root of the number</i>
    <b>for</b>($i = 2; $i <= $sqrt; $i++){
        if($num % $i == 0){
            $isPrime = false;
            return $isPrime;
        }
    }
    return $isPrime;
}

<i>//to store each prime into the list, and for the Nth, just get by index</i>
<b>for</b>($i = 3; count($primes) <= $position; $i++){
    <b>if</b>(<b>isPrime</b>($i))
        <b>array_push</b>($primes, $i);
}
</code></pre>
            </div>
            <div class="answer-icon"></div>
            <div class="close-icon" title="close" onclick="closeExplain('p3')"></div>
        </div>
    </aside>
</article>