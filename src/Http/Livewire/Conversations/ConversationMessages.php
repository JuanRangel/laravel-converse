<?php

namespace JuanRangel\Converse\Http\Livewire\Conversations;

use Illuminate\View\View;
use Livewire\Component;
use JuanRangel\Converse\Models\Conversation;
use JuanRangel\Converse\Models\Message;

class ConversationMessages extends Component
{
    public $messages;

    public $conversationId;


    public function mount(Conversation $conversation, $messages) : void
    {
        $this->messages = $messages;
        $this->conversationId = $conversation->id;
    }

    public function getListeners() : array
    {
        return [
            'message.created' => 'appendMessage',

            /**
             * Echo Listeners
             */
            "echo-private:conversations.{$this->conversationId},\JuanRangel\Converse\Events\MessageAdded" => 'appendMessageFromBroadcast',
        ];
    }

    public function appendMessage($id) : void
    {
        $this->messages->push(Message::find($id));
        $this->dispatchBrowserEvent('scroll-chat');
    }

    public function appendMessageFromBroadcast($payload) : void
    {
        $this->messages->push(Message::find($payload['message']));
        $this->dispatchBrowserEvent('scroll-chat');
    }

    public function render() : View
    {
        return view('converse::livewire.conversation-messages');
    }
}
