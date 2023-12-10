@include('home')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $task->assignment_title }}</h4>    
            <p class="card-text">{{ $task->answer }}</p>
            <p class="card-text">{{ $task->description }}</p> 
            <p class="card-text" id="assignment"></p>
            <p id="result"></p>
            <hr>
            <form>
                <button type="button" class="btn btn-primary" onclick="checkAnswer()">Check</button>
                <button type="button" class="btn btn-primary">Show answer</button>
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
        // Get the paragraph element by its ID
        var paragraphElement = document.getElementById('assignment');

        // Initialize an empty string to store the result
        var resultString = "";

        // Iterate through child nodes of the paragraph
        for (var i = 0; i < paragraphElement.childNodes.length; i++) {
            var node = paragraphElement.childNodes[i];

            // Check if the node is a text node
            if (node.nodeType === Node.TEXT_NODE) {
                // Add the text content to the result string
                resultString += node.textContent;
            } else if (node.nodeType === Node.ELEMENT_NODE && node.tagName === 'INPUT') {
                // If the node is an input element, add its value to the result string
                resultString += node.value;
            }
        }

        // Display the result (you can also use it as needed)
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
                alert(answer);
                alert(readTextAndInputs());
            }
        }
</script>





