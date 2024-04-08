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
            <label for="hiraganaInput">kaka:</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label style="font-size: 20px;">{{ $meaning_en }}</label>
        </div>
        <div style="margin-bottom: 10px;">
            @if (auth()->user()->profileSettings->kanji)
                <label class="invisible" id="solutionLable" style="font-size: 20px;">{{ $sentence }}</label>
            @elseif (auth()->user()->profileSettings->hiragana)
                <label class="invisible" id="solutionLable" style="font-size: 20px;">{{ $sentence_hir }}</label>
            @elseif (auth()->user()->profileSettings->romanji)
                <label class="invisible" id="solutionLable" style="font-size: 20px;">{{ $sentence_rom }}</label>
            @endif
        </div>
        <div style="margin-bottom: 10px;">
            <input type="text" id="sentenceInput" name="sentenceInput">
        </div>
    </div>

    <div>
        <div style="margin-bottom: 10px;">
            @if (auth()->user()->profileSettings->kanji)
                @foreach ($sentenceArray as $sentence)
                <button style="margin-right: 5px;" class="sentence-button" data-sentence="{{ $sentence }}">{{ $sentence }}</button>
                @endforeach
            @elseif (auth()->user()->profileSettings->hiragana)
                @foreach ($sentenceHirArray as $sentence)
                <button style="margin-right: 5px;" class="sentence-button" data-sentence="{{ $sentence }}">{{ $sentence }}</button>
                @endforeach
            @elseif (auth()->user()->profileSettings->romanji)
                @foreach ($sentenceRomArray as $sentence)
                <button style="margin-right: 5px;" class="sentence-button" data-sentence="{{ $sentence }}">{{ $sentence }}</button>
                @endforeach
            @endif
        </div>
    </div>

    <div>
        <button style="margin-top: 10px;" id="check-button">Check</button>
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
        var buttons = document.querySelectorAll('.sentence-button');
        var textBox = document.getElementById('sentenceInput');
        var solutionLable = document.getElementById('solutionLable');
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
                textBox.value += this.getAttribute('data-sentence') + ' ';
            });
        });

        checkButton.addEventListener('click', function () {
            disableButtons(); // Disable buttons on check

            var textBoxValue = textBox.value.trim();
            var solutionLableText = solutionLable.textContent.trim();

            if (textBoxValue === solutionLableText) {
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
