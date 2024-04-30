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
        label.invisible {
            display: none !important;
        }
        .green {
            background-color: #444 !important;
            color: white !important;
        }
        .red {
            background-color: red !important;
            color: white !important;
        }
        .locked {
            pointer-events: none;
            opacity: 0.6;
            background-color: initial !important;
            color: initial !important;
        }
        .character-button {
            background-color: gray !important;
        }
        .sound-button {
            background-color: gray !important;
        }
        .character-button.green,
        .sound-button.green {
            background-color: #444 !important;
        }
        .character-button.red,
        .sound-button.red {
            background-color: red !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1 class="text-white" style="color: white !important; font-size: 1.5rem; margin-bottom: 50px;">Match the characters with the sound</h1>
            <div class="col-md-6">
                <h2 class="text-white" style="color: white !important; font-size: 1rem; margin-bottom: 6px;">Characters</h2>
                @php
                    shuffle($characterData);
                @endphp
                @foreach ($characterData as $character)
                    <button 
                        class="character-button font-semibold text-gray-600 bg-gray-500 rounded-lg px-6 py-3 mt-20 mb-10"
                        data-id="{{ $character['id'] }}"
                        style="color: white !important; font-size: 1rem; margin-top: 2rem !important; margin-bottom: 1.5rem !important;"
                    >
                        {{ $character['character'] }}
                    </button>
                @endforeach
            </div>
            <div class="col-md-6">
                <h2 class="text-white" style="color: white !important; font-size: 1rem; margin-bottom: 6px;">Sounds</h2>
                @php
                    shuffle($characterData);
                @endphp
                @foreach ($characterData as $character)
                    <button 
                        class="sound-button font-semibold text-gray-600 bg-gray-500 rounded-lg px-6 py-3 mt-20 mb-10"
                        data-id="{{ $character['id'] }}"
                        style="color: white !important; font-size: 1rem; margin-top: 2rem !important; margin-bottom: 1.5rem !important;"
                    >
                        {{ $character['sound'] }}
                    </button>
                @endforeach
            </div>
        </div>
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
        
        const buttons = document.querySelectorAll('.character-button, .sound-button');
        let previousButton = null;
        let redButtons = [];

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                buttons.forEach(b => {
                    b.classList.remove('red');
                });

                if (previousButton) {
                    const previousId = previousButton.getAttribute('data-id');
                    const currentId = this.getAttribute('data-id');
                    const previousType = previousButton.classList.contains('character-button') ? 'character' : 'sound';
                    const currentType = this.classList.contains('character-button') ? 'character' : 'sound';

                    if (redButtons.length === 2) {
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
                        previousButton.classList.add('locked');
                        this.classList.add('locked');
                    } else if (previousType !== currentType) {
                        if (!previousButton.classList.contains('locked')) {
                            previousButton.classList.add('red');
                            this.classList.add('red');
                            redButtons.push(previousButton, this);

                            if(mistakes < 2){
                                mistakes++;
                                mistakesLabel.textContent = mistakes;
                            }
                            if(expLoss < 10){
                                expLoss+= 5;
                                expLossLabel.textContent = expLoss;
                            }
                        }
                    }
                }

                buttons.forEach(b => {
                    b.classList.remove('green');
                });

                this.classList.add('green');
                previousButton = this;

                const lockedButtons = document.querySelectorAll('.locked');
                if (lockedButtons.length === buttons.length) {
                    buttons.forEach(b => {
                        b.disabled = true;
                    });
                }
            });
        });
    </script>
</body>
</html>