<div>
    <div class="h-screen flex overflow-hidden bg-white absolute inset-0">
        <div class="flex-1 relative z-0 flex overflow-hidden">
            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last">
                <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8 divide-y divide-gray-100 flex flex-col">
                    <livewire:converse::conversations.conversation-header :conversation="$this->conversation"/>

                    {{-- Start MESSAGES --}}
                    <div id="chat-content" class="overflow-y-auto overflow-x-hidden py-10 flex-1">
                        <ul class="space-y-3 pl-5">
                            @foreach($conversation->messages as $message)
                                <livewire:converse::conversations.conversation-message :message="$message" :key="$message->id"/>
                            @endforeach
                        </ul>
                    </div>
                    {{-- END MESSAGES --}}

                    <livewire:converse::conversations.conversation-reply :conversation="$this->conversation"/>
                </div>
            </main>
            <aside class="hidden relative xl:order-first xl:flex xl:flex-col flex-shrink-0 w-96 bg-gray-50">
                <livewire:converse::conversations.conversation-list :conversations="$conversations"/>
            </aside>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('newMessage', event => {
            var chat = document.getElementById('chat-content');
            chat.scrollTop = chat.scrollHeight;
        });
    </script>
@endpush