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
                    <h1>My groups:</h1>
                    <ul>
                        @if($groups->isEmpty())
                            <h2>You are not in any group yet</h2>
                        @else
                            @foreach($groups as $group)
                                <li><a href="{{ route('groups.overview', $group->id) }}">{{ $group->group_name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div>
                    <h1>Group invites from the following groups:</h1>
                    @if($groupInvites->isEmpty())
                        <p>No group invites.</p>
                    @else
                        <ul>
                            @foreach($groupInvites as $invite)
                                @php
                                    $group = $inviteGroups->where('id', $invite->group_id)->first();
                                @endphp
                                <li>
                                    {{ $group ? $group->group_name : 'Unknown Group' }}
                                    <form action="{{ route('groups.invite.accept', ['groupId' => $group->id, 'invitationId' => $invite->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit">Accept</button>
                                    </form>
                                    <form action="{{ route('groups.invite.reject', ['invitationId' => $invite->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit">Reject</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            <div>
        </div>
    </div>
</x-app-layout>