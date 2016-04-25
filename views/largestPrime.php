<article id="p1" class="problem row">
    <div id="p1_content" class="problem-content col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
        <p><b>Q1.</b>Calculate a number's largest prime factor (<i id="p1_attempts">attempts</i>).</p>
        <div class="form-group">
            <label for="p1Input">Type in a number</label>
            <div class="input-group">
                <input type="text" class="form-control" id="p1Input" placeholder="Type in a number">
                <div class="input-group-addon">
                    <a href="javascript:;" onclick="showAnswer('p1')">Show Answer</a>
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
                    <img src="assets/images/primes_analysis.jpg" alt="multiple of prime factors" />
                </p>
            </div>
            <div class="answer-icon"></div>
            <div class="close-icon" title="close" onclick="closeExplain('p1')"></div>
        </div>
    </aside>
</article>