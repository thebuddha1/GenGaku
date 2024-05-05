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
                    <h1 class="mb-8 text-gray-800 dark:text-gray-200"><strong>{{ $group->group_name }}</strong></h1>
                        @if (session('success'))
                        <div class="alert alert-success mt-3">
                            <p class="mb-8 text-gray-800 dark:text-gray-200" style="color: green !important;">
                                {{ session('success') }}
                            </p>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            <p class="mb-8 text-gray-800 dark:text-gray-200" style="color: red !important;">
                                {{ session('error') }}
                            </p>
                        </div>
                    @endif
                </div>
                <div class="p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($groupMessages->isEmpty())
                            <h2 class="mb-8 text-gray-800 dark:text-gray-200"><strong>Group Messages:</strong></h2>
                            <div class="message-area">
                                <h3 class="mb-8 text-gray-800 dark:text-gray-200">No messages yet</h3>
                            </div>
                        @else
                            <h2 class="mb-8 text-gray-800 dark:text-gray-200"><strong>Group Messages:</strong></h2>
                            <div class="message-area">
                                @foreach($groupMessages as $message)
                                    <div class="message">
                                        <p class="text-gray-800 dark:text-gray-200"><strong>{{ $message->created_at->format('M d, Y H:i') }}:</strong> {{ $message->message }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div> 
                <div class="p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h2 class="mb-4 text-gray-800 dark:text-gray-200"><strong>Group Members:</strong></h2>
                    <ul>
                        @foreach($groupMembers as $member)
                            <li class="mb-1 text-gray-800 dark:text-gray-200">
                                <a href="{{ route('groups.member', ['memberId' => $member->id]) }}">{{ $member->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>    
                    @if(auth()->user()->id !== $group->group_owner_id)
                        <form action="{{ route('groups.leave', ['groupId' => $group->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md">Leave Group</button>
                        </form>
                    @endif
                    @if(auth()->user()->id === $group->group_owner_id)
                        <div class="p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <form action="{{ route('groups.invite', ['groupId' => $group->id]) }}" method="POST">
                                @csrf
                                <label for="invite" class="mb-4 text-gray-800 dark:text-gray-200"><strong>Invite new member:</strong></label>
                                <span>
                                    <input type="text" id="invite" name="invite" style="width: 400px; padding: 8px; border-radius: 5px;">
                                    <button type="submit" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md">Invite</button>
                                </span>
                            </form>
                        </div>
                        <div class="p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <form id="changeMessage" method="POST" action="{{ route('groups.sendMessage', ['groupId' => $group->id]) }}">
                                @csrf
                                <label for="change" class="mb-4 text-gray-800 dark:text-gray-200"><strong>Add new group message: </strong></label>
                                <span>
                                    <textarea id="change" name="change" rows="4" cols="50" style="width: 400px; padding: 8px; border-radius: 5px; vertical-align: middle;"></textarea>
                                    <button type="submit" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md">Send Message</button>
                                </span>
                            </form>
                        </div>
                        <div class="p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <h2 class="mb-4 text-gray-800 dark:text-gray-200"><strong>
                                Join requests:
                            </strong></h2>
                            @if($joinRequests->isEmpty())
                                <p class="text-gray-800 dark:text-gray-200">No join requests yet.</p>
                            @else
                                <ul>
                                    @foreach($joinRequests as $request)
                                        @php
                                        $user = App\Models\User::find($request->requester_id);
                                    @endphp
                                    <li>
                                        <span>
                                            <p class="mb-8 text-gray-800 dark:text-gray-200 mr-8" style="display: inline-block;">
                                                {{ $user->name ?? 'Unknown User' }}
                                            </p>
                                        </span>
                                        <form action="{{ route('groups.join.accept', ['groupId' => $group->id, 'userId' => $user->id]) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <button type="submit" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md" style="min-width: 100px;">Accept</button>
                                        </form>
                                        <form action="{{ route('groups.join.deny', ['groupId' => $group->id, 'userId' => $user->id]) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <button type="submit" class="text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md" style="min-width: 100px;">Deny</button>
                                        </form>
                                    </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endif
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>