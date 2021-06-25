<div class="block flex pb-6">

    <div class="flex flex-1 items-center">
        <a href="{{route('conversations.index')}}" class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h2 class="font-bold text-lg flex-1">
            Chatting with {{$conversation->getOtherParticipant(auth()->user())->name}}
        </h2>
    </div>

    <div class="flex text-gray-400 space-x-3">
        <button wire:click="addParticipant">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
        </button>

{{--        @if(count($this->getActions()) > 0)--}}
            <div class="ml-2 flex-shrink-0 relative inline-block text-left" x-data="{openMenu: false}">
                <button x-on:click="openMenu = ! openMenu" x-on:click.away="openMenu = false" type="button" class="group relative w-8 h-8 bg-white rounded-full inline-flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open options menu</span>
                    <span class="flex items-center justify-center h-full w-full rounded-full">
                        <!-- Heroicon name: solid/dots-vertical -->
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                        </svg>
                    </span>
                </button>

                <div x-show="openMenu"
                     x-cloak
                     class="origin-top-right absolute z-10 top-0 right-9 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                     role="menu"
                     aria-orientation="vertical"
                     aria-labelledby="options-menu-0-button"
                     tabindex="-1">
                    @foreach($this->getActions() as $key => $action)
                        @php $action = new $action; @endphp
                        <div class="py-1" role="none">
                            <a href="#" wire:click.prevent="doAction({{$key}})" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="options-menu-0-item-1">{{$action->label}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
{{--        @endif--}}

    </div>
</div>