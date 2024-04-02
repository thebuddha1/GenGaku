<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiragana Test</title>
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
    <h1>Hiragana Test</h1>
    <div>
        @if (auth()->user()->profileSettings->kanji)
            <label id="word" for="word">{{ $wordLesson1->word }}</label>
        @elseif (auth()->user()->profileSettings->hiragana)
            <label id="word" for="word">{{ $wordLesson1->word_hir }}</label>
        @elseif (auth()->user()->profileSettings->romanji)
            <label id="word" for="word">{{ $wordLesson1->word_rom }}</label>
        @endif
    </div>
        @foreach ($random as $mean)
            @if (!in_array($mean, array_slice($random, 0, $loop->index)))
                <button class="word-button" data-mean="{{ $mean }}">{{ $mean }}</button>
            @endif
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
    var buttons = document.querySelectorAll('.word-button');
    var checkButton = document.getElementById('check-button');
    var correctMeaning = '{{ $wordLesson1->meaning_en }}';
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
        var selectedButton = document.querySelector('.word-button.highlight');
        var feedbackDiv = document.getElementById('feedback');

        if (selectedButton) {
            var selectedMeaning = selectedButton.getAttribute('data-mean');

            if (selectedMeaning === correctMeaning) {
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
