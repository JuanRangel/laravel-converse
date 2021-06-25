<?php

namespace JuanRangel\Converse\Http\Livewire\Conversations;

use Illuminate\View\View;
use JuanRangel\Converse\Actions\CloseConversationAction;
use JuanRangel\Converse\Models\Conversation;
use Livewire\Component;

class ConversationApp extends Component
{
    public $conversation;

    public function getListeners() : array
    {
        return [
            'newMessage' => 'appendMessageFromBroadcast',
            /**
             * Echo Listeners
             */
            "echo-private:conversations.{$this->conversation->id},\JuanRangel\Converse\Events\MessageAdded" => 'appendMessageFromBroadcast',
        ];
    }

    public function appendMessageFromBroadcast() : void
    {
        $this->conversation->fresh();
//        $this->dispatchBrowserEvent('scroll-chat');
    }

    public function render() : View
    {
        return view('converse::livewire.conversation-app', [
            'conversations' => auth()->user()->conversations()->latest()->get(),
        ]);
    }
}
