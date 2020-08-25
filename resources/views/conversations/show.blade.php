@extends(config('converse.layout'))

@push('styles')
@endpush

@section('content')
    <div class="main-content w-full">
        <div>
            <div class="h-screen w-full flex antialiased text-gray-800 bg-white overflow-hidden">
                <div class="flex-1 flex flex-col">
                    <main class="flex-grow flex flex-row min-h-0">

                        <livewire:converse::conversations.conversation-list :conversations="$conversations"/>

                        <section class="flex flex-col flex-auto border-l shadow-lg">
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