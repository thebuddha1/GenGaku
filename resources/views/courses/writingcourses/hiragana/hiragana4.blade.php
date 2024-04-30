<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .invisible {
            display: none !important;
        }
        .label.invisible {
            display: none !important;
        }
        .hiragana-button {
            background-color: gray !important;
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
    <div>
        <div style="margin-bottom: 10px;">
            <label for="hiraganaInput" class="text-white" style="color: white !important; font-size: 1.5rem; margin-bottom: 50px;">What is this sound:</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label class="text-white" style="color: white !important; font-size: 2rem; margin-bottom: 50px;">{{ $labelContent }}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label class="invisible" id="soundLabel" style="font-size: 20px;">{{ $characterLabelContent }}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <input type="text" id="hiraganaInput" name="hiraganaInput" style="width: 400px; padding: 10px; border-radius: 5px; text-align: center;">
        </div>
    </div>

    <div>
        <div style="margin-bottom: 10px;">
            @foreach ($buttonContent as $button)
                <button 
                    class="hiragana-button font-semibold text-gray-600 bg-gray-500 rounded-lg px-6 py-3 mt-20 mb-10"
                    data-sound="{{ $button }}"
                    style="color: white !important; font-size: 1rem; margin-top: 2rem !important; margin-bottom: 1.5rem !important;"
                >
                    {{ $button }}
                </button>
            @endforeach
        </div>
    </div>

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
        var textBox = document.getElementById('hiraganaInput');
        var soundLabel = document.getElementById('soundLabel');
        var feedbackDiv = document.getElementById('feedback');
        var checkButton = document.getElementById('check-button');

        function disableButtons() {
            buttons.forEach(function (button) {
                button.disabled = true;
            });
            checkButton.disabled = true;
        }

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                buttons.forEach(function (btn) {
                    btn.classList.remove('highlight');
                });

                this.classList.add('highlight');
                textBox.value += this.getAttribute('data-sound');
            });
        });

        checkButton.addEventListener('click', function () {
            disableButtons(); // Disable buttons on check
            var textBoxValue = textBox.value.trim();
            var soundLabelText = soundLabel.textContent.trim();

            if (textBoxValue === soundLabelText) {
                feedbackDiv.textContent = 'Correct!';
                feedbackDiv.className = 'match-feedback';
            } else {
                feedbackDiv.textContent = 'Incorrect! The right answer is ' + soundLabelText;
                feedbackDiv.className = 'mismatch-feedback';

                mistakes++;
                mistakesLabel.textContent = mistakes;
                expLoss+= 5;
                expLossLabel.textContent = expLoss;
            }
        });
    </script>

</body>
</html>
