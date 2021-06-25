<div class="flex items-end tracking-wide leading-6 text-left text-gray-600 box-border">
    <!-- Avatar -->
    <a
            class="inline-block relative {{($this->isAuthor()) ? 'order-2 ml-3':'mr-3' }} w-8 h-8 text-left text-blue-600 no-underline xl:h-10 xl:w-10 lg:mr-4"
            href="#"
            wire:click.prevent="showUserInfo({{$message}})"
    >
        <img
                class="w-8 h-8 text-blue-700 align-middle border-none xl:h-10 xl:w-10 box-border rounded-full"
                src="{{$message->messageable->profile_photo_url}}"
                alt="Author Avatar"
        />
    </a>

    <!-- Message: body -->
    <div class="flex-1 {{($this->isAuthor()) ? 'order-1':'' }} leading-6 text-gray-600 box-border">
        <!-- Message: row -->
        <div class="text-left box-border">
            <div class="flex {{($this->isAuthor()) ? 'justify-end':'' }} items-center text-gray-600 box-border">
                <!-- Message: content -->
                <div class="inline-block p-4 rounded-lg {{($this->isAuthor()) ? 'bg-blue-600 text-white rounded-br-none':'bg-gray-100 rounded-bl-none' }} lg:max-w-full box-border">
                    <h6 class="mt-0 mb-1 text-sm font-medium text-gray-900 box-border">
                        @if((!$this->isAuthor()))
                            {{$message->messageable->name}}
                        @endif
                    </h6>
                    <div class="box-border">
                        {{$message->body}}
                    </div>

                    <div class="mt-px box-border">
                        <small>{{$message->created_at->format('n/d/Y g:i A')}}</small>
                    </div>
                </div>
                <!-- Message: content -->
            </div>
        </div>
        <!-- Message: row -->
    </div>
    <!-- Message: Body -->
</div>