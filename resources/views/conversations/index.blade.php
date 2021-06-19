@extends(config('converse.layout'))

@section('content')
    <div class="flex h-screen w-screen">
        <div class="m-auto">
            <h1 class=" text-4xl sm:text-6xl tracking-widest">Laravel Converse</h1>

            <div>
                <div class="flow-root mt-6">
                    <ul class="-my-5 divide-y divide-gray-200">
                        @forelse($conversations as $conversation)

                            <li class="py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="h-8 w-8 rounded-full" src="{{$conversation->getOtherParticipant(auth()->user())->profile_photo_url}}" alt="">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            {{$conversation->getOtherParticipant(auth()->user())->name}}
                                        </p>
                                    </div>
                                    <div>
                                        <a href="{{route('conversations.show', $conversation)}}" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                            View
                                        </a>
                                    </div>
                                </div>
                            </li>

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
    </div>

@endsection