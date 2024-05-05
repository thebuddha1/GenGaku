<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Writing course') }}
        </h2>
    </x-slot>
<!--
    -->
<div class="py-12 flex flex-col justify-between items-center">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Welcome to the Katakana course</h1>
            </div>
            <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25">
                <p class="grid grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 mb-8 text-gray-800 dark:text-gray-200">
                    In this page you'll be getting to know one of Japanes' 3 writing systems. <br>
                    Katakana is one of the 2 kana systems of the Japanese language (kana meaning syllabaries, used to write Japanes phonological units, in other word morae). <br> 
                    It contains 46 symbols and an additional 63 variations of the basic symbols, all of them representing a syllable.<br>
                    The word katakana means "fragmentary kana", as the katakana characters are derived from components or fragments of more complex kanji. <br>
                    In contrast to the hiragana syllabary, which is used for Japanese words not covered by kanji and for grammatical inflections, <br> 
                    the katakana syllabary usage is comparable to italics in English, specifically, <br>
                    it is used for transcription of foreign-language words into Japanese and the writing of loan words. <br>
                    For emphasis, for technical and scientific terms, for names of plants, animals, minerals and often Japanese companies. <br>
                    <br>
                    In the course there is a total of 10 lessons. In each lesson you'll be learning a set of 10-14 symbols at once. <br>
                    Before you begin the tests, you'll be able to read trough a summary in each lesson that walks you trough the symbols ahead of you, <br>
                    telling you about their pronunciation and providing some examples for it.<br>
                    When you've completed enough tests you can progress to the next one. Simple, isn't it? Let jump right into it.<br>
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <p class="mb-8 text-gray-800 dark:text-gray-200">Current lesson you are at: {{ auth()->user()->profileProgression->cur_ktkn }}</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">Finished tests in current lesson: {{ auth()->user()->profileProgression->fnshd_tsts_kat }}/10</p>
                </div>
            
                <div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight" style="font-weight: 600; font-size: 1.5rem;">Lesson 1</h1>
                        <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight" style="font-weight: 600; font-size: 1.5rem;">+</button>
                    </div>
                    <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                        <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: ア, イ, ウ, エ, オ</p>
                        <p class="mb-8 text-gray-800 dark:text-gray-200">
                            ア->a   as in father<br>
                            イ->i   as in easy<br>
                            ウ->u   as in too<br>
                            エ->e   as in pay<br>
                            オ->o   as in open<br>
                        </p>
                        <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: カ, キ, ク, ケ, コ</p>
                        <p class="mb-8 text-gray-800 dark:text-gray-200">
                            カ->ka   as in cut<br>
                            キ->ki   as in keep<br>
                            ク->ku   as in cool<br>
                            ケ->ke   as in cat<br>
                            コ->ko   as in cold<br>
                        </p>
                        <a href="/quiz-kat?lesson=1"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                    </div>
                </div>

            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 2</h1>
                    <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                </div>
                <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: サ, シ, ス, セ, ソ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        サ->sa   as in sun<br>
                        シ->shi   as in she<br>
                        ス->su   as in suit<br>
                        セ->se   as in set<br>
                        ソ->so   as in soap<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: タ, チ, ツ, テ, ト</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        タ->ta   as in tall<br>
                        チ->chi   as in cheese<br>
                        ツ->tsu   as in tsunami<br>
                        テ->te   as in ten<br>
                        ト->to   as in toe<br>
                    </p>
                    <a href="/quiz-kat?lesson=2"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 3</h1>
                    <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                </div>
                <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: ナ, ニ, ヌ, ネ, ノ, ン</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ナ->na   as in nut<br>
                        ニ->ni   as in knee<br>
                        ヌ->nu   as in new<br>
                        ネ->ne   as in net<br>
                        ノ->no   as in note<br>
                        ン->n   as in sung<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: ハ, ヒ, フ, ヘ, ホ, ヤ, ユ, ヨ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ハ->ha   as in hot<br>
                        ヒ->hi   as in heat<br>
                        フ->fu   as in food<br>
                        ヘ->he   as in head<br>
                        ホ->ho   as in hope<br>
                        ヤ->ya   as in yard<br>
                        ユ->yu   as in you<br>
                        ヨ->yo   as in yo-yo<br>
                    </p>
                    <a href="/quiz-kat?lesson=3"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 4</h1>
                    <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                </div>
                <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: マ, ミ, ム, メ, モ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        マ->ma   as in mop<br>
                        ミ->mi   as in meet<br>
                        ム->mu   as in mood<br>
                        メ->me   as in met<br>
                        モ->mo   as in more<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: ラ, リ, ル, レ, ロ, ワ, ヲ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ラ->ra   as in run<br>
                        リ->ri   as in read<br>
                        ル->ru   as in roof<br>
                        レ->re   as in red<br>
                        ロ->ro   as in row<br>
                        ワ->wa   as in water<br>
                        ヲ->wo   as in won<br>
                    </p>
                    <a href="/quiz-kat?lesson=4"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 5</h1>
                    <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                </div>
                <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: ガ, ギ, グ, ゲ, ゴ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ガ->ga   as in garden<br>
                        ギ->gi   as in gift<br>
                        グ->gu   as in good<br>
                        ゲ->ge   as in get<br>
                        ゴ->go   as in go<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: ザ, ジ, ズ, ゼ, ゾ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ザ->za   as in zoo<br>
                        ジ->ji   as in jeep<br>
                        ズ->zu   as in zebra<br>
                        ゼ->ze   as in zero<br>
                        ゾ->zo   as in zone<br>
                    </p>
                    <a href="/quiz-kat?lesson=5"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                </div>
            </div>
            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 6</h1>
                    <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                </div>
                <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: ダ, ヂ, ヅ, デ, ド</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ダ->da   as in dad<br>
                        ヂ->ji   as in g in gin<br>
                        ヅ->zu   as in heads<br>
                        デ->de   as in day<br>
                        ド->do   as in dog<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: バ, ビ, ブ, ベ, ボ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        バ->ba   as in bat<br>
                        ビ->bi   as in big<br>
                        ブ->bu   as in blue<br>
                        ベ->be   as in bed<br>
                        ボ->bo   as in boat<br>
                    </p>
                    <a href="/quiz-kat?lesson=6"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                </div>
            </div>
            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 7</h1>
                    <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                </div>
                <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: パ, ピ, プ, ペ, ポ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        パ->pa   as in part<br>
                        ピ->pi   as in pink<br>
                        プ->pu   as in pool<br>
                        ペ->pe   as in pen<br>
                        ポ->po   as in pole<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: キャ, キュ, キョ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        キャ->kya   as in c in cat<br>
                        キュ->kyu   as in queue<br>
                        キョ->kyo   as in cue<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 3: シャ, シュ, ショ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        シャ->sha   as in shop<br>
                        シュ->shu   as in shoot<br>
                        ショ->sho   as in shore<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 4: チャ, チュ, チョ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        チャ->cha   as in chart<br>
                        チュ->chu   as in chew<br>
                        チョ->cho   as in choke<br>
                    </p>
                    <a href="/quiz-kat?lesson=7"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                </div>
            </div>
            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 8</h1>
                    <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                </div>
                <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: ニャ, ニュ, ニョ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ニャ->nya   as in knee<br>
                        ニュ->nyu   as in new<br>
                        ニョ->nyo   as in know<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: ヒャ, ヒュ, ヒョ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ヒャ->hya   as in hue<br>
                        ヒュ->hyu   as in hugh<br>
                        ヒョ->hyo   as in hue<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 3: ミャ, ミュ, ミョ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ミャ->mya   as in mia<br>
                        ミュ->myu   as in miu<br>
                        ミョ->myo   as in meow<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 4: リャ, リュ, リョ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        リャ->rya   as in ree<br>
                        リュ->ryu   as in ryou<br>
                        リョ->ryo   as in rio<br>
                    </p>
                    <a href="/quiz-kat?lesson=8"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                </div>
            </div>
            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 9</h1>
                    <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                </div>
                <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: ギャ, ギュ, ギョ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ギャ->gya   as in ga<br>
                        ギュ->gyu   as in gyou<br>
                        ギョ->gyo   as in go<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: ジャ, ジュ, ジョ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ジャ->ja   as in jay<br>
                        ジュ->ju   as in july<br>
                        ジョ->jo   as in joe<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 3: ビャ, ビュ, ビョ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ビャ->bya   as in by a<br>
                        ビュ->byu   as in by u<br>
                        ビョ->byo   as in by o<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 4: ピャ, ピュ, ピョ</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ピャ->pya   as in py a<br>
                        ピュ->pyu   as in py u<br>
                        ピョ->pyo   as in py o<br>
                    </p>
                    <a href="/quiz-kat?lesson=9"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                </div>
            </div>
            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 10</h1>
                    <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                </div>
                <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                    <p class="mb-8 text-gray-800 dark:text-gray-200">part 13: Double Consonants</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">
                        ッカ->kka   as in cat<br>
                        ッス->ssu   as in kiss<br>
                        ット->tto   as in bet<br>
                        ップ->ppu   as in lip<br>
                        ッリ->rri   as in tree<br>
                    </p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">Extended Vowels</p>
                    <p class="mb-8 text-gray-800 dark:text-gray-200">    
                        アア->aa   as in baa<br>
                        イイ->ii   as in beef<br>
                        ウウ->uu   as in boot<br>
                        エエ->ee   as in beet<br>
                        オオ->oo   as in boat<br>
                    </p>
                    <a href="/quiz-kat?lesson=10"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButtons = document.querySelectorAll('.toggle-button');
            const contentDetails = document.querySelectorAll('.content-details');

            toggleButtons.forEach(function (button, index) {
                button.addEventListener('click', function () {
                    contentDetails[index].classList.toggle('hidden');
                    button.textContent = contentDetails[index].classList.contains('hidden') ? '+' : '-';
                });
            });
        });
    </script>
</x-app-layout>