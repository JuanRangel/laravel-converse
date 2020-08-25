<section class="flex flex-col flex-none overflow-auto w-24 hover:w-64 group lg:max-w-sm md:w-2/5 transition-all duration-300 ease-in-out border-r bg-gray-100">
    <div class="header p-4 flex flex-row justify-between items-center flex-none">
        <div class="w-16 h-16 relative flex flex-shrink-0">
            <img class="rounded-full w-full h-full object-cover" alt="ravisankarchinnam"
                 src="{{config('converse.logo')}}"/>
        </div>
        <p class="text-md font-bold hidden md:block group-hover:block">{{env('APP_NAME')}}</p>
        <a href="#" class="block rounded-full hover:bg-gray-400 bg-gray-300 w-10 h-10 p-2 hidden md:block group-hover:block">
            <svg viewBox="0 0 24 24" class="w-full h-full fill-current">
                <path
                    d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/>
            </svg>
        </a>
    </div>
    <div class="search-box p-4 flex-none">
        <form onsubmit="">
            <div class="relative">
                <label>
                    <input class="rounded-full py-2 pr-6 pl-10 w-full border border-gray-300 focus:border-gray-300 bg-white focus:bg-gray-100 focus:outline-none text-gray-700 focus:shadow-md transition duration-300 ease-in"
                           type="text" value="" placeholder="Search Conversations"/>
                    <span class="absolute top-0 left-0 mt-2 ml-3 inline-block">
                                    <svg viewBox="0 0 24 24" class="w-6 h-6">
                                        <path fill="#bbb"
                                              d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/>
                                    </svg>
                                </span>
                </label>
            </div>
        </form>
    </div>
    <div class="contacts p-2 flex-1 overflow-y-scroll">

        @foreach($conversations as $conversation)
            <a href="{{route('conversations.show', $conversation)}}">
                <div class="flex justify-between items-center p-3 hover:bg-gray-300 rounded-lg relative">
                    <div class="w-16 h-16 relative flex flex-shrink-0">
                        <img class="shadow-md rounded-full w-full h-full object-cover"
                             src="https://randomuser.me/api/portraits/women/61.jpg"
                             alt=""
                        />
                    </div>
                    <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block">
                        <p>
                            @foreach($conversation->users as $user)
                                {{$user->present()->name()}}{{$loop->last ? null : ','}}
                            @endforeach
                        </p>
                        <div class="flex items-center text-sm text-gray-600">
                            <div class="min-w-0">
                                <p class="truncate">...</p>
                            </div>
                            <p class="ml-2 whitespace-no-wrap">Just now</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>
