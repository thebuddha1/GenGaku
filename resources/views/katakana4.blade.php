<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .invisible {
            display: none;
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
            <label for="katakanaInput">kaka:</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-size: 20px;">{{ $labelContent }}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label class="invisible" id="soundLabel" style="font-size: 20px;">{{ $characterLabelContent }}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <input type="text" id="katakanaInput" name="katakanaInput">
        </div>
    </div>

    <div>
        <div style="margin-bottom: 10px;">
            @foreach ($buttonContent as $button)
                <button style="margin-right: 5px;" class="katakana-button" data-sound="{{ $button }}">{{ $button }}</button>
            @endforeach
        </div>
    </div>

    <div>
        <button style="margin-top: 10px;" id="check-button">Check</button>
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
        var textBox = document.getElementById('katakanaInput');
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
            disableButtons();
            
            if (textBox.value === soundLabel.textContent) {
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
        });
    </script>

</body>
</html>
