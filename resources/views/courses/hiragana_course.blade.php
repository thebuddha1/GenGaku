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
                <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Welcome to the Hiragana course</h1>
            </div>
                <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25">
                    <p class="grid grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 mb-8 text-gray-800 dark:text-gray-200">
                        In this page you'll be getting to know one of Japanes' 3 writing systems. <br>
                        Hiragana is one of the 2 kana systems of the Japanese language (kana meaning syllabaries, used to write Japanes phonological units, in other word morae). <br> 
                        It contains 46 symbols and an additional 63 variations of the basic symbols, all of them representing a syllable.<br>
                        Hiragana is used to write kana suffixes following a kanji root, various grammatical and function words including particles, <br>
                        and miscellaneous other native words for which there are no kanji or whose kanji form is obscure or too formal for the writing purpose. <br>
                        <br>
                        In the course there is a total of 10 lessons. In each lesson you'll be learning a set of 10-14 symbols at once. <br>
                        Before you begin the tests, you'll be able to read trough a summary in each lesson that walks you trough the symbols ahead of you, <br>
                        telling you about their pronunciation and providing some examples for it.<br>
                        When you've completed enough tests you can progress to the next one. Simple, isn't it? Let jump right into it.<br>
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <p class="mb-8 text-gray-800 dark:text-gray-200">Current lesson you are at: {{ auth()->user()->profileProgression->cur_hrgn }}</p>
                        <p class="mb-8 text-gray-800 dark:text-gray-200">Finished tests in current lesson: {{ auth()->user()->profileProgression->fnshd_tsts_hir }}</p>
                    </div>
                    <!---->
                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 1</h1>
                            <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: a, i, u, e, o</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                あ->a   as in father<br>
                                い->i   as in easy<br>
                                う->u   as in too<br>
                                え->e   as in pay<br>
                                お->o   as in open<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: ka, ki, ku, ke, ko</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                か->ka   as in cut<br>
                                き->ki   as in keep<br>
                                く->ku   as in cool<br>
                                け->ke   as in cat<br>
                                こ->ko   as in cold<br>
                            </p>
                            <a href="/quiz-hir?lesson=1"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 2</h1>
                            <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: sa, shi, su, se, so</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                さ->sa   as in sun<br>
                                し->shi   as in she<br>
                                す->su   as in suit<br>
                                せ->se   as in set<br>
                                そ->so   as in soap<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: ta, chi, tsu, te, to</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                た->ta   as in tall<br>
                                ち->chi   as in cheese<br>
                                つ->tsu   as in tsunami<br>
                                て->te   as in ten<br>
                                と->to   as in toe<br>
                            </p>
                            <a href="/quiz-hir?lesson=2"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 3</h1>
                            <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: na, ni, nu, ne, no, n</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                な->na   as in nut<br>
                                に->ni   as in knee<br>
                                ぬ->nu   as in new<br>
                                ね->ne   as in net<br>
                                の->no   as in note<br>
                                ん->n   as in sung<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: ha, hi, fu, he, ho, ya, yu, yo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                は->ha   as in hot<br>
                                ひ->hi   as in heat<br>
                                ふ->fu   as in food<br>
                                へ->he   as in head<br>
                                ほ->ho   as in hope<br>
                                や->ya   as in yard<br>
                                ゆ->yu   as in you<br>
                                よ->yo   as in yo-yo<br>
                            </p>
                            <a href="/quiz-hir?lesson=3"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 4</h1>
                            <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: ma, mi, mu, me, mo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                ま->ma   as in mop<br>
                                み->mi   as in meet<br>
                                む->mu   as in mood<br>
                                め->me   as in met<br>
                                も->mo   as in more<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: ra, ri, ru, re, ro, wa, wo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                ら->ra   as in run<br>
                                り->ri   as in read<br>
                                る->ru   as in roof<br>
                                れ->re   as in red<br>
                                ろ->ro   as in row<br>
                                わ->wa   as in water<br>
                                を->wo   as in won<br>
                            </p>
                            <a href="/quiz-hir?lesson=4"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                        </div>
                    </div>


                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 5</h1>
                            <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: ga, gi, gu, ge, go</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                が->ga   as in garden<br>
                                ぎ->gi   as in gift<br>
                                ぐ->gu   as in good<br>
                                げ->ge   as in get<br>
                                ご->go   as in go<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: za, ji, zu, ze, zo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                ざ->za   as in zoo<br>
                                じ->ji   as in jeep<br>
                                ず->zu   as in zebra<br>
                                ぜ->ze   as in zero<br>
                                ぞ->zo   as in zone<br>
                            </p>
                            <a href="/quiz-hir?lesson=5"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 6</h1>
                            <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: da, ji, zu, de, do</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                だ->da   as in dad<br>
                                ぢ->ji   as in g in gin<br>
                                づ->zu   as in heads<br>
                                で->de   as in day<br>
                                ど->do   as in dog<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: ba, bi, bu, be, bo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                ば->ba   as in bat<br>
                                び->bi   as in big<br>
                                ぶ->bu   as in blue<br>
                                べ->be   as in bed<br>
                                ぼ->bo   as in boat<br>
                            </p>
                            <a href="/quiz-hir?lesson=6"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 7</h1>
                            <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: pa, pi, pu, pe, po</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                ぱ->pa   as in part<br>
                                ぴ->pi   as in pink<br>
                                ぷ->pu   as in pool<br>
                                ぺ->pe   as in pen<br>
                                ぽ->po   as in pole<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: kya, kyu, kyo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                きゃ->kya   as in c in cat<br>
                                きゅ->kyu   as in queue<br>
                                きょ->kyo   as in cue<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 3: sha, shu, sho</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                しゃ->sha   as in shop<br>
                                しゅ->shu   as in shoot<br>
                                しょ->sho   as in shore<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 4: cha, chu, cho</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                ちゃ->cha   as in chart<br>
                                ちゅ->chu   as in chew<br>
                                ちょ->cho   as in choke<br>
                            </p>
                            <a href="/quiz-hir?lesson=7"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 8</h1>
                            <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: nya, nyu, nyo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                にゃ->nya   as in knee<br>
                                にゅ->nyu   as in new<br>
                                にょ->nyo   as in know<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: nhya, hyu, hyo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                ひゃ->hya   as in hue<br>
                                ひゅ->hyu   as in hugh<br>
                                ひょ->hyo   as in hue<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 3: mya, myu, myo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                みゃ->mya   as in mia<br>
                                みゅ->myu   as in miu<br>
                                みょ->myo   as in meow<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 4: rya, ryu, ryo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                りゃ->rya   as in ree<br>
                                りゅ->ryu   as in ryou<br>
                                りょ->ryo   as in rio<br>
                            </p>
                            <a href="/quiz-hir?lesson=8"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 9</h1>
                            <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: gya, gyu, gyo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                ぎゃ->gya   as in ga<br>
                                ぎゅ->gyu   as in gyou<br>
                                ぎょ->gyo   as in go<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: ja, ju, jo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                じゃ->ja   as in jay<br>
                                じゅ->ju   as in july<br>
                                じょ->jo   as in joe<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 3: bya, byu, byo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                びゃ->bya   as in by a<br>
                                びゅ->byu   as in by u<br>
                                びょ->byo   as in by o<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 4: pya, pyu, pyo</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                ぴゃ->pya   as in py a<br>
                                ぴゅ->pyu   as in py u<br>
                                ぴょ->pyo   as in py o<br>
                            </p>
                            <a href="/quiz-hir?lesson=9"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 10</h1>
                            <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 1: double consonants</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                っか->kka   as in cat<br>
                                っす->ssu   as in kiss<br>
                                っと->tto   as in bet<br>
                                っぷ->ppu   as in lip<br>
                                っり->rri   as in tree<br>
                            </p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">part 2: extended vowels</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                ああ->aa   as in baa<br>
                                いい->ii   as in beef<br>
                                うう->uu   as in boot<br>
                                ええ->ee   as in beet<br>
                                おお->oo   as in boat<br>
                            </p>
                            <a href="/quiz-hir?lesson=10"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                        </div>
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