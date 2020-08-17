<?php

namespace Vsellis\Converse\Http\Livewire\Conversations;

use Illuminate\View\View;
use Livewire\Component;
use Vsellis\Converse\Models\Conversation;
use Vsellis\Converse\Services\CreateMessageService;

class ConversationReply extends Component
{
    public $conversation;
    public $body = '';

//    protected $messageService;

    public function mount(Conversation $conversation) : void
    {
        $this->conversation = $conversation;
//        $this->messageService = $messageService;
    }

    public function submit(CreateMessageService $messageService) : void
    {
        $this->validate([
            'body' => 'required',
        ]);

        $message = $messageService->create($this->conversation, auth()->user(), $this->body);

        $this->emit('message.created', $message->id);
        $this->body = '';
    }

    public function render() : View
    {
        return view('converse::livewire.conversation-reply');
    }
}
