<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiragana Test</title>
    <style>
        .invisible {
            display: none;
        }
        .label.invisible {
            display: none !important;
        }
        .hiragana-button {
            background-color: gray !important;
        }

        .highlight {
            background-color: #444 !important;
        }
        .match-feedback {
            color: green;
        }
        .mismatch-feedback {
            color: red;
        }
    </style>
</head>
<body>
    <h1 class="text-white" style="color: white !important; font-size: 1.5rem; margin-bottom: 50px;">Chose the right sound for the character shown below</h1>
    <div>
        <label id="hiraganaCharacter" for="hiraganaCharacter" class="text-white" style="color: white !important; font-size: 3rem; margin-bottom: 50px;"> {{ $hiragana->character }}</label>
    </div>
    
    @foreach ($randomSounds as $index => $sound)
        <button 
            class="hiragana-button font-semibold text-gray-600 bg-gray-500 rounded-lg px-6 py-3 mt-20 mb-10"
            data-sound="{{ $sound }}"
            style="color: white !important; font-size: 1rem; margin-top: 2rem !important; margin-bottom: 1.5rem !important;"
        >
            {{ $sound }}
        </button>
    @endforeach


    <div>
        <button id="check-button" class="font-semibold text-gray-600 bg-gray-500 rounded-lg px-6 py-3" style="color: white !important; font-size: 1rem; background-color: gray !important;">Check</button>
        <div id="feedback"></div>
    </div>

        <!------------------------>
    <div>
        <label class="invisible" id="expLossLabel"><span id="lostExperienceValue">0</span></label>
    </div>
    <div>
        <label class="invisible" id="mistakesLabel"><span id="mistakesValue">0</span></label>
    </div>

    <script>
    var expLoss = 0;
    var mistakes = 0;
    var buttons = document.querySelectorAll('.hiragana-button');
    var checkButton = document.getElementById('check-button');
    var correctSound = '{{ $hiragana->sound }}';
    var feedbackGiven = false;

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                if (!feedbackGiven) {
                    buttons.forEach(function (btn) {
                        btn.classList.remove('highlight');
                    });

                    this.classList.add('highlight');
                }
            });
        });


    checkButton.addEventListener('click', function () {
        var selectedButton = document.querySelector('.hiragana-button.highlight');
        var feedbackDiv = document.getElementById('feedback');

        if (selectedButton) {
            var selectedSound = selectedButton.getAttribute('data-sound');

            if (selectedSound === correctSound) {
                feedbackDiv.textContent = 'Correct!';
                feedbackDiv.className = 'match-feedback';
            } else {
                feedbackDiv.textContent = 'Incorrect! The right answer is: ' + correctSound;
                feedbackDiv.className = 'mismatch-feedback';

                mistakes++;
                mistakesLabel.textContent = mistakes;
                expLoss+= 15;
                expLossLabel.textContent = expLoss;
            }

            feedbackGiven = true;

            // Disable all buttons and the Check button after feedback
            buttons.forEach(function (btn) {
                btn.disabled = true;
            });

            checkButton.disabled = true;
        } else {
            feedbackDiv.textContent = 'Please select a sound';
            feedbackDiv.className = 'mismatch-feedback';
        }
    });
    </script>
</body>
</html>
