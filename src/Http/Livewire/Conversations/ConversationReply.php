<?php

namespace Vsellis\Converse\Http\Livewire\Conversations;

use Livewire\Component;
use Vsellis\Converse\Models\Conversation;

class ConversationReply extends Component
{
    public $conversation;
    public $body = '';

    public function mount(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }

    public function submit()
    {
        $this->validate([
            'body' => 'required',
        ]);

        $message = $this->conversation->messages()->create([
            'user_id' => auth()->id(),
            'body' => $this->body,
        ]);

        $this->emit('message.created', $message->id);
        $this->body = '';
    }

    public function render()
    {
        return view('converse::livewire.conversation-reply');
    }
}
