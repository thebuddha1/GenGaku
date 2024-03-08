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

    <script>
        var buttons = document.querySelectorAll('.katakana-button');
        var checkButton = document.getElementById('check-button');
        var correctSound = '{{ $katakana->sound }}';

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                buttons.forEach(function (btn) {
                    btn.classList.remove('highlight');
                });

                this.classList.add('highlight');
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
                }
            } else {
                feedbackDiv.textContent = 'Please select a sound';
                feedbackDiv.className = 'mismatch-feedback';
            }
        });

    </script>

</body>
</html>
