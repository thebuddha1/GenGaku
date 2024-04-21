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

                .message-area {
                    border: 1px solid #ccc;
                    padding: 10px;
                    margin-top: 20px;
                }

                .message {
                    margin-bottom: 10px;
                }

                .message p {
                    margin: 0; /* Remove default margin */
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
                    <h1>{{ $group->group_name }}</h1>
                    @if($groupMessages->isEmpty())
                        <div class="message-area">
                            <h2>Group Messages:</h2>
                            <h3>No messages yet</h3>
                        </div>
                    @else
                        <div class="message-area">
                            <h2>Group Messages:</h2>
                            @foreach($groupMessages as $message)
                                <div class="message">
                                    <p><strong>{{ $message->created_at->format('M d, Y H:i') }}:</strong> {{ $message->message }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <h2>Group Members:</h2>
                    <ul>
                        @foreach($groupMembers as $member)
                            <li>{{ $member->name }}</li>
                        @endforeach
                    </ul>
                    @if(auth()->user()->id !== $group->group_owner_id)
                        <form action="{{ route('groups.leave', ['groupId' => $group->id]) }}" method="POST">
                            @csrf
                            <button type="submit">Leave Group</button>
                        </form>
                    @endif
                    @if(auth()->user()->id === $group->group_owner_id)
                        <form action="{{ route('groups.invite', ['groupId' => $group->id]) }}" method="POST">
                            @csrf
                            <label for="invite">Invite new member:</label>
                            <span>
                                <input type="text" id="invite" name="invite">
                                <button type="submit">Invite</button>
                            </span>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form id="changeMessage" method="POST" action="{{ route('groups.sendMessage', ['groupId' => $group->id]) }}">
                            @csrf
                            <label for="change">Add new group message:</label>
                            <span>
                                <textarea id="change" name="change" rows="4" cols="50"></textarea>
                                <button type="submit">Send Message</button>
                            </span>
                        </form>
                        <h2>
                            Join requests:
                        </h2>
                        @if($joinRequests->isEmpty())
                            <p>No join requests yet.</p>
                        @else
                            <ul>
                                @foreach($joinRequests as $request)
                                    @php
                                    $user = App\Models\User::find($request->requester_id);
                                @endphp
                                <li>
                                    <span>
                                        {{ $user->name ?? 'Unknown User' }}
                                    </span>
                                    <form action="{{ route('groups.join.accept', ['groupId' => $group->id, 'userId' => $user->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit">Accept</button>
                                    </form>
                                    <form action="{{ route('groups.join.deny', ['groupId' => $group->id, 'userId' => $user->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit">Deny</button>
                                    </form>
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    @endif
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>