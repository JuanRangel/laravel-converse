<div>
    <div class="w-full py-3">
        <div class="flex">
            <input id="reply-form" autofocus type="text" class="border-gray-200 rounded-lg b-0 flex-auto" wire:model.defer="body" placeholder="Aa">
            <button
                    wire:click="submit"
                    class="bg-blue-600 text-white rounded-full w-14 h-14 p-2 ml-3 flex justify-center items-center"
                    type="submit"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
            </button>

        </div>
        @error('newReplyState.body')
        <div class="text-red-400">
            {{$message}}
        </div>
        @enderror

    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('focusReply', event => {
            var textarea = document.getElementById('reply-form');
            textarea.scrollTop = textarea.scrollHeight;
            textarea.focus();
        });
    </script>
@endpush