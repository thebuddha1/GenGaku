<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile statistics') }}
        </h2>
    </x-slot>
<!--
    -->
        <div class="py-12 flex flex-col justify-between items-center">        
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800">
                        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                            <p class="mb-2 text-gray-800 dark:text-gray-200">Your experience: <strong>{{ auth()->user()->profileStatistic->experience }}</strong></p>
                            <p class="mb-2 text-gray-800 dark:text-gray-200">Total finished tests across all courses: <strong>{{ auth()->user()->profileStatistic->finished_tests }}</strong></p>
                        </div>
                        <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold mb-4 text-gray-800 dark:text-gray-200 leading-tight"><strong>Main course</strong></h1>
                        </div>
                        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        
                            <p class="mb-8 text-gray-800 dark:text-gray-200">You are at lesson <strong>{{ auth()->user()->profileProgression->cur_lsn }}</strong> of chapter <strong>{{ auth()->user()->profileProgression->cur_chpt }}</strong> of the main course</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">You have finished <strong>{{ auth()->user()->profileProgression->fnshd_tsts }}</strong> tests in the current lesson</p>
                        </div>
                        <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold mb-4 text-gray-800 dark:text-gray-200 leading-tight"><strong>Hiragana course</strong></h1>
                        </div>
                        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">You are at lesson <strong>{{ auth()->user()->profileProgression->cur_hrgn }}</strong> of the Hiragana course</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">You have finished <strong>{{ auth()->user()->profileProgression->fnshd_tsts_hir }}</strong> tests in the current hiragana lesson</p>
                        </div>
                        <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold mb-4 text-gray-800 dark:text-gray-200 leading-tight"><strong>Katakana course</strong></h1>
                        </div>
                        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">    
                            <p class="mb-8 text-gray-800 dark:text-gray-200">You are at Lesson <strong>{{ auth()->user()->profileProgression->cur_ktkn }}</strong> of the Katakana course</p>
                            <p class="mb-8 text-gray-800 dark:text-gray-200">You have finished <strong>{{ auth()->user()->profileProgression->fnshd_tsts_kat }}</strong> tests in the current katakana lesson</p>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
</x-app-layout>