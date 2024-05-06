<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $user->name }}'s statistics
        </h2>
    </x-slot>
<!--
    -->
        <div class="py-12 flex flex-col justify-between items-center">        
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800">
                        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">    
                            <p class="mb-2 text-gray-800 dark:text-gray-200">{{ $user->name }} has <strong>{{ $profileStatistics->experience }}</strong> experience</p>
                            <p class="mb-2 text-gray-800 dark:text-gray-200">and finished <strong>{{ $profileStatistics->finished_tests }}</strong> tests in total</p>
                        </div>
                        <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold mb-4 text-gray-800 dark:text-gray-200 leading-tight"><strong>Main course</strong></h1>
                        </div>  
                        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-800 dark:text-gray-200">{{ $user->name }} is at lesson <strong>{{ $profileProgression->cur_lsn }}</strong> of chapter <strong>{{ $profileProgression->cur_chpt }}</strong></p>
                            <p class="mb-2 text-gray-800 dark:text-gray-200">and finished <strong>{{ $profileProgression->fnshd_tsts }}</strong> tests in the current lesson</p>
                        </div>
                        <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold mb-4 text-gray-800 dark:text-gray-200 leading-tight"><strong>Hiragana course</strong></h1>
                        </div>
                        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-800 dark:text-gray-200">{{ $user->name }} is at lesson <strong>{{ $profileProgression->cur_hrgn }}</strong></p>
                            <p class="mb-2 text-gray-800 dark:text-gray-200">and finished <strong>{{ $profileProgression->fnshd_tsts_hir }}</strong> tests</p>
                        </div>
                        <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h1 class="font-semibold mb-4 text-gray-800 dark:text-gray-200 leading-tight"><strong>Katakana course</strong></h1>
                        </div>
                        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-800 dark:text-gray-200">{{ $user->name }} is at lesson <strong>{{ $profileProgression->cur_ktkn }}</strong></p>
                            <p class="mb-2 text-gray-800 dark:text-gray-200">and finished <strong>{{ $profileProgression->fnshd_tsts_kat }}</strong> tests</p>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
</x-app-layout>