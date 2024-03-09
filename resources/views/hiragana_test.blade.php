<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        
        <button onclick="loadNextQuiz()" id="loadQuizButton">Next</button>
    </div>
    <div id="quizContainer">
        <h1>
            Press the next button to start the quiz
        </h1>
    </div>

    <script>
        var isLoading = false;

        async function loadNextQuiz() {
            if (isLoading) {
                return;
            }

            isLoading = true;
            var quizNumber = Math.floor(Math.random() * 4) + 1;
            var quizContainer = document.getElementById('quizContainer');
            quizContainer.innerHTML = '';

            try {
                var response;
                if (quizNumber === 1) {
                    response = await fetch('/hiragana1');
                } else if (quizNumber === 2) {
                    response = await fetch('/hiragana2');
                } else if (quizNumber === 3) {
                    response = await fetch('/hiragana3');
                } else if (quizNumber === 4) {
                    response = await fetch('/hiragana4');
                }

                if (response.ok) {
                    var contentText = await response.text();
                    var content = document.createElement('div');
                    content.innerHTML = contentText;
                    quizContainer.appendChild(content);

                    var scripts = content.getElementsByTagName('script');
                    for (var i = 0; i < scripts.length; i++) {
                        eval(scripts[i].innerText);
                    }
                } else {
                    console.error('Failed to fetch quiz content.');
                }
            } finally {
                isLoading = false;
            }
        }
    </script>
</body>
</html>