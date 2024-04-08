<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 leading-tight">
            {{ __('Writing course') }}
        </h2>
    </x-slot>
<!--
    -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="cur_hrgn" value="{{ __('Current Lesson (hiragana)') }}" />
                    <p>{{ auth()->user()->profileProgression->cur_hrgn }}</p>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="fnshd_tsts_hir" value="{{ __('Finished tests in current lesson(hiragana)') }}" />
                    <p>{{ auth()->user()->profileProgression->fnshd_tsts_hir }}</p>
                </div>
                <h1 class="text-4xl font-semibold">Hiragana</h1>
                <h1 class="text-2xl font-semibold">rizsa</h1>
                <h2 class="text-1xl font-bold">rizsa</h2>
                <a href="/quiz-hir?lesson=1"><button type="button">Start Test</button></a>
                <h1 class="text-2xl font-semibold">rizsa</h1>
                <h2 class="text-1xl font-bold">rizsa</h2>
                <a href="/quiz-hir?lesson=2"><button type="button">Start Test</button></a>
                <h1 class="text-2xl font-semibold">rizsa</h1>
                <h2 class="text-1xl font-bold">rizsa</h2>
                <a href="/quiz-hir?lesson=3"><button type="button">Start Test</button></a>
            </div>
        </div>
    </div>
</x-app-layout>