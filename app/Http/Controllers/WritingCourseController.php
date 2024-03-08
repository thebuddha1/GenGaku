<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hiragana;
use App\Models\Katakana;
use Illuminate\Support\Facades\Session;


class WritingCourseController extends Controller
{
    //hiragana
    public function hiraganaTest1()
    {

        $hiragana = Hiragana::where('lesson', 1)->inRandomOrder()->first();

        $randomSounds = Hiragana::where('lesson', 1)
            ->where('sound', '!=', $hiragana->sound)
            ->inRandomOrder()
            ->limit(3)
            ->pluck('sound')
            ->toArray();

        $randomSounds[] = $hiragana->sound;

        shuffle($randomSounds);

        return view('hiragana', [
            'hiragana' => $hiragana,
            'randomSounds' => $randomSounds,
        ]);
    }

    public function hiraganaTest2()
    {
        $randomCharacters = Hiragana::where('lesson', 1)->inRandomOrder()->limit(5)->get();
        
        $characterData = [];
        foreach ($randomCharacters as $character) {
            $characterData[] = [
                'id' => $character->id,
                'character' => $character->character,
                'sound' => $character->sound,
            ];
        }

        return view('hiragana2', compact('characterData'));
    }

    public function hiraganaTest3()
    {
        $selectedHiraganaRows = Hiragana::where('lesson', 1)
                                        ->inRandomOrder()
                                        ->limit(rand(3, 5))
                                        ->get();

        $randomHiragana = $selectedHiraganaRows->pluck('character')->toArray();
        $selectedSounds = $selectedHiraganaRows->pluck('sound')->toArray();

        $additionalSounds = Hiragana::where('lesson', 1)
                                    ->whereNotIn('sound', $selectedSounds)
                                    ->inRandomOrder()
                                    ->limit(10 - count($selectedSounds))
                                    ->pluck('sound')
                                    ->toArray();

        $buttonContent = array_merge($selectedSounds, $additionalSounds);

        shuffle($buttonContent);

        $labelContent = implode('', $randomHiragana);
        $soundLabelContent = implode('', $selectedSounds);

        return view('hiragana3', [
            'labelContent' => $labelContent,
            'buttonContent' => $buttonContent,
            'soundLabelContent' => $soundLabelContent,
        ]);
    }

    public function hiraganaTest4()
    {
        $selectedHiraganaRows = Hiragana::where('lesson', 1)
                                        ->inRandomOrder()
                                        ->limit(rand(3, 5))
                                        ->get();


        $randomSounds = $selectedHiraganaRows->pluck('sound')->toArray();
        $selectedHiragana = $selectedHiraganaRows->pluck('character')->toArray();

        $additionalHiragana = Hiragana::where('lesson', 1)
                                    ->whereNotIn('character', $selectedHiragana)
                                    ->inRandomOrder()
                                    ->limit(10 - count($selectedHiragana))
                                    ->pluck('character')
                                    ->toArray();

        $buttonContent = array_merge($selectedHiragana, $additionalHiragana);

        shuffle($buttonContent);

        $labelContent = implode('', $randomSounds);
        $invisibleLabelContent = implode('', $selectedHiragana);

        return view('hiragana4', [
            'labelContent' => $labelContent,
            'buttonContent' => $buttonContent,
            'invisibleLabelContent' => $invisibleLabelContent,
        ]);
    }
    //katakana
    //________________________________________________________________________
    public function katakanaTest1()
    {

        $katakanaLesson1 = Katakana::where('lesson', 1)->inRandomOrder()->first();

        $randomSounds = Katakana::where('lesson', 1)
            ->where('sound', '!=', $katakanaLesson1->sound)
            ->inRandomOrder()
            ->limit(3)
            ->pluck('sound')
            ->toArray();

        $randomSounds[] = $katakanaLesson1->sound;

        shuffle($randomSounds);

        return view('katakana', [
            'katakanaLesson1' => $katakanaLesson1,
            'randomSounds' => $randomSounds,
        ]);
    }

    public function katakanaTest2()
    {
        $randomCharacters = Katakana::where('lesson', 1)->inRandomOrder()->limit(5)->get();
        
        $characterData = [];
        foreach ($randomCharacters as $character) {
            $characterData[] = [
                'id' => $character->id,
                'character' => $character->character,
                'sound' => $character->sound,
            ];
        }

        return view('katakana2', compact('characterData'));
    }

    public function katakanaTest3()
    {
        $selectedKatakanaRows = Katakana::where('lesson', 1)
                                        ->inRandomOrder()
                                        ->limit(rand(3, 5))
                                        ->get();

        $randomKatakana = $selectedKatakanaRows->pluck('character')->toArray();
        $selectedSounds = $selectedKatakanaRows->pluck('sound')->toArray();

        $additionalSounds = Katakana::where('lesson', 1)
                                    ->whereNotIn('sound', $selectedSounds)
                                    ->inRandomOrder()
                                    ->limit(10 - count($selectedSounds))
                                    ->pluck('sound')
                                    ->toArray();

        $buttonContent = array_merge($selectedSounds, $additionalSounds);

        shuffle($buttonContent);

        $labelContent = implode('', $randomKatakana);
        $soundLabelContent = implode('', $selectedSounds);

        return view('katakana3', [
            'labelContent' => $labelContent,
            'buttonContent' => $buttonContent,
            'soundLabelContent' => $soundLabelContent,
        ]);
    }

    public function katakanaTest4()
    {
        $selectedKatakanaRows = Katakana::where('lesson', 1)
                                        ->inRandomOrder()
                                        ->limit(rand(3, 5))
                                        ->get();


        $randomSounds = $selectedKatakanaRows->pluck('sound')->toArray();
        $selectedKatakana = $selectedKatakanaRows->pluck('character')->toArray();

        $additionalKatakana = Katakana::where('lesson', 1)
                                    ->whereNotIn('character', $selectedKatakana)
                                    ->inRandomOrder()
                                    ->limit(10 - count($selectedKatakana))
                                    ->pluck('character')
                                    ->toArray();

        $buttonContent = array_merge($selectedKatakana, $additionalKatakana);

        shuffle($buttonContent);

        $labelContent = implode('', $randomSounds);
        $invisibleLabelContent = implode('', $selectedKatakana);

        return view('katakana4', [
            'labelContent' => $labelContent,
            'buttonContent' => $buttonContent,
            'invisibleLabelContent' => $invisibleLabelContent,
        ]);
    }
}
