@extends('converse::layouts.converse')

@push('styles')
    <style>
        /* can be configured in tailwind.config.js */
        .group:hover .group-hover\:block {
            display: block;
        }

        .hover\:w-64:hover {
            width: 45%;
        }


        /* NO NEED THIS CSS - just for custom scrollbar which can also be configured in tailwind.config.js*/
        ::-webkit-scrollbar {
            width: 2px;
            height: 2px;
        }

        ::-webkit-scrollbar-button {
            width: 0px;
            height: 0px;
        }

        ::-webkit-scrollbar-thumb {
            background: #2d3748;
            border: 0px none #ffffff;
            border-radius: 50px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #2b6cb0;
        }

        ::-webkit-scrollbar-thumb:active {
            background: #000000;
        }

        ::-webkit-scrollbar-track {
            background: #1a202c;
            border: 0px none #ffffff;
            border-radius: 50px;
        }

        ::-webkit-scrollbar-track:hover {
            background: #666666;
        }

        ::-webkit-scrollbar-track:active {
            background: #333333;
        }

        ::-webkit-scrollbar-corner {
            background: transparent;
        }

    </style>
@endpush

@section('content')
    <div class="flex flex-col sm:justify-around">
        <div class="w-64 h-screen bg-gray-800 mt-8 sm:mt-0">
            <div class="flex items-center justify-center mt-10">
                {{--                    <img class="h-6" src="https://premium-tailwindcomponents.netlify.app/assets/svg/tailwindcomponent-light.svg">--}}
                <h1 class="h-6 text-white">Nemdic Pro</h1>
            </div>

            <nav class="mt-10">

            </nav>

            <div class="absolute bottom-0 my-10">
                <a class="flex items-center py-2 px-8 text-gray-600 hover:text-gray-500" href="#">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M18 10C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10C2 5.58172 5.58172 2 10 2C14.4183 2 18 5.58172 18 10ZM10 7C9.63113 7 9.3076 7.19922 9.13318 7.50073C8.85664 7.97879 8.24491 8.14215 7.76685 7.86561C7.28879 7.58906 7.12543 6.97733 7.40197 6.49927C7.91918 5.60518 8.88833 5 10 5C11.6569 5 13 6.34315 13 8C13 9.30622 12.1652 10.4175 11 10.8293V11C11 11.5523 10.5523 12 10 12C9.44773 12 9.00001 11.5523 9.00001 11V10C9.00001 9.44772 9.44773 9 10 9C10.5523 9 11 8.55228 11 8C11 7.44772 10.5523 7 10 7ZM10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z"
                              fill="currentColor"/>
                    </svg>


                    <span class="mx-4 font-medium">Support</span>
                </a>
            </div>
        </div>
    </div>

    <div class="main-content w-full">
        <div>
            <!-- Messenger Clone -->
            <div class="h-screen w-full flex antialiased text-gray-200 bg-gray-900 overflow-hidden">
                <div class="flex-1 flex flex-col">
                    <main class="flex-grow flex flex-row min-h-0">

                        <livewire:converse::conversations.conversation-list :conversations="$conversations"/>

                        <section class="flex flex-col flex-auto border-l border-gray-800">
                            <livewire:converse::conversations.conversation-header/>
                            <livewire:converse::conversations.conversation-messages :messages="$conversation->messages"/>
                            <livewire:converse::conversations.conversation-reply :conversation="$conversation"/>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection
