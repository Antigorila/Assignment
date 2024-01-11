@include('home')

<div class="container">
    <div class="card-kerd">
        <div class="card-body">
            <h4 class="card-title">{{ $task->assignment_title }}</h4>    
            <p class="card-text">{{ $task->description }}</p> 
            <p class="card-text" id="assignment"></p>
            <p id="result"></p>
            <hr>
            <form>
                <button type="button" class="btn btn-primary" onclick="checkAnswer()">Check</button>
                <button type="button" class="btn btn-primary" onclick="showAnswer()">Show answer</button>
            </form>
        </div>
    </div>
</div>
<script>
    function replaceAsteriskSequences(inputString) {
        var regex = /_+/g;
        var matches = inputString.match(regex);

        var resultString = inputString.replace(regex, function (match) {
            var inputElement = document.createElement('input');
            inputElement.type = 'text';
            inputElement.maxLength = match.length;
            inputElement.style.width = match.length + 3 +'ch';
            inputElement.title = "c";
            return inputElement.outerHTML;
        });

        document.getElementById("assignment").innerHTML = resultString;
    }

    var assignment = "{{ $task->assignment }}";
    replaceAsteriskSequences(assignment);

    function readTextAndInputs() {
        var paragraphElement = document.getElementById('assignment');

        var resultString = "";

        for (var i = 0; i < paragraphElement.childNodes.length; i++) {
            var node = paragraphElement.childNodes[i];

            if (node.nodeType === Node.TEXT_NODE) {
                resultString += node.textContent;
            } else if (node.nodeType === Node.ELEMENT_NODE && node.tagName === 'INPUT') {
                resultString += node.value;
            }
        }
        return resultString;
    }
    function checkAnswer()
        {
            var answer = "{{ $task->answer }}";
            if (answer.toString() === readTextAndInputs())
            {
                alert("Correct!");
            }
            else
            {
                alert("Wrong!");
            }
        }
    function showAnswer()
    {
        alert("{{ $task->answer }}");
    }
</script>
