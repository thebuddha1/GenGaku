<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hiragana;
use App\Models\Katakana;
use App\Models\ProfileStatistic;
use App\Models\ProfileProgression;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class WritingCourseController extends Controller
{
    //hiragana
    public function hiraganaTest1($num)
    {

        $hiragana = Hiragana::where('lesson', $num)->inRandomOrder()->first();

        $randomSounds = Hiragana::where('lesson', $num)
            ->where('sound', '!=', $hiragana->sound)
            ->inRandomOrder()
            ->limit(3)
            ->pluck('sound')
            ->toArray();

        $randomSounds[] = $hiragana->sound;

        shuffle($randomSounds);

        return view('courses\writingcourses\hiragana\hiragana', [
            'hiragana' => $hiragana,
            'randomSounds' => $randomSounds,
        ]);
    }

    public function hiraganaTest2($num)
    {
        $randomCharacters = Hiragana::where('lesson', $num)->inRandomOrder()->limit(5)->get();
        
        $characterData = [];
        foreach ($randomCharacters as $character) {
            $characterData[] = [
                'id' => $character->id,
                'character' => $character->character,
                'sound' => $character->sound,
            ];
        }

        return view('courses\writingcourses\hiragana\hiragana2', compact('characterData'));
    }

    public function hiraganaTest3($num)
    {
        $selectedHiraganaRows = Hiragana::where('lesson', $num)
                                        ->inRandomOrder()
                                        ->limit(rand(3, 5))
                                        ->get();

        $randomHiragana = $selectedHiraganaRows->pluck('character')->toArray();
        $selectedSounds = $selectedHiraganaRows->pluck('sound')->toArray();

        $additionalSounds = Hiragana::where('lesson', $num)
                                    ->whereNotIn('sound', $selectedSounds)
                                    ->inRandomOrder()
                                    ->limit(10 - count($selectedSounds))
                                    ->pluck('sound')
                                    ->toArray();

        $buttonContent = array_merge($selectedSounds, $additionalSounds);

        shuffle($buttonContent);

        $labelContent = implode('', $randomHiragana);
        $soundLabelContent = implode('', $selectedSounds);

        return view('courses\writingcourses\hiragana\hiragana3', [
            'labelContent' => $labelContent,
            'buttonContent' => $buttonContent,
            'soundLabelContent' => $soundLabelContent,
        ]);
    }

    public function hiraganaTest4($num)
    {
        $selectedHiraganaRows = Hiragana::where('lesson', $num)
                                        ->inRandomOrder()
                                        ->limit(rand(3, 5))
                                        ->get();


        $randomSounds = $selectedHiraganaRows->pluck('sound')->toArray();
        $selectedHiragana = $selectedHiraganaRows->pluck('character')->toArray();

        $additionalHiragana = Hiragana::where('lesson', $num)
                                    ->whereNotIn('character', $selectedHiragana)
                                    ->inRandomOrder()
                                    ->limit(10 - count($selectedHiragana))
                                    ->pluck('character')
                                    ->toArray();

        $buttonContent = array_merge($selectedHiragana, $additionalHiragana);

        shuffle($buttonContent);

        $labelContent = implode('', $randomSounds);
        $characterLabelContent = implode('', $selectedHiragana);

        return view('courses\writingcourses\hiragana\hiragana4', [
            'labelContent' => $labelContent,
            'buttonContent' => $buttonContent,
            'characterLabelContent' => $characterLabelContent,
        ]);
    }
    //katakana
    //________________________________________________________________________
    public function katakanaTest1($num)
    {

        $katakana = Katakana::where('lesson', $num)->inRandomOrder()->first();

        $randomSounds = Katakana::where('lesson', $num)
            ->where('sound', '!=', $katakana->sound)
            ->inRandomOrder()
            ->limit(3)
            ->pluck('sound')
            ->toArray();

        $randomSounds[] = $katakana->sound;

        shuffle($randomSounds);

        return view('courses\writingcourses\katakana\katakana', [
            'katakana' => $katakana,
            'randomSounds' => $randomSounds,
        ]);
    }

    public function katakanaTest2($num)
    {
        $randomCharacters = Katakana::where('lesson', $num)->inRandomOrder()->limit(5)->get();
        
        $characterData = [];
        foreach ($randomCharacters as $character) {
            $characterData[] = [
                'id' => $character->id,
                'character' => $character->character,
                'sound' => $character->sound,
            ];
        }

        return view('courses\writingcourses\katakana\katakana2', compact('characterData'));
    }

    public function katakanaTest3($num)
    {
        $selectedKatakanaRows = Katakana::where('lesson', $num)
                                        ->inRandomOrder()
                                        ->limit(rand(3, 5))
                                        ->get();

        $randomKatakana = $selectedKatakanaRows->pluck('character')->toArray();
        $selectedSounds = $selectedKatakanaRows->pluck('sound')->toArray();

        $additionalSounds = Katakana::where('lesson', $num)
                                    ->whereNotIn('sound', $selectedSounds)
                                    ->inRandomOrder()
                                    ->limit(10 - count($selectedSounds))
                                    ->pluck('sound')
                                    ->toArray();

        $buttonContent = array_merge($selectedSounds, $additionalSounds);

        shuffle($buttonContent);

        $labelContent = implode('', $randomKatakana);
        $soundLabelContent = implode('', $selectedSounds);

        return view('courses\writingcourses\katakana\katakana3', [
            'labelContent' => $labelContent,
            'buttonContent' => $buttonContent,
            'soundLabelContent' => $soundLabelContent,
        ]);
    }

    public function katakanaTest4($num)
    {
        $selectedKatakanaRows = Katakana::where('lesson', $num)
                                        ->inRandomOrder()
                                        ->limit(rand(3, 5))
                                        ->get();


        $randomSounds = $selectedKatakanaRows->pluck('sound')->toArray();
        $selectedKatakana = $selectedKatakanaRows->pluck('character')->toArray();

        $additionalKatakana = Katakana::where('lesson', $num)
                                    ->whereNotIn('character', $selectedKatakana)
                                    ->inRandomOrder()
                                    ->limit(10 - count($selectedKatakana))
                                    ->pluck('character')
                                    ->toArray();

        $buttonContent = array_merge($selectedKatakana, $additionalKatakana);

        shuffle($buttonContent);

        $labelContent = implode('', $randomSounds);
        $characterLabelContent = implode('', $selectedKatakana);

        return view('courses\writingcourses\katakana\katakana4', [
            'labelContent' => $labelContent,
            'buttonContent' => $buttonContent,
            'characterLabelContent' => $characterLabelContent,
        ]);
    }

    //______________________________
    public function saveProgressHir(Request $request)
    {
        $userId = auth()->id();
        
        $profileStat = ProfileStatistic::where('user_id', $userId)->first();

        if ($profileStat) {
            $experience = $request->input('experience');
            $profileStat->experience += $experience;
            $profileStat->finished_tests += $request->input('testprog');
            $profileStat->save();
        } else {
            return redirect('/hiragana-course')->with('error', 'Something went wrong finding the ProfileStatistics');
        }

        $profileProgress = ProfileProgression::where('user_id', $userId)->first();

        if ($profileProgress) {
            $testProgress = $request->input('testprog');
            $profileProgress->fnshd_tsts_hir += $testProgress;
            if ($profileProgress->fnshd_tsts_hir >= 10) {
                $profileProgress->fnshd_tsts_hir = 0;
                $profileProgress->cur_hrgn += 1;
            }
            $profileProgress->save();

            return redirect('/hiragana-course')->with('success', 'Progress saved successfully');
        } else {
            return redirect('/hiragana-course')->with('error', 'Something went wrong finding the ProfileProgression');
        }
    }

    public function saveProgressKat(Request $request)
    {
        $userId = auth()->id();
        
        $profileStat = ProfileStatistic::where('user_id', $userId)->first();

        if ($profileStat) {
            $experience = $request->input('experience');
            $profileStat->experience += $experience;
            $profileStat->finished_tests += $request->input('testprog');
            $profileStat->save();
        } else {
            return redirect('/hiragana-course')->with('error', 'Something went wrong finding the ProfileStatistics');
        }

        $profileProgress = ProfileProgression::where('user_id', $userId)->first();

        if ($profileProgress) {
            $testProgress = $request->input('testprog');
            $profileProgress->fnshd_tsts_kat += $testProgress;
            if ($profileProgress->fnshd_tsts_kat >= 10) {
                $profileProgress->fnshd_tsts_kat = 0;
                $profileProgress->cur_ktkn += 1;
            }
            $profileProgress->save();

            return redirect('/katakana-course')->with('success', 'Progress saved successfully');
        } else {
            return redirect('/katakana-course')->with('error', 'Something went wrong finding the ProfileProgression');
        }
    }

}
