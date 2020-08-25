<div>
    <div class="chat-header px-6 py-4 flex flex-row flex-none justify-between items-center shadow">
        <div class="flex">
            <div class="w-12 h-12 mr-4 relative flex flex-shrink-0">
                <img class="shadow-md rounded-full w-full h-full object-cover"
                     src="https://randomuser.me/api/portraits/women/33.jpg"
                     alt=""
                />
            </div>
            <div class="text-sm">
                <p class="font-bold mb-2">
                    @foreach($conversation->users as $user)
                        {{$user->present()->name()}}{{$loop->last ? null : ','}}
                    @endforeach
                </p>
                <p>Active 1h ago</p>
            </div>
        </div>
    </div>
</div>
