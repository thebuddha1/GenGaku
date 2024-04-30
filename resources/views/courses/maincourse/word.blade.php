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
        .word-button {
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
    <h1 class="text-white" style="color: white !important; font-size: 1.5rem; margin-bottom: 50px;">Chose the right meaning for the word shown below</h1>
    <div>
        @if (auth()->user()->profileSettings->kanji)
            <label id="word" for="word" class="text-white" style="color: white !important; font-size: 3rem; margin-bottom: 50px;">{{ $wordLesson1->word }}</label>
        @elseif (auth()->user()->profileSettings->hiragana)
            <label id="word" for="word" class="text-white" style="color: white !important; font-size: 3rem; margin-bottom: 50px;">{{ $wordLesson1->word_hir }}</label>
        @elseif (auth()->user()->profileSettings->romanji)
            <label id="word" for="word" class="text-white" style="color: white !important; font-size: 3rem; margin-bottom: 50px;">{{ $wordLesson1->word_rom }}</label>
        @endif
    </div>
        @foreach ($random as $mean)
            @if (!in_array($mean, array_slice($random, 0, $loop->index)))
                <button 
                    class="word-button font-semibold text-gray-600 bg-gray-500 rounded-lg px-6 py-3 mt-20 mb-10"
                    data-mean="{{ $mean }}"
                    style="color: white !important; font-size: 1rem; margin-top: 2rem !important; margin-bottom: 1.5rem !important;"
                >
                    {{ $mean }}
                </button>
            @endif
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
                feedbackDiv.textContent = 'Correct!';
                feedbackDiv.className = 'match-feedback';
            } else {
                feedbackDiv.textContent = 'Incorrect! The right answer is ' + correctMeaning;
                feedbackDiv.className = 'mismatch-feedback';

                mistakes++;
                mistakesLabel.textContent = mistakes;
                expLoss+= 5;
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
