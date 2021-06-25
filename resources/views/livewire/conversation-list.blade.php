<div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8 overflow-x-hidden">
    <a href="{{url('/')}}">Home</a>
    <h2 class="text-lg font-bold pt-2 pb-4">Conversations</h2>
    <ul class="space-y-3">
        @foreach($conversations as $conversation)
            <a href="{{route('conversations.show', $conversation )}}" class="-m-1 flex-1 block p-1">
                <li class="relative group py-6 px-2 flex items-center bg-white rounded-lg">

                    <div class="absolute inset-0 group-hover:bg-gray-50 rounded" aria-hidden="true"></div>
                    <div class="flex-1 flex items-center min-w-0 relative">
                        <span class="flex-shrink-0 inline-block relative">
                            <img class="h-10 w-10 rounded-full" src="{{$conversation->getOtherParticipant(auth()->user())->profile_photo_url}}" alt="">
                        </span>
                        <div class="ml-4 truncate">
                            <p class="text-sm font-medium text-gray-900 truncate">{{$conversation->getOtherParticipant(auth()->user())->name}}</p>
                            <p class="text-sm text-gray-500 truncate">{{$conversation->last_excerpt}}</p>
                        </div>
                    </div>

                </li>
            </a>
        @endforeach
    </ul>
</div>