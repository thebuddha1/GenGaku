<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Groups') }}
        </h2>
    </x-slot>
<!--
    -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <ul style="list-style-type: none; margin: 0; padding: 0;">
                        <li style="display: inline; margin-right: 20px;" class="mb-8 text-gray-800 dark:text-gray-200"><a href="/groups">My Groups</a></li>
                        <li style="display: inline; margin-right: 20px;" class="mb-8 text-gray-800 dark:text-gray-200"><a href="/group-find">Find Group</a></li>
                        <li style="display: inline;"><a href="/group-make" class="mb-8 text-gray-800 dark:text-gray-200">Create New Group</a></li>
                    </ul>
                </div>
                <div class="p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="mb-2 text-gray-800 dark:text-gray-200">New Group</h1>
                </div>
                <div class="p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('save-group') }}">
                        @csrf
                        <div style="margin-bottom: 16px;">
                            <label for="groupname" class="mb-8 text-gray-800 dark:text-gray-200">Group Name:</label>
                            <input type="text" id="groupname" name="groupname" style="width: 400px; padding: 8px; border-radius: 5px;">
                        </div>
                        <div>
                            <label for="groupmessage" class="mb-8 text-gray-800 dark:text-gray-200">Group Message (optional):</label>
                            <textarea id="groupmessage" name="groupmessage" rows="4" cols="50" style="width: 400px; padding: 8px; border-radius: 5px; vertical-align: middle;"></textarea>
                        </div>

                        <button type="submit" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md">Create New Group</button>
                    </form>
                    @if(session('error'))
                        <div class="alert alert-danger">
                            <p class="mb-8 text-gray-800 dark:text-gray-200" style="color: red !important;">
                                {{ session('error') }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
