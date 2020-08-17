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
    <div class="main-content w-full">
        <div>
            <div class="h-screen w-full flex antialiased text-gray-200 bg-gray-900 overflow-hidden">
                <div class="flex-1 flex flex-col">
                    <main class="flex-grow flex flex-row min-h-0">

                        <livewire:converse::conversations.conversation-list :conversations="$conversations"/>

                        <section class="flex flex-col flex-auto border-l border-gray-800">
                            <livewire:converse::conversations.conversation-header :conversation="$conversation"/>
                            <livewire:converse::conversations.conversation-messages :conversation="$conversation" :messages="$conversation->messages"/>
                            <livewire:converse::conversations.conversation-reply :conversation="$conversation"/>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection
