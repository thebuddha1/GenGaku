<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        
        $user->profileStatistic()->create([
            'experience' => 0,
            'streak' => 1,
            'last_login' => now(),
            'logged_in_today' => true,
            'finished_tests' => 0,
        ]);

        $user->profileProgression()->create([
            'cur_chpt' => 1,
            'cur_lsn' => 1,
            'fnshd_tsts' => 0,
            'cur_hrgn' => 1,
            'cur_ktkn' => 1,
            'fnshd_tsts_hir' => 0,
            'fnshd_tsts_kat' => 0,
        ]);

        $user->profileSettings()->create([
            'kanji' => true,
            'hiragana' => false,
            'romanji' => false,
        ]);

        return $user;

        /*
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        */
    }
}
