<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 leading-tight">
            {{ __('Main course') }}
        </h2>
    </x-slot>
<!--
    -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="cur_chpt" value="{{ __('Current chapter') }}" />
                    <p>{{ auth()->user()->profileProgression->cur_chpt }}</p>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="cur_lsn" value="{{ __('Current lesson') }}" />
                    <p>{{ auth()->user()->profileProgression->cur_lsn }}</p>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="fnshd_tsts" value="{{ __('Finished tests in current lesson') }}" />
                    <p>{{ auth()->user()->profileProgression->fnshd_tsts }}</p>
                </div>
                <h1 class="text-4xl font-semibold">Main course</h1>
                <h1 class="text-2xl font-semibold">Chapter 1</h1>
                <h2 class="text-1xl font-bold">Lesson 1</h2>
                <a href="/quiz-main?chapter=1&lesson=1"><button type="button">Start Test</button></a>
                <h2 class="text-1xl font-bold">Lesson 2</h2>
                <a href="/quiz-main?chapter=1&lesson=2"><button type="button">Start Test</button></a>
                <h2 class="text-1xl font-bold">Lesson 3</h2>
                <a href=""><button type="button">Start Test</button></a>
                <h1 class="text-2xl font-semibold">Chapter 2</h1>
                <h2 class="text-1xl font-bold">Lesson 1</h2>
                <a href=""><button type="button">Start Test</button></a>
                <h2 class="text-1xl font-bold">Lesson 2</h2>
                <a href=""><button type="button">Start Test</button></a>
                <h2 class="text-1xl font-bold">Lesson 3</h2>
                <a href=""><button type="button">Start Test</button></a>
            </div>
        </div>
    </div>
</x-app-layout>