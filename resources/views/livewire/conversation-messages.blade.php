<div id="chat-body" class="chat-body p-4 flex-1 overflow-y-scroll">
    @foreach($messages as $message)
        <div class="flex flex-row mt-4 {{auth()->id() === $message->user_id ? 'justify-end text-right' : 'justify-start'}}">
            <div class="messages text-sm text-gray-700 grid grid-flow-row gap-2 {{auth()->id() === $message->user_id ? 'flex-row-reverse' : ''}}">
                {{$message->messageable->present()->name()}}
                <div class="flex items-center group ">
                    <p class="px-6 py-3 rounded-t-full max-w-xs lg:max-w-md {{auth()->id() === $message->user_id ? 'bg-blue-700 text-white rounded-l-full' : 'bg-gray-200 text-gray-800 rounded-r-full'}} ">{{$message->body}}</p>
                </div>
            </div>
        </div>
    @endforeach

</div>

@push('scripts')
    <script>
        window.addEventListener('scroll-chat', event => {
            var objDiv = document.getElementById("chat-body");
            objDiv.scrollTop = objDiv.scrollHeight + 100;
        })
    </script>
@endpush



