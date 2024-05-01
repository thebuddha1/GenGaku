<?php

namespace App\Http\Controllers;

use App\Models\ProfileSettings;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function updateProfileSettings(Request $request)
    {
        $user = auth()->user();
        $profileSettings = $user->profileSettings;

        $profileSettings->kanji = $request->input('kanji', false);
        $profileSettings->hiragana = $request->input('hiragana', false);
        $profileSettings->romanji = $request->input('romanji', false);

        $profileSettings->save();

        return redirect()->back()->with('success', 'Profile settings updated successfully');
    }

}
