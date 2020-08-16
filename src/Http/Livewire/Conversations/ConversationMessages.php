<?php

namespace Vsellis\Converse\Http\Livewire\Conversations;

use Illuminate\Support\Collection;
use Livewire\Component;
use Vsellis\Converse\Models\Message;

class ConversationMessages extends Component
{

    public $messages;

    public function mount(Collection $messages)
    {
        $this->messages = $messages;
    }

    public function getListeners()
    {
        return [
            'message.created' => 'appendMessage'
        ];
    }

    public function appendMessage($id)
    {
        $this->messages->push(Message::find($id));
    }

    public function render()
    {
        return view('converse::livewire.conversation-messages');
    }
}
