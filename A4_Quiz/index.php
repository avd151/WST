<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>

<body>
    <div>
        <h1>Quiz Website</h1>
    </div>
    <!-- Take username input -->
    <div>
        <h4>Enter your name: &nbsp;
            <input type="text" id="username">&nbsp;&nbsp;
            <button type="submit" onclick="takeQuiz()" id="btnTake">Take Quiz</button>
        </h4>
    </div>

    <!-- Display Quiz -->
    <div id="quizDiv">

    </div>
    <!-- Display Result -->
    <div id="resultDiv">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script>
        function getResults() {
            $.ajax({
                url: 'result.php',
                type: 'POST',
                data: {
                    value: 'result'
                },
                success: function(result) {
                    $("#resultDiv").replaceWith(result);
                }
            });
        }
        getResults();
        var userName;

        function takeQuiz() {
            var name = $("#username").val();
            $("#quizDiv").replaceWith('<div id="quizDiv"></div>');
            if (name) {
                $("#resultDiv").hide();
                userName = name;
                $.ajax({
                    url: 'questions.php',
                    type: 'POST',
                    data: {
                        value: 'take',
                        name: userName
                    },
                    success: function(result) {
                        $("#quizDiv").replaceWith(result);
                    }
                });
            } else {
                getResults();
                $("#resultDiv").show();
            }

        }
    </script>
</body>

</html>