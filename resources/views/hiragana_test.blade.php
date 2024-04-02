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
    <div>
        <label id="experienceLabel">your experience: </label>
    </div>
    <div>
        <label id="mistakesMainLabel">your mistakes: </label>
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
        <label id="experienceLabel">your experience: </label>
        <label id="mistakesMainLabel">your mistakes: </label>
        <div>
            <button onclick="redirectToQuiz()">Go to Quiz</button>
        </div>
    </div>

    <script>
        var isLoading = false;
        var pressCount = 0;
        var experience = 100;
        var mistakes = 0;

        async function loadNextQuiz() {
            if (isLoading || pressCount >= 16) {
                return;
            }

            isLoading = true;
            pressCount++;

            var pressCountLabel = document.getElementById('pressCountLabel');
            pressCountLabel.style.display = 'block';
            pressCountLabel.textContent = 'Press count: ' + pressCount + '/15';

            var experienceLabel = document.getElementById('experienceLabel');
            experienceLabel.textContent = 'You got ' + experience + ' experience from the test';

            var mistakesMainLabel = document.getElementById('mistakesMainLabel');
            mistakesMainLabel.textContent = 'You made ' + mistakes + ' mistakes throughout the test';

            document.getElementById('loadQuizButton').disabled = false;


            if (pressCount === 5) {
                document.getElementById('quizContainer').style.display = 'none';
                document.getElementById('pressContainer').style.display = 'none';
                document.getElementById('finalContainer').style.display = 'block';
                
                try {
                    const response = await fetch('/update-experience', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ experience: experience })
                    });

                    if (response.ok) {
                        console.log('Experience updated successfully.');
                    } else {
                        console.error('Failed to update experience.');
                    }
                } catch (error) {
                    console.error('Error updating experience:', error);
                }
            } else {
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

                            if (window.expLoss !== undefined) {
                                expLoss = window.expLoss;
                            }
                        }
                        
                        // Check buttons on quiz load
                        checkButtonsLocked();
                    } else {
                        console.error('Failed to fetch quiz content.');
                    }

                } finally {
                    isLoading = false;
                }
            }
            
        }

        function checkButtonsLocked() {
            var allButtonsLocked = true;
            var buttons = document.querySelectorAll('#quizContainer button');

            var expLossLabel = document.getElementById('expLossLabel');
            var expLoss = expLossLabel.textContent;
            
            var mistakeLabel = document.getElementById('mistakesLabel');
            var mistake = mistakeLabel.textContent;
            //console.log("mistakes before add:", mistakes);
            //console.log("number of mistakes in current quiz:", mistake);
            for (var i = 0; i < buttons.length; i++) {
                if (!buttons[i].disabled) {
                    allButtonsLocked = false;
                    break;
                }
            }
            if(allButtonsLocked === true){
                if(experience > 50){
                    experience = experience - expLoss;
                    if(experience < 50){
                        experience = 50;
                    }
                }
                mistakes += parseInt(mistake);
                //console.log("mistakes after add:", mistakes);
            }
            document.getElementById('loadQuizButton').disabled = !allButtonsLocked;
        }

        function redirectToQuiz() {
            window.location.href = '/hiragana-course';
        }

        document.getElementById('quizContainer').addEventListener('click', checkButtonsLocked);
    </script>
</body>
</html>
