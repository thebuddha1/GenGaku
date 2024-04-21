<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 leading-tight">
            {{ __('Groups') }}
        </h2>
    </x-slot>
<!--
    -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <style>
                .navbar {
                    padding: 10px;
                }

                .navbar ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                }

                .navbar li {
                    display: inline;
                    margin-right: 20px;
                }

                .navbar a {
                    text-decoration: none;
                    color: black;
                    font-weight: bold;
                }

                .navbar a:hover {
                    color: blue;
                }

                #groupList li {
                    display: block;
                }

                #groupList li a {
                    margin-left: 10px;
                }

            </style>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div>
                <nav class="navbar">
                    <ul>
                        <li><a href="/groups">My Groups</a></li>
                        <li><a href="/group-find">Find Group</a></li>
                        <li><a href="/group-make">Make New Group</a></li>
                    </ul>
                </nav>
            </div>    
                <div>
                    <h1>Find Groups</h1>
                    <form id="searchForm">
                        <label for="search">Search by group name:</label>
                        <input type="text" id="search" name="search">
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <ul id="groupList">
                        @foreach($groups as $group)
                            <li>
                                <span>{{ $group->group_name }}</span>
                                <a href="{{ route('request.join', ['groupId' => $group->id]) }}">Request Join</a>
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