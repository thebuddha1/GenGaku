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
                    <h1>Make New Group</h1>
                    <form method="POST" action="{{ route('save-group') }}">
                        @csrf
                        <div>
                            <label for="groupname">Group Name:</label>
                            <input type="text" id="groupname" name="groupname">
                        </div>
                        <div>
                            <label for="groupmessage">Group Message (optional):</label>
                            <textarea id="groupmessage" name="groupmessage" rows="4" cols="50"></textarea>
                        </div>
                        <button type="submit">Make New Group</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
