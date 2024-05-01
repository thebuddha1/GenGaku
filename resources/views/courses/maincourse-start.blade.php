<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Main course') }}
        </h2>
    </x-slot>
<!--
    -->
<div class="py-12 flex flex-col justify-between items-center">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Welcome to the Main course</h1>
            </div>
                <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25">
                    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700"">
                        <form action="{{ route('update.profile.settings') }}" method="POST">
                            @csrf
                            <h1 class="mb-8 text-gray-800 dark:text-gray-200">Choose how you want to have the words written in the main course</h1>
                            <div id="profile-settings" style="display: flex; flex-wrap: wrap;">
                                <p class="mb-8 text-gray-800 dark:text-gray-200 pr-4"><input type="checkbox" name="kanji" value="1" {{ auth()->user()->profileSettings->kanji ? 'checked' : '' }}> Kanji</p>
                                <p class="mb-8 text-gray-800 dark:text-gray-200 pr-4"><input type="checkbox" name="hiragana" value="1" {{ auth()->user()->profileSettings->hiragana ? 'checked' : '' }}> Hiragana</p>
                                <p class="mb-8 text-gray-800 dark:text-gray-200"><input type="checkbox" name="romanji" value="1" {{ auth()->user()->profileSettings->romanji ? 'checked' : '' }}> Romanji</p>
                            </div>
                            <button type="submit" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Save</button>
                        </form>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                                
                                checkboxes.forEach(function(checkbox) {
                                    checkbox.addEventListener('change', function() {
                                        checkboxes.forEach(function(cb) {
                                            if (cb !== checkbox) {
                                                cb.checked = false;
                                            }
                                        });
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25">
                    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                        
                        <p class="mb-8 text-gray-800 dark:text-gray-200">
                            This is the main course of this page where you'll be learning the whole of the japanese language <br>
                            The course is built of diffferent chapters, each containing 3 lessons, each lesson going over 1-3 topics while providing some relevant vocabulary. <br>
                            You will be able to read ahead in chapters or lessons, but the tests of each lesson will only be avalable if you've completed enough tests in the previous lessons. <br>
                            Each lesson requires you to complete 10 tests. Down bellow you will see your progress of which chapter and lesson you are at and how many tests you have finished. <br>
                            
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <p class="mb-8 text-gray-800 dark:text-gray-200">You are at lesson {{ auth()->user()->profileProgression->cur_lsn }} of chapter {{ auth()->user()->profileProgression->cur_chpt }}</p>
                        <p class="mb-8 text-gray-800 dark:text-gray-200">Finished tests in current lesson: {{ auth()->user()->profileProgression->fnshd_tsts }}</p>
                    </div>
                    <!--Chapter 1-->
                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="text-3xl mb-4 text-gray-800 dark:text-gray-200 leading-tight"><strong>Chapter 1:</strong> context is key; verbs to the end; writing systems; honorifics; wa, ga, ka? </h1>
                            <button class="chapter-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="chapter-detail p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <div class="grid grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 mb-8 text-gray-800 dark:text-gray-200">
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                        chapter 1: context is key; verbs to the end; writing systems; honorifics; wa, ga, ka? <br>
                                        Welcome to the first chapter of your journey to learning Japanese. <br>
                                        In this chapter you'll be introduced to the basics of Japanese. <br>
                                        As you could have guessed from the title, in this chapter we will be learning about how Japanese is a very context based language, about its writing systems, where the verbs go in a sentence and talk about some very useful words such as 'wa'. <br>
                                        You will find these topics in the lessons of this chapter below, alongside of a list of words, sentences and half sentences that will make up the vocabulary of the lessons. <br>
                                        That's about the introduction, without further ado, let's jump right into the firsr lesson.
                                </p>
                            </div>
                            <!--lesson 1-->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                                <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 1: context, verbs and writing systems</h1>
                                <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                            </div>
                            <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    The first thing to note about the Japanese language is that its very much context based, much more so than any other western lanuages. Altough it's not something we will be working with in this course, since it's heavily based around articulation and gestures, but its still important to note that in Japanese talking somethimes single worlds can mean things that we could only describe in sentences. When listening to Jappanese talk, it's important to pay attention to how things are said and to the person who's talking. <br>
                                    <br>
                                    The second most important thing to talk about when we start learning japanese is that its has a lot of writing systems compared to any western language. Not only they have a completly different set of symbol that they write with, but they have three (although we could say its four now days). Namely these writing systems are the Kanji, Hiragana, Katakana and Romanji systems. The Kanji system is the main writing system of the language. It consists of over 60 thousand characters from which only about 6-7 thousand is still used in the modern language and around 2 thousand is used by the average japanes person in everyday language. Kanji are used to describe words, parts of words or even [kifejezések]. One kanji can have different meanings attached to them and our words can be described with different kanji as well. Since we have two complete separet courses for the hiragana and katakana systems I wont go into too much details about them. In short both systems are kana systems, meaning they consists of sybols represnting syllables. Traditionaly, when writing in Japanes, sentences use characters from both the Kanji an the kana systems. Hiragana usually [kiegészít] kanji that are incomplete in themselves, act as particles and represent verbs that doesnt really mean anything in themselves(later about this in the lessons). <br>
                                    <br>
                                    Lastly about the Romanji system. There isn't much to talk about here really. Romanji is basicly the japanese name of our writing system. What you read now is basicly written in romanji. Alongside the traditional ways, romanji is seeing more and more use in japanese writing as the globalisation keeps [kifejteni] its effects. As a side note, in your profiles page you can chose weather you want the words in the lessons to be written in kanji, hiragana or romanji. By default, the words will be written in kanji, but if you are having difficulties with understanding the words in the tests, we recommend you to switch to the romanji option. <br>
                                    <br>
                                    Now that we've learnt about some important fundamentals, we can start with the actual grammar you have (hopefuly) been waiting for. Our first grammar lesson will be about some basic sentence structures and where the verbs usualy go in a sentence. In Japanese, sentences usualy start with the subject and the description of the subject of the sentence while the verbs always go to the end. The first verb will be learning is 'desu'. Its primary meaning that is important for us now is that it implyes the existence or beeing of something or someone. For example 'gohan desu' means 'it is rice' and that basicly sums up the essence of our first grammar lesson. What we have to memorize here is that verbs most of the time go to the end of a sentence, so a generic verb like 'desu' is always at the end of a sentence. <br>
                                    Thats it for the first lesson. Below you can find the full vocabulary of this lesson and you can start the tests to complete this lesson and progress to the next one. 
                                </p>
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    Vocabulary for the lesson: <br>
                                    <br>
                                    Words<br>
                                    お茶(ocha) -> green tea <br>
                                    寿司(sushi) -> sushi <br>
                                    ご飯(gohan) -> rice <br>
                                    水(mizu) -> water <br>
                                    うどん(udon) -> udon <br>
                                    そば(soba) -> soba <br>
                                    アイスクリーム(aisu curiimu) -> ice cream <br>
                                    ください(kudasai) -> please <br>
                                    人(hito) -> person <br>
                                    医者(isha) -> doctor <br>
                                    看護師(kangoshi) -> nurse <br>
                                    弁護士(bengoshi) -> lawyer <br>
                                    学生(gakusei) -> student <br>
                                    先生(sensei) -> teacher <br>
                                    かっこいい(kakkoi) -> cool <br>
                                    やさしい(yasashi) -> nice <br>
                                    と(to) -> and <br>
                                    です(desu) -> it is <br>
                                    <br>
                                    Prashes <br>
                                    寿司 です(sushi desu) -> It is sushi<br>
                                    お茶 ください(ocha kudasai) -> Green tea, please<br>
                                    ご飯 と 水(gohan to mizu) -> Rice and water<br>
                                    うどん と そば(udon to soba) -> Udon and soba<br>
                                    かっこい 医者(kakkoi isha) -> Cool doctor<br>
                                    やさし 看護士(yasashi kangoshi) -> Nice nurse<br>
                                    弁護士 です(bengoshi desu) -> It is a lawyer<br>
                                    学生 と 先生(gakusei to sensei) -> Student and teacher<br>
                                    人 と 看護士(hito to kangoshi) -> Person and nurse<br>
                                    かっこい 学生 です(kakkoi gakusei desu) -> It is a cool student<br>
                                    やさし 医者(yasashi isha) -> Kind doctor<br>
                                    ご飯 です(gohan desu) -> It is rice<br>
                                </p>
                                <a href="/quiz-main?chapter=1&lesson=1"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                            </div>
                            <!--lesson 2-->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                                <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 2: wa, honorifics</h1>
                                <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                            </div>
                            <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    Our next stop in learning japanese grammar will be to look at the word 'wa' (and as a side note 'ga' a bit). 'wa' is a particle that doesnt mean anything in it self. 'wa' is used as a topic setter so to say. With 'wa' we point at the subject of the sentence, say what we are talking about basicly. For example if we say 'korw wa gohan desu' we say 'this is rice'. In this sentence we point at 'this' and what do we say about 'this'? That its rice. With the 'wa' word we made the sentence be about 'this' and what comes after it is what we say about 'this'. In summary with 'wa' we make the sentence be about what came before it. Its also worth noting that in writing 'wa' is technicly using the hiragana for 'ha' but its pronounced as 'wa'. Little side note is that there is a 'ga' word that we will see more of in later lessons, but it's useful to know that it basicly has the same meaning and functionality as 'wa'. The major difference between them though, is that while 'wa' puts the emphasis on the thing we say before it, 'ga' puts it on the thing we say after it. So looking back at our example, 'kore ga gohan desu' would make it so that we want to emphasize that 'its rice' we are talking about rather than emphasizing that 'this' what we are talking about is something. <br>
                                    <br>
                                    Another topic of this lesson is honorifics. In japan there isn't really things like mr. and mrs but if we had to pick something akin to these, it would be the 'san' honorific. It means basicly just that and a bunch of other things... 'san' is something we put after the name of someone we've just met or if we want to be polite. Japanese has a lot more honorifics that are used for expressing the quality of the relationship of the speakers. If you want to learn more about honorifics other than 'san' head on over to the recommendations page and see the article about this topic. In conclusion, when you talk to ppl in japan in a [hivatalos] situation, for the first time and untill you know each other well, it's adivised to use the 'san' honorific after their name. <br>
                                </p>
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    Vocabulary for the lesson <br>
                                    <br>
                                    Words <br>
                                    こんにちは(konichiwa) -> hello<br>
                                    じゃね(jaane) -> bye<br>
                                    これ(kore) -> this<br>
                                    それ(sore) -> that<br>
                                    カレー(karee) -> curry<br>
                                    ラーメン(raamen) -> ramen<br>
                                    ピザ(piza) -> pizza<br>
                                    ケーキ(keeki) -> cake<br>
                                    おいしい(oishi) -> tasty<br>
                                    はい/ええ(hai/ee) -> yes<br>
                                    いいえ(iie) -> no<br>
                                    <br>
                                    Phrases <br>
                                    こんばんは、ケン。(Konbanwa, Ken.) -> Good evening, Ken.<br>
                                    それ は ケーキ です。(Sore wa keeki desu.) -> That is a cake.<br>
                                    はい、ナオミ です。(Hai, Naomi desu.) -> Yes, I am Naomi.<br>
                                    さようなら、田中さん。(Sayounara, Tanaka-san.) -> Goodbye, Mr. Tanaka.<br>
                                    これ は おいしい ラーメン です。(Kore wa oishii ramen desu.) -> This is tasty ramen.<br>
                                    それ は 田中さん です。(Sore wa Tanaka-san desu.) -> That is Tanaka.<br>
                                    いいえ、ケン です。(Iie, Ken desu.) -> No, I’m Ken.<br>
                                    どうぞ よろしく、ナオミさん。(Douzo yoroshiku, Naomi-san.) -> Nice to meet you, Naomi.<br>
                                    これ は おいしい です か？(Kore wa oishii desu ka?) -> Is this tasty?<br>
                                    はい、ケン です。(Hai, Ken desu.) -> Yes, I’m Ken.<br>
                                    それ は おいしい カレー です か？(Sore wa oishii karee desu ka?) -> Is that tasty curry?<br>
                                    また 明日、田中さん。(Mata ashita, Tanaka-san.) -> See you tomorrow, Mr. Tanaka.<br>
                                    こんにちは(good evening) -> konbanwa<br>
                                    おはようございます(good morning) -> ohaiyogozaimasu<br>
                                    さようなら(good bye) -> sayounara<br>
                                    どうぞ よろしく(nice to meet you) -> douzo yoroshiku<br>
                                    また 明日(see you tomorrow) -> mata ashite<br>
                                    私 の 名前 は ケン(Watashi no namae wa Ken) -> My name is Ken<br>
                                </p>
                                <a href="/quiz-main?chapter=1&lesson=2"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                                <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 3: Are you japanese... ka? </h1>
                                <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                            </div>
                            <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    For the last lesson of this chapter, here's a quick one. 'jin' is a short word that is spelled with the same kanji as 'hito' = person and as such sonetimes read as so. But when we use this kanji after the name of a country it means 'a pearson of said country'. What this means is if we say for example 'nihonjin' we say japanese as in a japanese pearson. <br>
                                    <br>
                                    Now what if for example I want to ask if a person is japanes or not? Thats when the 'ka' word comes into play. Generaly in japanese most questions are structured the same as a statement but with the difference that we put 'ka' after the verb of the sentence, in essence, at the end of the sentence. This is the case with both yes or no questions and questions with question words(which usually go to the start of the sentence, but more on that later) in them. So to close off tgis lesson, here's an example of a question in japanese: 'Nihonjin desu ka?' asking 'Are you japanese?'. <br>
                                </p>
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    Vocabulary for the lesson <br>
                                    <br>
                                    Words <br>
                                    アメリカ(Amerika) -> America<br>
                                    日本(Nihon) -> Japan<br>
                                    イギリス(Igirisu) -> England<br>
                                    ブラジル(Burajiru) -> Brazil<br>
                                    カナダ(Kanada) -> Canada<br>
                                    コンビニ(konbini) -> convenience store<br>
                                    ホテル(hoteru) -> hotel<br>
                                    デパート(depaato) -> department store<br>
                                    店(mise) -> store<br>
                                    ここ(koko) -> here<br>
                                    そこ(soko) -> there<br>
                                    どこ(doko) -> where<br>
                                    バス停(basutei) -> bus stop<br>
                                    駅(eki) -> train station<br>
                                    空港(kuukou) -> airport<br>
                                    大学(daigaku) -> university<br>
                                    大学生(daigakusei) -> university student<br>
                                    大きい(ookii) -> big<br>
                                    小さい(chiisai) -> small<br>
                                    これら(korera) -> these<br>
                                    それら(sorera) -> those<br>
                                    <br>
                                    Phrases <br>
                                    コンビニ は どこ です か？(Konbini wa doko desu ka?) -> Where is the convenience store?<br>
                                    ホテル は そこ です。(Hoteru wa soko desu.) -> The hotel is there.<br>
                                    この 駅 は 大きい です。(Kono eki wa ookii desu.) -> This train station is big.<br>
                                    ナオミ は アメリカ人 です。(Naomi wa Amerikajin desu.) -> Naomi is American.<br>
                                    この 大学 は 小さい です。(Kono daigaku wa chiisai desu.) -> This university is small.<br>
                                    ケン は ブラジル人 です。(Ken wa Burajirujin desu.) -> Ken is Brazilian.<br>
                                    バス停 は ここ です か？(Basutei wa koko desu ka?) -> Is the bus stop here?<br>
                                    駅 は そこ です。(Eki wa soko desu.) -> The train station is there.<br>
                                    田中 は 日本人 です。(Tanaka wa Nihonjin desu.) -> Tanaka is Japanese.<br>
                                    カナダ は 大きい です。(Kanada wa ookii desu) -> Canada is big.<br>
                                    コンビニ は ここ です。(Konbini wa koko desu.) -> The convenience store is here.<br>
                                    イギリス は 小さい です(Igirisu wa chiisai desu) -> Britain is small.<br>
                                </p>
                                <a href="/quiz-main?chapter=1&lesson=3"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                            </div>
                        </div>
                    </div>

                    <!--Chapter 2-->
                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="text-3xl mb-4 text-gray-800 dark:text-gray-200 leading-tight"><strong>Chapter 2:</strong> us, names, no, nai, 1 2 3 </h1>
                            <button class="chapter-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                        </div>
                        <div class="chapter-detail p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                            <div class="grid grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 mb-8 text-gray-800 dark:text-gray-200">
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    Welcome to the second chapter. Since you made it here it means that you are on the right track to learning japanese. Let's keep it up! In this chapter you will be learning about some pronouns, how names are in japanese, how you say you have things, the basic negation in japanese and how to count. Let's not waste any more time and head right to the first lesson. <br>
                                </p>
                            </div>
                            <!--lesson 1-->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                                <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 1: pronouns, names</h1>
                                <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                            </div>
                            <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    Pronouns are important, not so much in japanese though, but regardless here are they: I -> watashi, you -> kimi, he -> kare, she -> kanojo. Now talk bit about why pronouns aren't that important. As we learned in chapter 1, japanese is a very context based language and it shows in many aspects. One is the pronouns and how little they are actually being used in the everyday conversations. When saying for example, 'I go to school' you would think that it would be something like 'watashi wa gakkou ni ikimasu' which is correct word for word, but in actuality, a japanese person would just say 'gakkou ni ikimasu' in most situations. Well, at the end of the day its still useful to learn the pronouns as they are still being used, just not as much as we use them. The lesson here is, learn the pronouns and start to get used to japanese being context based as it will come back to us time and time again as we progress further into the chapters and lessons <br>
                                    <br>
                                    One more thing about the pronouns before we move on to the next topic. You probably noticed that we havent listed out any prular pronouns. That's becaouse in japanese there is only one prular pronoun, that being 'they -> karera'. Other than this one, all the prular pronouns are formed using the 'tachi' word with a sinple pronoun and that will make up the prular counter part of the given pronoun. 'tachi' in it self doesn't really mean anything, but it's used as sort of a multiplier word. It can be used with words other than pronouns such as names or groups. Saying 'watashitachi' mean 'us', saying 'Naomitachi' means 'Naomi and the people around/with her', saying 'hitotachi' means 'people' (as we know 'hito' means person). As for our last topic for this lesson, it's a short one, let's talk about names. Names in Japanese are written in oposite order as to how they are in english. In Japanese, the [családnév] comes first and the [keresztnév] second. <br>
                                    </p>
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    Vocabulary for the lesson: <br>
                                    <br>
                                    Words<br>
                                    
                                    <br>
                                    Prashes <br>
                                    
                                    ご飯 です(gohan desu) -> It is rice<br>
                                </p>
                                <a href="/quiz-main?chapter=2&lesson=1"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                            </div>
                            <!--lesson 2-->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                                <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 2: mine not mine?</h1>
                                <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                            </div>
                            <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                   
                                </p>
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    Vocabulary for the lesson <br>
                                    <br>
                                    Words <br>
                                    
                                    <br>
                                    Phrases <br>
                                    
                                </p>
                                <a href="/quiz-main?chapter=2&lesson=2"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                                <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Lesson 3:  </h1>
                                <button class="toggle-button font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">+</button>
                            </div>
                            <div class="content-details grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700 hidden">
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    
                                </p>
                                <p class="mb-8 text-gray-800 dark:text-gray-200">
                                    Vocabulary for the lesson <br>
                                    <br>
                                    Words <br>
                                    
                                    <br>
                                    Phrases <br>
                                    
                                </p>
                                <a href="/quiz-main?chapter=2&lesson=3"><button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Start Test</button></a>
                            </div>
                        </div>
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

            const chapterButtons = document.querySelectorAll('.chapter-button');
            const chapterDetails = document.querySelectorAll('.chapter-detail');

            chapterButtons.forEach(function (button, index) {
                button.addEventListener('click', function () {
                    chapterDetails[index].classList.toggle('hidden');
                    button.textContent = chapterDetails[index].classList.contains('hidden') ? '+' : '-';
                });
            });
        });
    </script>
</x-app-layout>