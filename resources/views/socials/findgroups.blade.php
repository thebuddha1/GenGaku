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
                        <li style="display: inline; margin-right: 20px;" class="mb-8 text-gray-800 dark:text-gray-200"><a href="/group-make">Make New Group</a></li>
                    </ul>
                </div> 
                <div class="p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <h1 class="mb-8 text-gray-800 dark:text-gray-200">Find Groups</h1>
                        <form id="searchForm">
                            <label for="search" class="mb-8 text-gray-800 dark:text-gray-200">Search by group name:</label>
                            <input type="text" id="search" name="search" style="width: 400px; padding: 8px; border-radius: 5px; text-align: center;">
                        </form>
                    </div>
                </div>
                <div class="p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                {{ session('success') }}
                            </p>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            <p class="mb-8 text-gray-800 dark:text-gray-200">
                                {{ session('error') }}
                            </p>
                        </div>
                    @endif
                            
                    <ul id="groupList">
                        @foreach($groups as $group)
                            <li class="flex items-center mb-4">
                                <span class="mb-8 text-gray-800 dark:text-gray-200 mr-5">{{ $group->group_name }}</span>
                                <p class="mb-8 text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md">
                                    <a href="{{ route('request.join', ['groupId' => $group->id]) }}">Request Join</a>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search');
            const groupList = document.getElementById('groupList');
            const groupItems = groupList.getElementsByTagName('li');

            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();

                for (let i = 0; i < groupItems.length; i++) {
                    const groupItem = groupItems[i];
                    const groupName = groupItem.querySelector('span').textContent.toLowerCase();

                    if (groupName.includes(searchTerm)) {
                        groupItem.style.display = 'block';
                    } else {
                        groupItem.style.display = 'none';
                    }
                }
            });
        });
    </script>
</x-app-layout>