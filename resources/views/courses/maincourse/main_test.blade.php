<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="quizContainer">
        <h1>
            Press the next button to start the quiz
        </h1>
    </div>
    <div id="pressContainer">
        <label id="pressCountLabel" style="display:none;">Press count: 0/15</label>
        <button onclick="loadNextQuiz()" id="loadQuizButton">Next</button>
    </div>

    <div id="finalContainer" style="display:none;">
        <h1>
            Congratulations! You've completed 15 quizzes.
        </h1>
        <div>
            <label id="experienceLabel">your experience: </label>
        </div>
        <div>
            <label id="mistakesMainLabel">your mistakes: </label>
        </div>
        <div>
            <form action="{{ route('save-prog') }}" method="POST">
                @csrf
                <input type="hidden" id="experienceInput" name="experience" value="100">
                <input type="hidden" id="testProgressInput" name="testprog" value="1">
                <h5>Press the button below to save your progress and go back to the lessons</h5>
                <button type="submit">Back to lessons</button>
            </form>
        </div>
    </div>

    <script>
        //_______________________________________
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
        var lesson = getParameterByName('lesson');
        var chapter = getParameterByName('chapter');
        //______________________________________________
        var isLoading = false;
        var pressCount = 0;
        var experience = 100;
        var mistakes = 0;
        var testprogress = 1;

        async function loadNextQuiz() {
            document.getElementById('experienceInput').value = experience;
            if(mistakes > 2){
                testprogress = 0;
            }
            document.getElementById('testProgressInput').value = testprogress;
            
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
            } else {
                var quizNumber = Math.floor(Math.random() * 4) + 1;
                var quizContainer = document.getElementById('quizContainer');
                quizContainer.innerHTML = '';

                try {
                    var response;
                    if (quizNumber === 1) {
                        response = await fetch('/word1/' + chapter + '/' + lesson);
                    } else if (quizNumber === 2) {
                        response = await fetch('/word2/' + chapter + '/' + lesson);
                    } else if (quizNumber === 3) {
                        response = await fetch('/sentence1/' + chapter + '/' + lesson);
                    } else if (quizNumber === 4) {
                        response = await fetch('/sentence2/' + chapter + '/' + lesson);
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
        document.getElementById('quizContainer').addEventListener('click', checkButtonsLocked);
    </script>
</body>
</html>
