<!-- Assuming you have the necessary HTML structure in your member-profile.blade.php -->

<div>
    <h2>{{ $user->name }}</h2>
    
    <p>Experience: {{ $profileStatistics->experience }}</p>
    <p>Finished Tests: {{ $profileStatistics->finished_tests }}</p>
    
    <p>Current Lesson: {{ $profileProgression->cur_lsn }}</p>
    <p>Current Chapter: {{ $profileProgression->cur_chpt }}</p>
    <p>Finished Tests: {{ $profileProgression->fnshd_tsts }}</p>
    <p>Current Kata: {{ $profileProgression->cur_ktkn }}</p>
    <p>Current Hiragana: {{ $profileProgression->cur_hrgn }}</p>
    <p>Finished Katakana: {{ $profileProgression->fnshd_tsts_kat }}</p>
    <p>Finished Hiragana: {{ $profileProgression->fnshd_tsts_hir }}</p>
</div>
