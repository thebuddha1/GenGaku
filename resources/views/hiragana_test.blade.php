<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="pressContainer">
        <label id="pressCountLabel" style="display:none;">Press count: 0/15</label>
        <button onclick="loadNextQuiz()" id="loadQuizButton">Next</button>
    </div>
    <div id="quizContainer">
        <h1>
            Press the next button to start the quiz
        </h1>
    </div>

    <div id="finalContainer" style="display:none;">
        <h1>
            Congratulations! You've completed 15 quizzes.
        </h1>
        <label id="experienceLable">your experience: </label>
        <div>
            <button onclick="redirectToQuiz()">Go to Quiz</button>
        </div>
    </div>

    <script>
        var isLoading = false;
        var pressCount = 0;
        var experience = 100;

        async function loadNextQuiz() {
            if (isLoading || pressCount >= 15) {
                return;
            }

            isLoading = true;
            pressCount++;

            var pressCountLabel = document.getElementById('pressCountLabel');
            pressCountLabel.style.display = 'block';
            pressCountLabel.textContent = 'Press count: ' + pressCount + '/15';

            var experienceLable = document.getElementById('experienceLable');
            experienceLable.textContent = 'You got ' + experience + ' experience from the test';

            if (pressCount === 15) {
                // Hide quiz container and show final container
                document.getElementById('quizContainer').style.display = 'none';
                document.getElementById('pressContainer').style.display = 'none';
                document.getElementById('finalContainer').style.display = 'block';
            } else {
                // Load the next quiz
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
        }

        function redirectToQuiz() {
            window.location.href = '/quiz';
        }
    </script>
</body>
</html>
