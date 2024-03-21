<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katakana Test</title>
    <style>
        .highlight {
            background-color: yellow;
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
    <h1>Katakana Test</h1>
    <div>
        <label id="katakanaCharacter" for="katakanaCharacter"> {{ $katakana->character }}</label>
    </div>
    
    @foreach ($randomSounds as $sound)
        <button class="katakana-button" data-sound="{{ $sound }}">{{ $sound }}</button>
    @endforeach
    <div>
        <button id="check-button">Check</button>
        <div id="feedback"></div>
    </div>

    <!------------------------>
    <div>
        <label id="expLossLabel"><span id="lostExperienceValue">0</span></label>
    </div>
    <div>
        <label id="mistakesLabel"><span id="mistakesValue">0</span></label>
    </div>

    <script>
        var expLoss = 0;
        var mistakes = 0;
        var buttons = document.querySelectorAll('.katakana-button');
        var checkButton = document.getElementById('check-button');
        var correctSound = '{{ $katakana->sound }}';
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
            var selectedButton = document.querySelector('.katakana-button.highlight');
            var feedbackDiv = document.getElementById('feedback');

            if (selectedButton) {
                var selectedSound = selectedButton.getAttribute('data-sound');

                if (selectedSound === correctSound) {
                    feedbackDiv.textContent = 'Match!';
                    feedbackDiv.className = 'match-feedback';
                } else {
                    feedbackDiv.textContent = 'Mismatch!';
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
