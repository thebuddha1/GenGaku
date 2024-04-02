<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Sentence;
use App\Models\ProfileSettings;
use Illuminate\Support\Facades\Session;

class MainCourseController extends Controller
{
    public function wordTest1()
    {
        $wordLesson1 = Word::where('lesson', 1)
                    ->where('chapter', 1)
                    ->inRandomOrder()
                    ->first();

        $random = Word::where('lesson', 1)
                    ->where('chapter', 1)
                    ->where('meaning_en', '!=', $wordLesson1->meaning_en)
                    ->inRandomOrder()
                    ->limit(3)
                    ->pluck('meaning_en')
                    ->toArray();

        $random[] = $wordLesson1->meaning_en;

        $random = array_unique($random);

        while (count($random) < 4) {
            $additionalRandom = Word::where('lesson', 1)
                                ->where('chapter', 1)
                                ->where('meaning_en', '!=', $wordLesson1->meaning_en)
                                ->whereNotIn('meaning_en', $random)
                                ->inRandomOrder()
                                ->limit(4 - count($random))
                                ->pluck('meaning_en')
                                ->toArray();

            $random = array_merge($random, $additionalRandom);
            $random = array_unique($random);
        }

        shuffle($random);

        return view('word', [
            'wordLesson1' => $wordLesson1,
            'random' => $random,
        ]);
    }


    public function wordTest2()
    {
        $randomWords = Wrod::where('lesson', 1)
            ->where('chapter', 1)
            ->inRandomOrder()
            ->limit(5)
            ->get();
        
        $wordData = [];
        foreach ($randomWords as $word) {
            $wordData[] = [
                'id' => $words->id,
                'word' => $word->word,
                'meaning' => $word->meaning_en,
            ];
        }

        return view('word2', compact('wordData'));
    }

    public function sentenceTest1(){

    }

    public function sentenceTest2(){
        
    }
}
