<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Sentence;
use App\Models\ProfileSettings;
use App\Models\ProfileStatistic;
use App\Models\ProfileProgression;
use Illuminate\Support\Facades\Session;

class MainCourseController extends Controller
{
    public function wordTest1($chap, $less)
    {
        $wordLesson1 = Word::where('lesson', $less)
                    ->where('chapter', $chap)
                    ->inRandomOrder()
                    ->first();

        $random = Word::where('lesson', $less)
                    ->where('chapter', $chap)
                    ->where('meaning_en', '!=', $wordLesson1->meaning_en)
                    ->inRandomOrder()
                    ->limit(3)
                    ->pluck('meaning_en')
                    ->toArray();

        $random[] = $wordLesson1->meaning_en;

        $random = array_unique($random);

        while (count($random) < 4) {
            $additionalRandom = Word::where('lesson', $less)
                                ->where('chapter', $chap)
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

        return view('courses\maincourse\word', [
            'wordLesson1' => $wordLesson1,
            'random' => $random,
        ]);
    }

    public function wordTest2($chap, $less)
    {
        $randomWords = Word::where('lesson', $less)
            ->where('chapter', $chap)
            ->inRandomOrder()
            ->limit(5)
            ->get();
        
        $wordData = [];
        foreach ($randomWords as $word) {
            $wordData[] = [
                'id' => $word->id,
                'word' => $word->word,
                'word_hir' => $word->word_hir,
                'word_rom' => $word->word_rom,
                'meaning' => $word->meaning_en,
            ];
        }

        return view('courses\maincourse\word2', compact('wordData'));
    }

    public function sentenceTest1($chap, $less)
    {
        $sentenceData = Sentence::where('lesson', $less)
            ->where('chapter', $chap)
            ->inRandomOrder()
            ->first(['meaning_en', 'sentence', 'sentence_hir', 'sentence_rom']);

        $sentenceArray = explode(' ', $sentenceData->sentence);
        $sentenceHirArray = explode(' ', $sentenceData->sentence_hir);
        $sentenceRomArray = explode(' ', $sentenceData->sentence_rom);

        $words = Word::where('chapter', $chap)
            ->inRandomOrder()
            ->limit(10)
            ->get(['word', 'word_hir', 'word_rom']);

        $sentenceArray = $this->fillArray($sentenceArray, $words, 1);
        $sentenceHirArray = $this->fillArray($sentenceHirArray, $words, 2);
        $sentenceRomArray = $this->fillArray($sentenceRomArray, $words, 3);

        return view('courses\maincourse\sentence', [
            'meaning_en' => $sentenceData->meaning_en,
            'sentence' => $sentenceData->sentence,
            'sentence_hir' => $sentenceData->sentence_hir,
            'sentence_rom' => $sentenceData->sentence_rom,
            'sentenceArray' => $sentenceArray,
            'sentenceHirArray' => $sentenceHirArray,
            'sentenceRomArray' => $sentenceRomArray,
        ]);
    }

    public function sentenceTest2($chap, $less)
    {
        $sentenceData = Sentence::where('lesson', $less)
            ->where('chapter', $chap)
            ->inRandomOrder()
            ->first(['meaning_en', 'sentence', 'sentence_hir', 'sentence_rom']);

        $sentenceArray = explode(' ', $sentenceData->meaning_en);

        $words = Word::where('chapter', $chap)
            ->inRandomOrder()
            ->limit(10)
            ->get(['meaning_en']);

        $sentenceArray = $this->fillArray($sentenceArray, $words, 4);

        return view('courses\maincourse\sentence2', [
            'sentence' => $sentenceData->sentence,
            'sentence_hir' => $sentenceData->sentence_hir,
            'sentence_rom' => $sentenceData->sentence_rom,
            'meaning_en' => $sentenceData->meaning_en,
            'sentenceArray' => $sentenceArray,
        ]);
    }

    private function fillArray($sentenceParts, $words, $system)
    {
        $filledArray = [];
        $uniqueWords = collect();
        $i = 0;
        $wordArray = $words->toArray();

        while (count($filledArray) < 10) {
            if ($i % 2 == 0 && count($sentenceParts) > 0) {
                $word = array_shift($sentenceParts);
                if (!$uniqueWords->contains($word)) {
                    $filledArray[] = $word;
                    $uniqueWords->push($word);
                }
            } else {
                if (count($wordArray) > 0) {
                    $word = array_shift($wordArray);
                    if ($system == 1) {
                        $wordToAdd = $word['word'];
                    } elseif ($system == 2) {
                        $wordToAdd = $word['word_hir'];
                    } elseif ($system == 3) {
                        $wordToAdd = $word['word_rom'];
                    } elseif ($system == 4) {
                        $wordToAdd = $word['meaning_en'];
                    }
                    if (!$uniqueWords->contains($wordToAdd)) {
                        $filledArray[] = $wordToAdd;
                        $uniqueWords->push($wordToAdd);
                    }
                } else {
                    break;
                }
            }
            $i++;
        }

        shuffle($filledArray);

        return $filledArray;
    }
    //___________________________________
    public function saveProgress(Request $request)
    {
        $userId = auth()->id();
        
        $profileStat = ProfileStatistic::where('user_id', $userId)->first();

        if ($profileStat) {
            $experience = $request->input('experience');
            $profileStat->experience += $experience;
            $profileStat->finished_tests += $request->input('testprog');
            $profileStat->save();
        } else {
            return redirect('/maincourse-start')->with('error', 'Something went wrong finding the ProfileStatistics');
        }

        $profileProgress = ProfileProgression::where('user_id', $userId)->first();

        if ($profileProgress) {
            $testProgress = $request->input('testprog');
            $profileProgress->fnshd_tsts += $testProgress;
            if ($profileProgress->fnshd_tsts >= 10) {
                $profileProgress->fnshd_tsts = 0;
                $profileProgress->cur_lsn += 1;
            }
            if ($profileProgress->cur_lsn >= 3) {
                $profileProgress->cur_lsn = 1;
                $profileProgress->cur_chpt += 1;
            }
            $profileProgress->save();

            return redirect('/maincourse-start')->with('success', 'Progress saved successfully');
        } else {
            return redirect('/maincourse-start')->with('error', 'Something went wrong finding the ProfileProgression');
        }
    }


}
