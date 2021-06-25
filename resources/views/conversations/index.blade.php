@extends(config('converse.layout'))

@section('content')
    <div class="h-screen w-screen">
        <div class="p-4">
            <a href="{{route('dashboard')}}">
                <h1 class="text-center text-xl tracking-widest text-indigo-500">{{config('app.name')}}</h1>
            </a>
            <div class="flow-root mt-6">
                <ul class="space-y-3">
                    @forelse($conversations as $conversation)

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
                    @empty
                        <li class="py-4">
                            <div class="flex items-center space-x-4">
                                No Conversations
                            </div>
                        </li>
                    @endforelse

                </ul>
            </div>
        </div>
    </div>

@endsection