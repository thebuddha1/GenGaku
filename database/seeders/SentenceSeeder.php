<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sentence;

class SentenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sentences = [
            ['sentence' => '寿司 です', 'sentence_hir' => 'すし です', 'sentence_rom' => 'sushi desu', 'meaning' => '', 'meaning_en' => 'It is sushi', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => 'お茶 ください', 'sentence_hir' => 'おちゃ ください', 'sentence_rom' => 'ocha kudasai', 'meaning' => '', 'meaning_en' => 'Green tea, please', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => 'ご飯 と 水', 'sentence_hir' => 'ごはん と みず', 'sentence_rom' => 'gohan to mizu', 'meaning' => '', 'meaning_en' => 'Rice and water', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => 'うどん と そば', 'sentence_hir' => 'うどん と そば', 'sentence_rom' => 'udon to soba', 'meaning' => '', 'meaning_en' => 'Udon and soba', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => 'かっこい 医者', 'sentence_hir' => 'かっこい いしゃ', 'sentence_rom' => 'kakkoi isha', 'meaning' => '', 'meaning_en' => 'Cool doctor', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => 'やさし 看護士', 'sentence_hir' => 'やさし かんごし', 'sentence_rom' => 'yasashi kangoshi', 'meaning' => '', 'meaning_en' => 'Nice nurse', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => '弁護士 です', 'sentence_hir' => 'べんごし です', 'sentence_rom' => 'bengoshi desu', 'meaning' => '', 'meaning_en' => 'It is a lawyer', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => '学生 と 先生', 'sentence_hir' => 'がくせい と せんせい', 'sentence_rom' => 'gakusei to sensei', 'meaning' => '', 'meaning_en' => 'Student and teacher', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => '人 と 看護士', 'sentence_hir' => 'ひと と かんごし', 'sentence_rom' => 'hito to kangoshi', 'meaning' => '', 'meaning_en' => 'Person and nurse', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => 'かっこい 学生 です', 'sentence_hir' => 'かっこい がくせい です', 'sentence_rom' => 'kakkoi gakusei desu', 'meaning' => '', 'meaning_en' => 'It is a cool student', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => 'やさし 医者', 'sentence_hir' => 'やさし いしゃ', 'sentence_rom' => 'yasashi isha', 'meaning' => '', 'meaning_en' => 'Kind doctor', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => 'ご飯 です', 'sentence_hir' => 'ごはん です', 'sentence_rom' => 'gohan desu', 'meaning' => '', 'meaning_en' => 'It is rice', 'chapter' => 1, 'lesson' => 1],
            ['sentence' => 'こんばんは、ケン。', 'sentence_hir' => 'こんばんは、けん。', 'sentence_rom' => 'Konbanwa, Ken.', 'meaning' => '', 'meaning_en' => 'Good evening, Ken.', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'それ は ケーキ です。', 'sentence_hir' => 'それ は けーき です。', 'sentence_rom' => 'Sore wa keeki desu.', 'meaning' => '', 'meaning_en' => 'That is a cake.', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'はい、ナオミ です。', 'sentence_hir' => 'はい、なおみ です。', 'sentence_rom' => 'Hai, Naomi desu.', 'meaning' => '', 'meaning_en' => 'Yes, I am Naomi.', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'さようなら、田中さん。', 'sentence_hir' => 'さようなら、たなかさん。', 'sentence_rom' => 'Sayounara, Tanaka-san.', 'meaning' => '', 'meaning_en' => 'Goodbye, Mr. Tanaka.', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'これ は おいしい ラーメン です。', 'sentence_hir' => 'これ は おいしい らーめん です。', 'sentence_rom' => 'Kore wa oishii ramen desu.', 'meaning' => '', 'meaning_en' => 'This is tasty ramen.', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'それ は 田中さん です。', 'sentence_hir' => 'それ は たなかさん です。', 'sentence_rom' => 'Sore wa Tanaka-san desu.', 'meaning' => '', 'meaning_en' => 'That is Tanaka.', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'いいえ、ケン です。', 'sentence_hir' => 'いいえ、けん です。', 'sentence_rom' => 'Iie, Ken desu.', 'meaning' => '', 'meaning_en' => 'No, I’m Ken.', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'どうぞ よろしく、ナオミさん。', 'sentence_hir' => 'どうぞ よろしく、なおみさん。', 'sentence_rom' => 'Douzo yoroshiku, Naomi-san.', 'meaning' => '', 'meaning_en' => 'Nice to meet you, Naomi.', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'これ は おいしい です か？', 'sentence_hir' => 'これ は おいしい です か？', 'sentence_rom' => 'Kore wa oishii desu ka?', 'meaning' => '', 'meaning_en' => 'This is tasty.', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'はい、ケン です。', 'sentence_hir' => 'はい、けん です。', 'sentence_rom' => 'Hai, Ken desu.', 'meaning' => '', 'meaning_en' => 'Yes, I’m Ken.', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'それ は おいしい カレー です か？', 'sentence_hir' => 'それ は おいしい かれー です か？', 'sentence_rom' => 'Sore wa oishii karee desu?', 'meaning' => '', 'meaning_en' => 'That is tasty curry?', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'また 明日、田中さん。', 'sentence_hir' => 'また あした、たなかさん。', 'sentence_rom' => 'Mata ashita, Tanaka-san.', 'meaning' => '', 'meaning_en' => 'See you tomorrow, Mr. Tanaka.', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'こんにちは', 'sentence_hir' => 'こんにちは', 'sentence_rom' => 'good evening', 'meaning' => '', 'meaning_en' => 'konbanwa', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'おはようございます', 'sentence_hir' => 'おはようございます', 'sentence_rom' => 'good morning', 'meaning' => '', 'meaning_en' => 'ohaiyogozaimasu', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'さようなら', 'sentence_hir' => 'さようなら', 'sentence_rom' => 'good bye', 'meaning' => '', 'meaning_en' => 'sayounara', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'どうぞ よろしく', 'sentence_hir' => 'どうぞ よろしく', 'sentence_rom' => 'nice to meet you', 'meaning' => '', 'meaning_en' => 'douzo yoroshiku', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'また 明日', 'sentence_hir' => 'また あした', 'sentence_rom' => 'see you tomorrow', 'meaning' => '', 'meaning_en' => 'mata ashite', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => '私 の 名前 は ケン', 'sentence_hir' => 'わたし の なまえ は けん', 'sentence_rom' => 'Watashi no namae wa Ken', 'meaning' => '', 'meaning_en' => 'My name is Ken', 'chapter' => 1, 'lesson' => 2],
            ['sentence' => 'コンビニ は どこ です か？', 'sentence_hir' => 'コンビニ は どこ です か？', 'sentence_rom' => 'Konbini wa doko desu ka?', 'meaning' => '', 'meaning_en' => 'Where is the convenience store?', 'chapter' => 1, 'lesson' => 3],
            ['sentence' => 'ホテル は そこ です。', 'sentence_hir' => 'ホテル は そこ です。', 'sentence_rom' => 'Hoteru wa soko desu.', 'meaning' => '', 'meaning_en' => 'The hotel is there.', 'chapter' => 1, 'lesson' => 3],
            ['sentence' => 'この 駅 は 大きい です。', 'sentence_hir' => 'この えき は おおきい です。', 'sentence_rom' => 'Kono eki wa ookii desu.', 'meaning' => '', 'meaning_en' => 'This train station is big.', 'chapter' => 1, 'lesson' => 3],
            ['sentence' => 'ナオミ は アメリカ人 です。', 'sentence_hir' => 'なおみ は あめりかじん です。', 'sentence_rom' => 'Naomi wa Amerikajin desu.', 'meaning' => '', 'meaning_en' => 'Naomi is American.', 'chapter' => 1, 'lesson' => 3],
            ['sentence' => 'この 大学 は 小さい です。', 'sentence_hir' => 'この だいがく は ちいさい です。', 'sentence_rom' => 'Kono daigaku wa chiisai desu.', 'meaning' => '', 'meaning_en' => 'This university is small.', 'chapter' => 1, 'lesson' => 3],
            ['sentence' => 'ケン は ブラジル人 です。', 'sentence_hir' => 'けん は ぶらじるじん です。', 'sentence_rom' => 'Ken wa Burajirujin desu.', 'meaning' => '', 'meaning_en' => 'Ken is Brazilian.', 'chapter' => 1, 'lesson' => 3],
            ['sentence' => 'バス停 は ここ です か？', 'sentence_hir' => 'バスてい は ここ です か？', 'sentence_rom' => 'Basutei wa koko desu ka?', 'meaning' => '', 'meaning_en' => 'Is the bus stop here?', 'chapter' => 1, 'lesson' => 3],
            ['sentence' => '駅 は そこ です。', 'sentence_hir' => 'えき は そこ です。', 'sentence_rom' => 'Eki wa soko desu.', 'meaning' => '', 'meaning_en' => 'The train station is there', 'chapter' => 1, 'lesson' => 3],
            ['sentence' => '田中 は 日本人 です。', 'sentence_hir' => 'たなか は にほんじん です。', 'sentence_rom' => 'Tanaka wa Nihonjin desu.', 'meaning' => '', 'meaning_en' => 'Tanaka is Japanese.', 'chapter' => 1, 'lesson' => 3],
            ['sentence' => 'カナダ は 大きい です', 'sentence_hir' => 'かなだ は おおきい です', 'sentence_rom' => 'Kanada wa ooki des', 'meaning' => '', 'meaning_en' => 'Kanada is big.', 'chapter' => 1, 'lesson' => 3],
            ['sentence' => 'コンビニ は ここ です。', 'sentence_hir' => 'コンビニ は ここ です。', 'sentence_rom' => 'Konbini wa koko desu.', 'meaning' => '', 'meaning_en' => 'The convenience store is here.', 'chapter' => 1, 'lesson' => 3],
            ['sentence' => 'イギリス は 小さい です', 'sentence_hir' => 'いぎりす は ちいさい です', 'sentence_rom' => 'Igirisu wa chiisai desu', 'meaning' => '', 'meaning_en' => 'Britain is small', 'chapter' => 1, 'lesson' => 3]
        ];

        foreach ($sentences as $sentence) {
            Sentence::create($sentence);
        } 
    }
}
