<form action="#" wire:submit.prevent="submit">
    <div class="chat-footer flex-none">
        <div class="flex flex-row items-center p-4">

            <div class="relative flex-grow">
                <label class="w-full">
                    <input wire:model="body" class="rounded-full py-2 pl-3 pr-10 w-full border border-gray-300 focus:border-gray-300 bg-gray-200 focus:bg-gray-200 focus:outline-none text-gray-800 focus:shadow-md transition duration-300 ease-in"
                           type="text" value="" placeholder="Aa"/>
                    <button type="submit" class="absolute top-0 right-0 mt-2 mr-3 flex flex-shrink-0 focus:outline-none block text-gray-800 hover:text-gray-700 w-6 h-6">
                        <i class="fal fa-paper-plane"></i>
                    </button>
                </label>
            </div>
{{--            <button type="button" class="flex flex-shrink-0 focus:outline-none mx-2 block text-gray-600 hover:text-gray-700 w-6 h-6">--}}
{{--                // thumbs up icon--}}
{{--            </button>--}}
        </div>
    </div>
</form>
