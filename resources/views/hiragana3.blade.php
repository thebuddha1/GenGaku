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
            <label style="font-size: 20px;">{{ $labelContent }}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <label class="invisible" id="soundLabel" style="font-size: 20px;">{{ $soundLabelContent }}</label>
        </div>
        <div style="margin-bottom: 10px;">
            <input type="text" id="hiraganaInput" name="hiraganaInput">
        </div>
    </div>

    <div>
        <div style="margin-bottom: 10px;">
            @foreach ($buttonContent as $button)
                <button style="margin-right: 5px;" onclick="updateTextbox('{{ $button }}')">{{ $button }}</button>
            @endforeach
        </div>
    </div>

    <div>
        <button style="margin-top: 10px;" onclick="check()">Check</button>
        <div id="feedback"></div>
    </div>

    <script>
        function updateTextbox(sound) {
            var textBox = document.getElementById('hiraganaInput');
            textBox.value += sound;
        }

        function check() {
            var textBox = document.getElementById('hiraganaInput');
            var soundLabel = document.getElementById('soundLabel');
            var feedbackDiv = document.getElementById('feedback');

            if (textBox.value === soundLabel.textContent) {
                feedbackDiv.textContent = 'Match!';
                feedbackDiv.className = 'match-feedback';
            } else {
                feedbackDiv.textContent = 'Mismatch!';
                feedbackDiv.className = 'mismatch-feedback';
            }
        }
    </script>

</body>
</html>