<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hiragana;
use App\Models\Katakana;
use App\Models\ProfileStatistic;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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
        $characterLabelContent = implode('', $selectedHiragana);

        return view('hiragana4', [
            'labelContent' => $labelContent,
            'buttonContent' => $buttonContent,
            'characterLabelContent' => $characterLabelContent,
        ]);
    }
    //katakana
    //________________________________________________________________________
    public function katakanaTest1()
    {

        $katakana = Katakana::where('lesson', 1)->inRandomOrder()->first();

        $randomSounds = Katakana::where('lesson', 1)
            ->where('sound', '!=', $katakana->sound)
            ->inRandomOrder()
            ->limit(3)
            ->pluck('sound')
            ->toArray();

        $randomSounds[] = $katakana->sound;

        shuffle($randomSounds);

        return view('katakana', [
            'katakana' => $katakana,
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
        $characterLabelContent = implode('', $selectedKatakana);

        return view('katakana4', [
            'labelContent' => $labelContent,
            'buttonContent' => $buttonContent,
            'characterLabelContent' => $characterLabelContent,
        ]);
    }

    //______________________________
    public function updateUserExperience(Request $request)
    {
        try {
            // Check if user is authenticated
            if (!Auth::check()) {
                throw new \Exception('User not authenticated');
            }

            // Retrieve the user's ID
            $userId = Auth::id();

            // Retrieve the user's statistics
            $userStatistics = ProfileStatistic::where('user_id', $userId)->first();

            // Check if user statistics exist
            if (!$userStatistics) {
                throw new \Exception('User statistics not found');
            }

            // Update the experience
            $experienceToAdd = $request->input('experience');
            $userStatistics->experience += $experienceToAdd;
            $userStatistics->save();

            // Return success response
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to update user experience: ' . $e->getMessage());
            
            // Return error response
            return response()->json(['error' => 'Failed to update user experience'], 500);
        }
    }

    public function updateExperience(Request $request)
    {
        // Get the currently logged-in user's ID
        $userId = auth()->user()->id;
        
        // Get the experience value from the request
        $experience = $request->input('experience');
        
        // Update the experience for the user
        ProfileStatistics::where('user_id', $userId)->update(['experience' => $experience]);
        
        return response()->json(['success' => true]);
    }

}
