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
                <h1>--Bevezető--</h1>
                <a href="/hiragana-course"><button type="button">Hiragana</button></a>
                <a href="/katakana-course"><button type="button">Katakana</button></a>
            </div>
        </div>
    </div>
</x-app-layout>