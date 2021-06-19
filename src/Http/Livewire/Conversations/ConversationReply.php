<?php

namespace JuanRangel\Converse\Http\Livewire\Conversations;

use Illuminate\View\View;
use Livewire\Component;
use JuanRangel\Converse\Converse;
use JuanRangel\Converse\Events\MessageCreated;
use JuanRangel\Converse\Models\Conversation;
use JuanRangel\Converse\Services\CreateMessageService;

class ConversationReply extends Component
{
    public $conversation;
    public $body = '';

    public function mount(Conversation $conversation) : void
    {
        $this->conversation = $conversation;
    }

    public function submit(CreateMessageService $messageService) : void
    {
        $this->validate([
            'body' => 'required',
        ]);

        $message = Converse::createMessage($this->conversation, $this->conversation->facebookPages->first(), $this->body);

        $this->emit('message.created', $message->id);
        event(MessageCreated::class, $message->id);
        $this->body = '';
    }

    public function render() : View
    {
        return view('converse::livewire.conversation-reply');
    }
}
