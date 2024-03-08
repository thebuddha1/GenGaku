<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .green {
            background-color: green;
            color: white;
        }

        .locked {
            pointer-events: none;
            opacity: 0.6; /* You can adjust the opacity as needed */
            background-color: initial !important;
            color: initial !important;
        }

        .red {
            background-color: red;
            color: white;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Characters</h2>
                @php
                    shuffle($characterData);
                @endphp
                @foreach ($characterData as $character)
                    <button class="character-button" data-id="{{ $character['id'] }}">{{ $character['character'] }}</button>
                @endforeach
            </div>
            <div class="col-md-6">
                <h2>Sounds</h2>
                @php
                    shuffle($characterData);
                @endphp
                @foreach ($characterData as $character)
                    <button class="sound-button" data-id="{{ $character['id'] }}">{{ $character['sound'] }}</button>
                @endforeach
            </div>
        </div>
    </div>
    <script>
    const buttons = document.querySelectorAll('.character-button, .sound-button');
    let previousButton = null;
    let redButtons = [];

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove red color from all buttons
            buttons.forEach(b => {
                b.classList.remove('red');
            });

            if (previousButton) {
                const previousId = previousButton.getAttribute('data-id');
                const currentId = this.getAttribute('data-id');
                const previousType = previousButton.classList.contains('character-button') ? 'character' : 'sound';
                const currentType = this.classList.contains('character-button') ? 'character' : 'sound';

                if (redButtons.length === 2) {
                    // Two non-matching buttons were pressed before
                    // Ignore other logic and turn the pressed button green
                    buttons.forEach(b => {
                        b.classList.remove('green');
                    });

                    this.classList.add('green');
                    previousButton = this;
                    redButtons.forEach(redButton => {
                        redButton.classList.remove('red');
                    });
                    redButtons = [];
                } else if (previousId === currentId && previousButton !== this) {
                    // Lock both buttons if they are from the same record
                    previousButton.classList.add('locked');
                    this.classList.add('locked');
                } else if (previousType !== currentType) {
                    // Additional condition: Buttons are from different rows
                    if (!previousButton.classList.contains('locked')) {
                        previousButton.classList.add('red');
                        this.classList.add('red');
                        redButtons.push(previousButton, this);
                    }
                }
            }

            buttons.forEach(b => {
                b.classList.remove('green');
            });

            this.classList.add('green');
            previousButton = this;
        });
    });
</script>
</body>
</html>