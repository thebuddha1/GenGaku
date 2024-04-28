<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Groups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <ul style="list-style-type: none; margin: 0; padding: 0;">
                        <li style="display: inline; margin-right: 20px;" class="mb-8 text-gray-800 dark:text-gray-200"><a href="/groups">My Groups</a></li>
                        <li style="display: inline; margin-right: 20px;" class="mb-8 text-gray-800 dark:text-gray-200"><a href="/group-find">Find Group</a></li>
                        <li style="display: inline;"><a href="/group-make" class="mb-8 text-gray-800 dark:text-gray-200">Make New Group</a></li>
                    </ul>
                </div>
                <div class="p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="p-6 lg:p-8 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <h1 class="mb-8 text-gray-800 dark:text-gray-200">My groups:</h1>
                        <ul>
                            @if($groups->isEmpty())
                                <h2 class="mb-8 text-gray-800 dark:text-gray-200">You are not in any group yet</h2>
                            @else
                                @foreach($groups as $group)
                                    <li class="text-gray-800 dark:text-gray-200"><a href="{{ route('groups.overview', $group->id) }}">{{ $group->group_name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="p-6 lg:p-8 dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="mb-8 text-gray-800 dark:text-gray-200">Group invites from the following groups:</h1>
                    
                    @if($groupInvites->isEmpty())
                        <p class="mb-8 text-gray-800 dark:text-gray-200">No group invites.</p>
                    @else
                        <ul>
                            @foreach($groupInvites as $invite)
                                @php
                                    $group = $inviteGroups->where('id', $invite->group_id)->first();
                                @endphp
                                <li class="flex items-center mb-4">
                                    <p class="mb-8 text-gray-800 dark:text-gray-200 mr-8">{{ $group ? $group->group_name : 'Unknown Group' }}</p>
                                    <form action="{{ route('groups.invite.accept', ['groupId' => $group->id, 'invitationId' => $invite->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="mb-8 text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md mr-4">Accept</button>
                                    </form>
                                    <form action="{{ route('groups.invite.reject', ['invitationId' => $invite->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="mb-8 text-gray-800 dark:text-gray-200 bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md">Reject</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
