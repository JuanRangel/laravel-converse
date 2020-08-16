<?php

namespace Vsellis\Converse\Http\Livewire\Conversations;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Vsellis\Converse\Models\Message;

class ConversationMessages extends Component
{

    public $messages;

    public function mount(Collection $messages) : void
    {
        $this->messages = $messages;
    }

    public function getListeners() : array
    {
        return [
            'message.created' => 'appendMessage'
        ];
    }

    public function appendMessage($id) : void
    {
        $this->messages->push(Message::find($id));
    }

    public function render() : View
    {
        return view('converse::livewire.conversation-messages');
    }
}
