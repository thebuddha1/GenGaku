<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Word;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        $words = [
            ['word' => '寿司', 'word_hir' => 'すし', 'word_rom' => 'sushi', 'meaning' => '', 'meaning_en' => 'sushi', 'chapter' => 1, 'lesson' => 1],
            ['word' => 'お茶', 'word_hir' => 'おちゃ', 'word_rom' => 'ocha', 'meaning' => '', 'meaning_en' => 'green tea', 'chapter' => 1, 'lesson' => 1],
            ['word' => 'ご飯', 'word_hir' => 'ごはん', 'word_rom' => 'gohan', 'meaning' => '', 'meaning_en' => 'rice', 'chapter' => 1, 'lesson' => 1],
            ['word' => '水', 'word_hir' => 'みず', 'word_rom' => 'mizu', 'meaning' => '', 'meaning_en' => 'water', 'chapter' => 1, 'lesson' => 1],
            ['word' => 'うどん', 'word_hir' => 'うどん', 'word_rom' => 'udon', 'meaning' => '', 'meaning_en' => 'udon', 'chapter' => 1, 'lesson' => 1],
            ['word' => 'そば', 'word_hir' => 'そば', 'word_rom' => 'soba', 'meaning' => '', 'meaning_en' => 'soba', 'chapter' => 1, 'lesson' => 1],
            ['word' => 'アイスクリーム', 'word_hir' => 'アイスクリーム', 'word_rom' => 'aisu curiimu', 'meaning' => '', 'meaning_en' => 'ice cream', 'chapter' => 1, 'lesson' => 1],
            ['word' => 'ください', 'word_hir' => 'ください', 'word_rom' => 'kudasai', 'meaning' => '', 'meaning_en' => 'please', 'chapter' => 1, 'lesson' => 1],
            ['word' => '人', 'word_hir' => 'ひと', 'word_rom' => 'hito', 'meaning' => '', 'meaning_en' => 'person', 'chapter' => 1, 'lesson' => 1],
            ['word' => '医者', 'word_hir' => 'いしゃ', 'word_rom' => 'isha', 'meaning' => '', 'meaning_en' => 'doctor', 'chapter' => 1, 'lesson' => 1],
            ['word' => '看護師', 'word_hir' => 'かんごし', 'word_rom' => 'kangoshi', 'meaning' => '', 'meaning_en' => 'nurse', 'chapter' => 1, 'lesson' => 1],
            ['word' => '弁護士', 'word_hir' => 'べんごし', 'word_rom' => 'bengoshi', 'meaning' => '', 'meaning_en' => 'lawyer', 'chapter' => 1, 'lesson' => 1],
            ['word' => '学生', 'word_hir' => 'がくせい', 'word_rom' => 'gakusei', 'meaning' => '', 'meaning_en' => 'student', 'chapter' => 1, 'lesson' => 1],
            ['word' => '先生', 'word_hir' => 'せんせい', 'word_rom' => 'sensei', 'meaning' => '', 'meaning_en' => 'teacher', 'chapter' => 1, 'lesson' => 1],
            ['word' => 'かっこいい', 'word_hir' => 'かっこいい', 'word_rom' => 'kakkoi', 'meaning' => '', 'meaning_en' => 'cool', 'chapter' => 1, 'lesson' => 1],
            ['word' => 'やさしい', 'word_hir' => 'やさしい', 'word_rom' => 'yasashi', 'meaning' => '', 'meaning_en' => 'nice', 'chapter' => 1, 'lesson' => 1],
            ['word' => 'と', 'word_hir' => 'と', 'word_rom' => 'to', 'meaning' => '', 'meaning_en' => 'and', 'chapter' => 1, 'lesson' => 1],
            ['word' => 'です', 'word_hir' => 'です', 'word_rom' => 'desu', 'meaning' => '', 'meaning_en' => 'it is', 'chapter' => 1, 'lesson' => 1],
            ['word' => 'こんにちは', 'word_hir' => 'こんにちは', 'word_rom' => 'konichiwa', 'meaning' => '', 'meaning_en' => 'hello', 'chapter' => 1, 'lesson' => 2],
            ['word' => 'じゃあね', 'word_hir' => 'じゃあね', 'word_rom' => 'jaane', 'meaning' => '', 'meaning_en' => 'bye', 'chapter' => 1, 'lesson' => 2],
            ['word' => 'これ', 'word_hir' => 'これ', 'word_rom' => 'kore', 'meaning' => '', 'meaning_en' => 'this', 'chapter' => 1, 'lesson' => 2],
            ['word' => 'それ', 'word_hir' => 'それ', 'word_rom' => 'sore', 'meaning' => '', 'meaning_en' => 'that', 'chapter' => 1, 'lesson' => 2],
            ['word' => 'カレー', 'word_hir' => 'カレー', 'word_rom' => 'karee', 'meaning' => '', 'meaning_en' => 'curry', 'chapter' => 1, 'lesson' => 2],
            ['word' => 'ラーメン', 'word_hir' => 'ラーメン', 'word_rom' => 'raamen', 'meaning' => '', 'meaning_en' => 'ramen', 'chapter' => 1, 'lesson' => 2],
            ['word' => 'ピザ', 'word_hir' => 'ピザ', 'word_rom' => 'piza', 'meaning' => '', 'meaning_en' => 'pizza', 'chapter' => 1, 'lesson' => 2],
            ['word' => 'ケーキ', 'word_hir' => 'ケーキ', 'word_rom' => 'keeki', 'meaning' => '', 'meaning_en' => 'cake', 'chapter' => 1, 'lesson' => 2],
            ['word' => 'おいしい', 'word_hir' => 'おいしい', 'word_rom' => 'oishi', 'meaning' => '', 'meaning_en' => 'tasty', 'chapter' => 1, 'lesson' => 2],
            ['word' => 'はい', 'word_hir' => 'はい', 'word_rom' => 'hai/ee', 'meaning' => '', 'meaning_en' => 'yes', 'chapter' => 1, 'lesson' => 2],
            ['word' => 'いいえ', 'word_hir' => 'いいえ', 'word_rom' => 'iie', 'meaning' => '', 'meaning_en' => 'no', 'chapter' => 1, 'lesson' => 2],
            ['word' => 'アメリカ', 'word_hir' => 'アメリカ', 'word_rom' => 'Amerika', 'meaning' => '', 'meaning_en' => 'America', 'chapter' => 1, 'lesson' => 3],
            ['word' => '日本', 'word_hir' => 'にほん', 'word_rom' => 'Nihon', 'meaning' => '', 'meaning_en' => 'Japan', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'イギリス', 'word_hir' => 'イギリス', 'word_rom' => 'Igirisu', 'meaning' => '', 'meaning_en' => 'England', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'ブラジル', 'word_hir' => 'ブラジル', 'word_rom' => 'Burajiru', 'meaning' => '', 'meaning_en' => 'Brazil', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'カナダ', 'word_hir' => 'カナダ', 'word_rom' => 'Kanada', 'meaning' => '', 'meaning_en' => 'Canada', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'コンビニ', 'word_hir' => 'コンビニ', 'word_rom' => 'konbini', 'meaning' => '', 'meaning_en' => 'convenience store', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'ホテル', 'word_hir' => 'ホテル', 'word_rom' => 'hoteru', 'meaning' => '', 'meaning_en' => 'hotel', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'デパート', 'word_hir' => 'デパート', 'word_rom' => 'depaato', 'meaning' => '', 'meaning_en' => 'department store', 'chapter' => 1, 'lesson' => 3],
            ['word' => '店', 'word_hir' => 'みせ', 'word_rom' => 'mise', 'meaning' => '', 'meaning_en' => 'store', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'ここ', 'word_hir' => 'ここ', 'word_rom' => 'koko', 'meaning' => '', 'meaning_en' => 'here', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'そこ', 'word_hir' => 'そこ', 'word_rom' => 'soko', 'meaning' => '', 'meaning_en' => 'there', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'どこ', 'word_hir' => 'どこ', 'word_rom' => 'doko', 'meaning' => '', 'meaning_en' => 'where', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'バス停', 'word_hir' => 'バスてい', 'word_rom' => 'basutei', 'meaning' => '', 'meaning_en' => 'bus stop', 'chapter' => 1, 'lesson' => 3],
            ['word' => '駅', 'word_hir' => 'えき', 'word_rom' => 'eki', 'meaning' => '', 'meaning_en' => 'train station', 'chapter' => 1, 'lesson' => 3],
            ['word' => '空港', 'word_hir' => 'くうこ', 'word_rom' => 'kuukou', 'meaning' => '', 'meaning_en' => 'airport', 'chapter' => 1, 'lesson' => 3],
            ['word' => '大学', 'word_hir' => 'だいがく', 'word_rom' => 'daigaku', 'meaning' => '', 'meaning_en' => 'university', 'chapter' => 1, 'lesson' => 3],
            ['word' => '大学生', 'word_hir' => 'だいがくせい', 'word_rom' => 'daigakusei', 'meaning' => '', 'meaning_en' => 'university student', 'chapter' => 1, 'lesson' => 3],
            ['word' => '大きい', 'word_hir' => 'おおきい', 'word_rom' => 'ooki', 'meaning' => '', 'meaning_en' => 'big', 'chapter' => 1, 'lesson' => 3],
            ['word' => '小さい', 'word_hir' => 'ちいさい', 'word_rom' => 'chiisai', 'meaning' => '', 'meaning_en' => 'small', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'これら', 'word_hir' => 'これら', 'word_rom' => 'korera', 'meaning' => '', 'meaning_en' => 'these', 'chapter' => 1, 'lesson' => 3],
            ['word' => 'それら', 'word_hir' => 'それら', 'word_rom' => 'sorera', 'meaning' => '', 'meaning_en' => 'those', 'chapter' => 1, 'lesson' => 3] 
        ];//első fejezetig

        foreach ($words as $word) {
            Word::create($word);
        }
    }
}
