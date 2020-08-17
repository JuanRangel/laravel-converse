<?php

namespace Vsellis\Converse\Http\Livewire\Conversations;

use Illuminate\View\View;
use Livewire\Component;
use Vsellis\Converse\Events\MessageAdded;
use Vsellis\Converse\Models\Conversation;

class ConversationReply extends Component
{
    public $conversation;
    public $body = '';

    public function mount(Conversation $conversation) : void
    {
        $this->conversation = $conversation;
    }

    public function submit() : void
    {
        $this->validate([
            'body' => 'required',
        ]);

        $message = $this->conversation->messages()->create([
            'user_id' => auth()->id(),
            'body' => $this->body,
        ]);

        broadcast(new MessageAdded($message))->toOthers();
        $this->emit('message.created', $message->id);
        $this->body = '';
    }

    public function render() : View
    {
        return view('converse::livewire.conversation-reply');
    }
}
