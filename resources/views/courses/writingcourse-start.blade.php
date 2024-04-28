<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Writing course') }}
        </h2>
    </x-slot>
    
    <div class="py-12 flex flex-col justify-between items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="font-semibold text-2xl mb-4 text-gray-800 dark:text-gray-200 leading-tight">Welcome to the writing courses!</h1>
                </div>
                <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    <p class="mb-8 text-gray-800 dark:text-gray-200">In these 2 courses you will be learning about 2 of Japan's 3 (technically 4) writing systems. <br>
                        Both courses will walk you through all of the system's symbols in the form of 10 lessons. <br>
                        You can access the courses on the links down below.
                    </p>    
                </div>
                <div class="flex justify-center mb-8">
                    <a href="/hiragana-course">
                        <button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-20">Hiragana</button>
                    </a>
                    <a href="/katakana-course">
                        <button type="button" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md ml-20">Katakana</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
