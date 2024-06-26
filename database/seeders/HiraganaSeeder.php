<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hiragana;

class HiraganaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    public function run()
    {
        $characters = [
            ['character' => 'あ', 'sound' => 'a', 'lesson' => 1],
            ['character' => 'い', 'sound' => 'i', 'lesson' => 1],
            ['character' => 'う', 'sound' => 'u', 'lesson' => 1],
            ['character' => 'え', 'sound' => 'e', 'lesson' => 1],
            ['character' => 'お', 'sound' => 'o', 'lesson' => 1],
            ['character' => 'か', 'sound' => 'ka', 'lesson' => 1],
            ['character' => 'き', 'sound' => 'ki', 'lesson' => 1],
            ['character' => 'く', 'sound' => 'ku', 'lesson' => 1],
            ['character' => 'け', 'sound' => 'ke', 'lesson' => 1],
            ['character' => 'こ', 'sound' => 'ko', 'lesson' => 1],
            ['character' => 'さ', 'sound' => 'sa', 'lesson' => 2],
            ['character' => 'し', 'sound' => 'shi', 'lesson' => 2],
            ['character' => 'す', 'sound' => 'su', 'lesson' => 2],
            ['character' => 'せ', 'sound' => 'se', 'lesson' => 2],
            ['character' => 'そ', 'sound' => 'so', 'lesson' => 2],
            ['character' => 'た', 'sound' => 'ta', 'lesson' => 2],
            ['character' => 'ち', 'sound' => 'chi', 'lesson' => 2],
            ['character' => 'つ', 'sound' => 'tsu', 'lesson' => 2],
            ['character' => 'て', 'sound' => 'te', 'lesson' => 2],
            ['character' => 'と', 'sound' => 'to', 'lesson' => 2],
            ['character' => 'な', 'sound' => 'na', 'lesson' => 3],
            ['character' => 'に', 'sound' => 'ni', 'lesson' => 3],
            ['character' => 'ぬ', 'sound' => 'nu', 'lesson' => 3],
            ['character' => 'ね', 'sound' => 'ne', 'lesson' => 3],
            ['character' => 'の', 'sound' => 'no', 'lesson' => 3],
            ['character' => 'ん', 'sound' => 'n', 'lesson' => 3],
            ['character' => 'は', 'sound' => 'ha', 'lesson' => 3],
            ['character' => 'ひ', 'sound' => 'hi', 'lesson' => 3],
            ['character' => 'ふ', 'sound' => 'fu', 'lesson' => 3],
            ['character' => 'へ', 'sound' => 'he', 'lesson' => 3],
            ['character' => 'ほ', 'sound' => 'ho', 'lesson' => 3],
            ['character' => 'や', 'sound' => 'ya', 'lesson' => 3],
            ['character' => 'ゆ', 'sound' => 'yu', 'lesson' => 3],
            ['character' => 'よ', 'sound' => 'yo', 'lesson' => 3],
            ['character' => 'ま', 'sound' => 'ma', 'lesson' => 4],
            ['character' => 'み', 'sound' => 'mi', 'lesson' => 4],
            ['character' => 'む', 'sound' => 'mu', 'lesson' => 4],
            ['character' => 'め', 'sound' => 'me', 'lesson' => 4],
            ['character' => 'も', 'sound' => 'mo', 'lesson' => 4],
            ['character' => 'ら', 'sound' => 'ra', 'lesson' => 4],
            ['character' => 'り', 'sound' => 'ri', 'lesson' => 4],
            ['character' => 'る', 'sound' => 'ru', 'lesson' => 4],
            ['character' => 'れ', 'sound' => 're', 'lesson' => 4],
            ['character' => 'ろ', 'sound' => 'ro', 'lesson' => 4],
            ['character' => 'わ', 'sound' => 'wa', 'lesson' => 4],
            ['character' => 'を', 'sound' => 'wo', 'lesson' => 4],
            ['character' => 'が', 'sound' => 'ga', 'lesson' => 5],
            ['character' => 'ぎ', 'sound' => 'gi', 'lesson' => 5],
            ['character' => 'ぐ', 'sound' => 'gu', 'lesson' => 5],
            ['character' => 'げ', 'sound' => 'ge', 'lesson' => 5],
            ['character' => 'ご', 'sound' => 'go', 'lesson' => 5],
            ['character' => 'ざ', 'sound' => 'za', 'lesson' => 5],
            ['character' => 'じ', 'sound' => 'ji', 'lesson' => 5],
            ['character' => 'ず', 'sound' => 'zu', 'lesson' => 5],
            ['character' => 'ぜ', 'sound' => 'ze', 'lesson' => 5],
            ['character' => 'ぞ', 'sound' => 'zo', 'lesson' => 5],
            ['character' => 'だ', 'sound' => 'da', 'lesson' => 6],
            ['character' => 'ぢ', 'sound' => 'ji', 'lesson' => 6],
            ['character' => 'づ', 'sound' => 'zu', 'lesson' => 6],
            ['character' => 'で', 'sound' => 'de', 'lesson' => 6],
            ['character' => 'ど', 'sound' => 'do', 'lesson' => 6],
            ['character' => 'ば', 'sound' => 'ba', 'lesson' => 6],
            ['character' => 'び', 'sound' => 'bi', 'lesson' => 6],
            ['character' => 'ぶ', 'sound' => 'bu', 'lesson' => 6],
            ['character' => 'べ', 'sound' => 'be', 'lesson' => 6],
            ['character' => 'ぼ', 'sound' => 'bo', 'lesson' => 6],
            ['character' => 'ぱ', 'sound' => 'pa', 'lesson' => 7],
            ['character' => 'ぴ', 'sound' => 'pi', 'lesson' => 7],
            ['character' => 'ぷ', 'sound' => 'pu', 'lesson' => 7],
            ['character' => 'ぺ', 'sound' => 'pe', 'lesson' => 7],
            ['character' => 'ぽ', 'sound' => 'po', 'lesson' => 7],
            ['character' => 'きゃ', 'sound' => 'kya', 'lesson' => 7],
            ['character' => 'きゅ', 'sound' => 'kyu', 'lesson' => 7],
            ['character' => 'きょ', 'sound' => 'kyo', 'lesson' => 7],
            ['character' => 'しゃ', 'sound' => 'sha', 'lesson' => 7],
            ['character' => 'しゅ', 'sound' => 'shu', 'lesson' => 7],
            ['character' => 'しょ', 'sound' => 'sho', 'lesson' => 7],
            ['character' => 'ちゃ', 'sound' => 'cha', 'lesson' => 7],
            ['character' => 'ちゅ', 'sound' => 'chu', 'lesson' => 7],
            ['character' => 'ちょ', 'sound' => 'cho', 'lesson' => 7],
            ['character' => 'にゃ', 'sound' => 'nya', 'lesson' => 8],
            ['character' => 'にゅ', 'sound' => 'nyu', 'lesson' => 8],
            ['character' => 'にょ', 'sound' => 'nyo', 'lesson' => 8],
            ['character' => 'ひゃ', 'sound' => 'hya', 'lesson' => 8],
            ['character' => 'ひゅ', 'sound' => 'hyu', 'lesson' => 8],
            ['character' => 'ひょ', 'sound' => 'hyo', 'lesson' => 8],
            ['character' => 'みゃ', 'sound' => 'mya', 'lesson' => 8],
            ['character' => 'みゅ', 'sound' => 'myu', 'lesson' => 8],
            ['character' => 'みょ', 'sound' => 'myo', 'lesson' => 8],
            ['character' => 'りゃ', 'sound' => 'rya', 'lesson' => 8],
            ['character' => 'りゅ', 'sound' => 'ryu', 'lesson' => 8],
            ['character' => 'りょ', 'sound' => 'ryo', 'lesson' => 8],
            ['character' => 'ぎゃ', 'sound' => 'gya', 'lesson' => 9],
            ['character' => 'ぎゅ', 'sound' => 'gyu', 'lesson' => 9],
            ['character' => 'ぎょ', 'sound' => 'gyo', 'lesson' => 9],
            ['character' => 'じゃ', 'sound' => 'ja', 'lesson' => 9],
            ['character' => 'じゅ', 'sound' => 'ju', 'lesson' => 9],
            ['character' => 'じょ', 'sound' => 'jo', 'lesson' => 9],
            ['character' => 'びゃ', 'sound' => 'bya', 'lesson' => 9],
            ['character' => 'びゅ', 'sound' => 'byu', 'lesson' => 9],
            ['character' => 'びょ', 'sound' => 'byo', 'lesson' => 9],
            ['character' => 'ぴゃ', 'sound' => 'pya', 'lesson' => 9],
            ['character' => 'ぴゅ', 'sound' => 'pyu', 'lesson' => 9],
            ['character' => 'ぴょ', 'sound' => 'pyo', 'lesson' => 9],
            ['character' => 'っか', 'sound' => 'kka', 'lesson' => 10],
            ['character' => 'っす', 'sound' => 'ssu', 'lesson' => 10],
            ['character' => 'っと', 'sound' => 'tto', 'lesson' => 10],
            ['character' => 'っぷ', 'sound' => 'ppu', 'lesson' => 10],
            ['character' => 'っり', 'sound' => 'rri', 'lesson' => 10],
            ['character' => 'ああ', 'sound' => 'aa', 'lesson' => 10],
            ['character' => 'いい', 'sound' => 'ii', 'lesson' => 10],
            ['character' => 'うう', 'sound' => 'uu', 'lesson' => 10],
            ['character' => 'ええ', 'sound' => 'ee', 'lesson' => 10],
            ['character' => 'おお', 'sound' => 'oo', 'lesson' => 10],
        ];

        foreach ($characters as $character) {
            Hiragana::create($character);
        }
    }
}
